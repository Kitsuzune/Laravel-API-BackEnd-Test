<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{

    protected $fillable = [
        'nim',
        'nama_mahasiswa',
        'status',
    ];

    use HasFactory;
}
