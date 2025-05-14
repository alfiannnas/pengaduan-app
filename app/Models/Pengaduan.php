<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengaduan extends Model
{
    use SoftDeletes;

    protected $table = 'pengaduan';
    protected $fillable = [
        'tanggal',
        'nama',
        'nik',
        'alamat',
        'no_hp',
        'judul',
        'laporan',
        'foto',
        'status'
    ];
}
