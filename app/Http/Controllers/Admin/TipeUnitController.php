<?php

// app/Http/Controllers/Admin/TipeUnitController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TipeUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Photo;

class TipeUnitController extends Controller
{
    public function index()
    {
        $tipeUnits = TipeUnit::latest()->paginate(10);
        return view('admin.tipe-unit.index', compact('tipeUnits'));
    }

    public function create()
    {
        return view('admin.tipe-unit.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_tipe' => 'required|string|max:255|unique:tipe_units',
            'harga' => 'required|numeric',
            'luas_tanah' => 'required|integer',
            'luas_bangunan' => 'required|integer',
            'deskripsi_singkat' => 'required|string',
            'deskripsi_lengkap' => 'required|string',
            'denah_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file uploads
        $validated['thumbnail_path'] = $request->file('thumbnail_path')->store('thumbnails', 'public');
        if ($request->hasFile('denah_path')) {
            $validated['denah_path'] = $request->file('denah_path')->store('denahs', 'public');
        }

        // Create slug
        $validated['slug'] = Str::slug($request->nama_tipe);

        TipeUnit::create($validated);

        return redirect()->route('admin.tipe-unit.index')->with('success', 'Tipe Unit berhasil ditambahkan!');
    }

    public function edit(TipeUnit $tipeUnit)
    {
        return view('admin.tipe-unit.edit', compact('tipeUnit'));
    }

    public function update(Request $request, TipeUnit $tipeUnit)
    {
        $validated = $request->validate([
            'nama_tipe' => 'required|string|max:255|unique:tipe_units,nama_tipe,' . $tipeUnit->id,
            'harga' => 'required|numeric',
            'luas_tanah' => 'required|integer',
            'luas_bangunan' => 'required|integer',
            'deskripsi_singkat' => 'required|string',
            'deskripsi_lengkap' => 'required|string',
            'denah_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update slug
        $validated['slug'] = Str::slug($request->nama_tipe);

        // Handle file updates
        if ($request->hasFile('thumbnail_path')) {
            Storage::disk('public')->delete($tipeUnit->thumbnail_path);
            $validated['thumbnail_path'] = $request->file('thumbnail_path')->store('thumbnails', 'public');
        }
        if ($request->hasFile('denah_path')) {
            if ($tipeUnit->denah_path) {
                Storage::disk('public')->delete($tipeUnit->denah_path);
            }
            $validated['denah_path'] = $request->file('denah_path')->store('denahs', 'public');
        }

        $tipeUnit->update($validated);

        return redirect()->route('admin.tipe-unit.index')->with('success', 'Tipe Unit berhasil diperbarui!');
    }

    public function destroy(TipeUnit $tipeUnit)
    {
        // Delete files from storage
        Storage::disk('public')->delete($tipeUnit->thumbnail_path);
        if ($tipeUnit->denah_path) {
            Storage::disk('public')->delete($tipeUnit->denah_path);
        }

        $tipeUnit->delete();

        return redirect()->route('admin.tipe-unit.index')->with('success', 'Tipe Unit berhasil dihapus!');
    }

    public function storePhoto(Request $request, TipeUnit $tipeUnit)
{
    $request->validate([
        'photos' => 'required',
        'photos.*' => 'image|mimes:jpeg,png,jpg|max:2048'
    ]);

    if ($request->hasFile('photos')) {
        foreach ($request->file('photos') as $file) {
            $path = $file->store('galleries', 'public');
            $tipeUnit->photos()->create(['path' => $path]);
        }
    }

    return back()->with('success', 'Foto berhasil ditambahkan ke galeri.');
}

public function destroyPhoto(Photo $photo)
{
    Storage::disk('public')->delete($photo->path);
    $photo->delete();

    return back()->with('success', 'Foto berhasil dihapus dari galeri.');
}
}