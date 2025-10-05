<?php

// app/Http/Controllers/Admin/PesanController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index()
    {
        $pesans = Pesan::latest()->paginate(15);
        return view('admin.pesan.index', compact('pesans'));
    }

    public function show(Pesan $pesan)
    {
        // Tandai sudah dibaca saat dibuka
        $pesan->update(['sudah_dibaca' => true]);
        return view('admin.pesan.show', compact('pesan'));
    }

    public function destroy(Pesan $pesan)
    {
        $pesan->delete();
        return redirect()->route('admin.pesan.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
