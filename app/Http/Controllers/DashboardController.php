<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;

class DashboardController extends Controller
{
    public function index()
    {
        $total        = Mahasiswa::count();
        $perJurusan   = Mahasiswa::selectRaw('jurusan, count(*) as jumlah')
                            ->groupBy('jurusan')
                            ->orderByDesc('jumlah')
                            ->get();
        $terbaru      = Mahasiswa::latest()->take(5)->get();

        return view('dashboard', compact('total', 'perJurusan', 'terbaru'));
    }
}
