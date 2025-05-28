<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Tanggapan extends Model
{
    use SoftDeletes;

    protected $table = 'tanggapan';
    protected $fillable = [
        'pengaduan_id',
        'tanggapan',
        'file_tanggapan',
    ];

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }
}
