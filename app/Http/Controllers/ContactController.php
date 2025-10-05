<?php

// app/Http/Controllers/ContactController.php
namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'subjek' => 'required|string|max:255',
            'isi_pesan' => 'required|string|max:2000',
        ]);

        Pesan::create($validated);

        return back()->with('success', 'Pesan Anda telah berhasil terkirim. Terima kasih!');
    }
}
