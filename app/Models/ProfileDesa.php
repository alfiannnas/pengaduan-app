<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfileDesa extends Model
{
    use SoftDeletes;

    protected $table = 'profile_desa';
    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'level',
        'foto'
    ];

}
