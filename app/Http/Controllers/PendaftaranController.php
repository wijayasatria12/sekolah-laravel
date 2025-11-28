<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendaftaranSiswa;
use App\Models\Jurusan;

class PendaftaranController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::orderBy('namajurusan', 'asc')->get();
        //return view('frontend.daftar');
        return view('frontend.daftar', compact('jurusans'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'nisn' => 'required|string|max:20',
        'jenis_kelamin' => 'required',
        'tempat_lahir' => 'required|string|max:100',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required|string',
        'no_hp' => 'required|string|max:20',
        'email' => 'required|email|max:255',
        'asal_sekolah' => 'nullable|string|max:255',
        'jurusan_pilihan' => 'required|string|max:100',
        'nama_ayah' => 'nullable|string|max:255',
        'nama_ibu' => 'nullable|string|max:255',
        'pas_foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'scan_skhun' => 'nullable|mimes:jpg,jpeg,png,pdf|max:4096',
        'status_pendaftaran' => 'nullable|string|max:50',
    ]);

    // Simpan file kalau ada
    if ($request->hasFile('pas_foto')) {
        $validated['pas_foto'] = $request->file('pas_foto')->store('pas_foto', 'public');
    }
    if ($request->hasFile('scan_skhun')) {
        $validated['scan_skhun'] = $request->file('scan_skhun')->store('scan_skhun', 'public');
    }

    PendaftaranSiswa::create($validated);

    return redirect()->back()->with('success', 'Pendaftaran berhasil dikirim! Silahkan tunggu konfirmasi melalui email atau nomor HP yang Anda berikan.');
}

}
