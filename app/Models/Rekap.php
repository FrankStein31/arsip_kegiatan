<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'kegiatan', 'lokasi', 'tanggal', 'keterangan', 'dokumentasi',
    ];
}
