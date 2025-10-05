<?php
// app/Http/Controllers/Admin/FasilitasController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::latest()->paginate(10);
        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    public function create()
    {
        return view('admin.fasilitas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'icon_path' => 'required|image|mimes:jpeg,png,jpg,svg|max:1024',
        ]);

        $validated['icon_path'] = $request->file('icon_path')->store('icons', 'public');
        Fasilitas::create($validated);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function edit(Fasilitas $fasilita) // Nama variabel $fasilita disesuaikan otomatis oleh Laravel
    {
        return view('admin.fasilitas.edit', compact('fasilita'));
    }

    public function update(Request $request, Fasilitas $fasilita)
    {
        $validated = $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'icon_path' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:1024',
        ]);

        if ($request->hasFile('icon_path')) {
            Storage::disk('public')->delete($fasilita->icon_path);
            $validated['icon_path'] = $request->file('icon_path')->store('icons', 'public');
        }

        $fasilita->update($validated);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy(Fasilitas $fasilita)
    {
        Storage::disk('public')->delete($fasilita->icon_path);
        $fasilita->delete();

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil dihapus.');
    }
}