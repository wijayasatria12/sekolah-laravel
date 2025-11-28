<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Galeri;
use App\Models\Artikel;

//controller untuk layout.blade.php dan welcome.blade.php
class HomeController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        $galeris = Galeri::latest()->take(7)->get(); // ambil 7 foto terbaru
        $artikels = Artikel::latest()->take(3)->get(); // ambil 3 terbaru
        return view('welcome', compact('programs','galeris','artikels'));
    }

}
