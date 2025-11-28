<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminPendaftaranSiswa;
use App\Models\Jurusan;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PendaftaranExport;

class AdminPendaftaranController extends Controller
{
    /*public function index()
    {
        //$pendaftaran = AdminPendaftaranSiswa::latest()->get();
        $pendaftaran = AdminPendaftaranSiswa::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pendaftaran.index', compact('pendaftaran'));
    }*/

    public function index(Request $request)
    {
        $search = $request->search;
        $pendaftaran = AdminPendaftaranSiswa::when($search, function ($query) use ($search) {
            $query->where('nama_lengkap', 'like', "%$search%")
                ->orWhere('nisn', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('asal_sekolah', 'like', "%$search%");
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        // agar pagination tidak menghilangkan keyword search
        $pendaftaran->appends(['search' => $search]);
        return view('admin.pendaftaran.index', compact('pendaftaran'));
    }

    public function exportExcel()
{
    // Ambil seluruh data pendaftaran tanpa pagination
    $data = \App\Models\AdminPendaftaranSiswa::select(
        'nama_lengkap',
        'nisn',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_hp',
        'email',
        'jurusan_pilihan',
        'nama_ayah',
        'nama_ibu',
        'asal_sekolah',
        'status_pendaftaran',
        'created_at'
    )->orderBy('nama_lengkap', 'ASC')->get();

    // Nama file
    $filename = "pendaftaran_siswa_" . date('Ymd_His') . ".xls";

    // Atur header agar browser mendownload file Excel
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");

    $output = fopen("php://output", "w");

    // Header kolom Excel
    fputcsv($output, [
        'Nama Lengkap',
        'NISN',
        'Jenis Kelamin',
        'Tempat Lahir',
        'Tanggal Lahir',
        'Alamat',
        'No. HP',
        'Email',
        'Jurusan Pilihan',
        'Nama Ayah',
        'Nama Ibu',
        'Asal Sekolah',
        'Status Pendaftaran',
        'Created At',
    ], "\t");

    // Isi data
    foreach ($data as $row) {
        fputcsv($output, [
            $row->nama_lengkap,
            $row->nisn,
            $row->jenis_kelamin,
            $row->tempat_lahir,
            $row->tanggal_lahir,
            $row->alamat,
            $row->no_hp,
            $row->email,
            $row->jurusan_pilihan,
            $row->nama_ayah,
            $row->nama_ibu,
            $row->asal_sekolah,
            $row->status_pendaftaran,
            $row->created_at ? $row->created_at->format('Y-m-d H:i:s') : '',
        ], "\t");
    }

    fclose($output);
    exit;
}


    public function show($id)
    {
        $siswa = AdminPendaftaranSiswa::findOrFail($id);
        return view('admin.pendaftaran.showdetail', compact('siswa'));
    }

    public function updateStatus($id, $status)
    {
        $siswa = AdminPendaftaranSiswa::findOrFail($id);
        $siswa->status_pendaftaran = $status;
        $siswa->save();

        return redirect()->back()->with('success', 'Status pendaftaran berhasil diubah menjadi ' . ucfirst($status) . '.');
    }

    public function edit($id)
{
    $jurusans = Jurusan::orderBy('namajurusan', 'asc')->get();
    $siswa = AdminPendaftaranSiswa::findOrFail($id);
    return view('admin.pendaftaran.edit', compact('siswa', 'jurusans'));
}

public function update(Request $request, $id)
{
    $siswa = AdminPendaftaranSiswa::findOrFail($id);

    $validated = $request->validate([
        'nama_lengkap' => 'required|string|max:191',
        'nisn' => 'nullable|string|max:191',
        'jenis_kelamin' => 'required',
        'tempat_lahir' => 'nullable|string|max:191',
        'tanggal_lahir' => 'nullable|date',
        'alamat' => 'nullable|string',
        'no_hp' => 'nullable|string|max:191',
        'email' => 'nullable|email|max:191',
        'jurusan_pilihan' => 'required|string|max:191',
        'nama_ayah' => 'nullable|string|max:191',
        'nama_ibu' => 'nullable|string|max:191',
        'asal_sekolah' => 'nullable|string|max:191',
        'status_pendaftaran' => 'required|string',
    ]);

    $siswa->update($validated);

    return redirect()->route('admin.pendaftaran.index')->with('success', 'Data pendaftaran berhasil diperbarui.');
}


    public function destroy($id)
    {
        $siswa = AdminPendaftaranSiswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('admin.pendaftaran.index')->with('success', 'Data pendaftaran berhasil dihapus.');
    }
}
