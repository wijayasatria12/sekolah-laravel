<?php

namespace App\Http\Controllers;

use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::all();
        return view('frontend.artikel', compact('artikels'));
    }

    public function showArtikel($id)
    {
        //tampilkan hanya 6 artikel terbaru selain artikel yang sedang dibuka
        $artikel = Artikel::findOrFail($id);
        $artikels_terbaru = Artikel::where('id', '!=', $id)
            ->latest()
            ->take(6)
            ->get();

        return view('frontend.show', compact('artikel', 'artikels_terbaru'));
    }
}
