<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::all();
        return view('frontend.galeri', compact('galeris'));
    }
}
