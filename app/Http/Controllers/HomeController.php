<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Models\TipeUnit;
use App\Models\Fasilitas;
use App\Models\Agen;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        public function index()
    {
        $tipeUnits = TipeUnit::latest()->get();
        $fasilitas = Fasilitas::all(); // <-- Tambahkan baris ini
        $agens = Agen::all(); // <-- Tambahkan baris ini

        return view('welcome', compact('tipeUnits', 'fasilitas', 'agens')); // <-- Tambahkan 'agens'
    }

    // TAMBAHKAN METHOD BARU INI
    public function show(TipeUnit $tipeUnit)
    {
        // Berkat Route Model Binding, Laravel sudah otomatis
        // memberikan kita data $tipeUnit yang sesuai dengan slug di URL.
        // Kita tinggal mengirimkannya ke view.
        return view('pages.show-unit', compact('tipeUnit'));
    }
}