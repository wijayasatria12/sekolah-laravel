<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo', 'namasekolah', 'judulkecil', 'alamat', 'no_wa', 'email',
        'sejarah', 'visi', 'misi', 'embeded_maps'
    ];
}
