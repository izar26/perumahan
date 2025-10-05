<?php

// app/Http/Controllers/Admin/SettingController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        // Ambil semua setting dan ubah menjadi format yang mudah diakses di view
        $settings = Setting::all()->keyBy('key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except('_token');

        foreach ($data as $key => $value) {
            // Handle file upload untuk logo
            if ($key == 'company_logo' && $request->hasFile('company_logo')) {
                $oldLogo = Setting::where('key', 'company_logo')->first();
                if ($oldLogo && $oldLogo->value) {
                    Storage::disk('public')->delete($oldLogo->value);
                }
                $path = $request->file('company_logo')->store('logos', 'public');
                $value = $path;
            }

            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return back()->with('success', 'Pengaturan berhasil diperbarui.');
    }
}