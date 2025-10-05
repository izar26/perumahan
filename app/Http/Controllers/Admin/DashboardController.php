<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agen;
use App\Models\Fasilitas;
use App\Models\Pesan;
use App\Models\TipeUnit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTipeUnit = TipeUnit::count();
        $totalFasilitas = Fasilitas::count();
        $totalAgen = Agen::count();
        $totalPesan = Pesan::count();
        $pesanBelumDibaca = Pesan::where('sudah_dibaca', false)->count();

        return view('admin.dashboard', compact(
            'totalTipeUnit',
            'totalFasilitas',
            'totalAgen',
            'totalPesan',
            'pesanBelumDibaca'
        ));
    }
}