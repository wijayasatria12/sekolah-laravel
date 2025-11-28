<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\User;
use App\Models\PendaftaranSiswa;
use Illuminate\Support\Facades\Storage;

class AdminDashboardController extends Controller
{
    // Controller
    public function index()
    {
        $artikels = Artikel::latest()->take(4)->get();
        $pendaftaran_siswas = PendaftaranSiswa::latest()->take(4)->get();
        $totalPendaftar = PendaftaranSiswa::count();
        $totalArtikel = Artikel::count();
        $totalGaleri = Galeri::count();
        $totalUser = User::count();
        $pendaftarHariIni = PendaftaranSiswa::whereDate('created_at', now())->count();
        $artikelHariIni = Artikel::whereDate('created_at', now())->count();

        return view('admin.dashboard', compact(
            'artikels', 'pendaftaran_siswas',
            'totalPendaftar', 'totalArtikel', 'totalGaleri', 'totalUser',
            'pendaftarHariIni', 'artikelHariIni'
        ));
    }

}
