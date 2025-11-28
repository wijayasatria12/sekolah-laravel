<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\Storage;

class AdminArtikelController extends Controller
{
    public function index()
    {
        //$artikels = Artikel::latest()->get();
        $artikels = Artikel::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.artikel.index', compact('artikels'));
    }

    public function create()
    {
        return view('admin.artikel.form', ['artikel' => new Artikel()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judulartikel' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'deskripsi' => 'nullable|string|max:1000',
            'author' => 'nullable|string|max:100',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('artikels', 'public');
        }

        Artikel::create($validated);
        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.form', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judulartikel' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'deskripsi' => 'nullable|string|max:1000',
            'author' => 'nullable|string|max:100',
        ]);
        $artikel = Artikel::findOrFail($id);
        if ($request->hasFile('image')) {
            if ($artikel->image && Storage::disk('public')->exists($artikel->image)) {
                Storage::disk('public')->delete($artikel->image);
            }
            $validated['image'] = $request->file('image')->store('artikels', 'public');
        }
        $artikel->update($validated);
        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        if ($artikel->image && Storage::disk('public')->exists($artikel->image)) {
            Storage::disk('public')->delete($artikel->image);
        }

        $artikel->delete();

        return back()->with('success', 'Data artikel berhasil dihapus.');
    }

}
