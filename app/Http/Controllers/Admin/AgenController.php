<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgenController extends Controller
{
    public function index()
    {
        $agens = Agen::latest()->paginate(10);
        return view('admin.agen.index', compact('agens'));
    }

    public function create()
    {
        return view('admin.agen.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_agen' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nomor_wa' => 'required|string|max:20',
            'foto_path' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $validated['foto_path'] = $request->file('foto_path')->store('agens', 'public');
        Agen::create($validated);

        return redirect()->route('admin.agen.index')->with('success', 'Agen berhasil ditambahkan.');
    }

    public function edit(Agen $agen)
    {
        return view('admin.agen.edit', compact('agen'));
    }

    public function update(Request $request, Agen $agen)
    {
        $validated = $request->validate([
            'nama_agen' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nomor_wa' => 'required|string|max:20',
            'foto_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto_path')) {
            Storage::disk('public')->delete($agen->foto_path);
            $validated['foto_path'] = $request->file('foto_path')->store('agens', 'public');
        }

        $agen->update($validated);

        return redirect()->route('admin.agen.index')->with('success', 'Agen berhasil diperbarui.');
    }

    public function destroy(Agen $agen)
    {
        Storage::disk('public')->delete($agen->foto_path);
        $agen->delete();

        return redirect()->route('admin.agen.index')->with('success', 'Agen berhasil dihapus.');
    }
}