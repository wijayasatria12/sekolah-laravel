<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranSiswa extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_siswas'; // pastikan sesuai nama tabel di database

    protected $fillable = [
        'nama_lengkap',
        'nisn',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_hp',
        'email',
        'asal_sekolah',
        'jurusan_pilihan',
        'nama_ayah',
        'nama_ibu',
        'pas_foto',
        'scan_skhun',
        'status_pendaftaran',
    ];
}
