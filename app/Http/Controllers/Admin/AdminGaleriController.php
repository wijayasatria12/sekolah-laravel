<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;

class AdminGaleriController extends Controller
{
    public function index()
    {
        //$galeris = Galeri::latest()->get();
        $galeris = Galeri::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeri.form', ['galeri' => new Galeri()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judulgaleri' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'deskripsi' => 'nullable|string|max:100',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('galeris', 'public');
        }

        Galeri::create($validated);
        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.form', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judulgaleri' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'deskripsi' => 'nullable|string|max:100',
        ]);
        $galeri = Galeri::findOrFail($id);
        if ($request->hasFile('image')) {
            if ($galeri->image && Storage::disk('public')->exists($galeri->image)) {
                Storage::disk('public')->delete($galeri->image);
            }
            $validated['image'] = $request->file('image')->store('galeris', 'public');
        }
        $galeri->update($validated);
        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        if ($galeri->image && Storage::disk('public')->exists($galeri->image)) {
            Storage::disk('public')->delete($galeri->image);
        }

        $galeri->delete();

        return back()->with('success', 'Data galeri berhasil dihapus.');
    }

}
