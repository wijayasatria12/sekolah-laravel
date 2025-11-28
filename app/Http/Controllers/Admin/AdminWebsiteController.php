<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Website;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache; // agar cache direset seletah update data

class AdminWebsiteController extends Controller
{
    public function edit()
    {
        // Ambil data pertama (karena hanya 1 baris)
        $website = Website::first();

        // Jika belum ada, buat data kosong default
        if (!$website) {
            $website = Website::create([
                'namasekolah' => 'Nama Sekolah Belum Diatur',
            ]);
        }

        return view('admin.website.edit', compact('website'));
    }

    public function update(Request $request, Website $website)
    {
        $request->validate([
            'namasekolah' => 'required|string|max:255',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $website = Website::first();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/logo'), $filename);
            $website->logo = $filename;
        }

        $website->namasekolah = $request->namasekolah;
        $website->judulkecil = $request->judulkecil;
        $website->alamat = $request->alamat;
        $website->no_wa = $request->no_wa;
        $website->email = $request->email;
        $website->sejarah = $request->sejarah;
        $website->visi = $request->visi;
        $website->misi = $request->misi;
        $website->embeded_maps = $request->embeded_maps;

        // proses update...
        $website->save();

        // hapus cache agar tampil terbaru
        Cache::forget('websiteData');
            return redirect()->route('website.edit')->with('success', 'Data website berhasil diperbarui.');
        }
}
