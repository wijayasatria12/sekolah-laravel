<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPendaftaranSiswa extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_siswas'; // Nama tabel

    protected $fillable = [
        'nama_lengkap',
        'nisn',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'asal_sekolah',
        'jurusan_pilihan',
        'nama_ayah',
        'nama_ibu',
        'no_hp',
        'email',
        'status_pendaftaran', // misalnya: diterima / menunggu / ditolak
    ];
}
