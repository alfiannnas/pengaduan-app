<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::all();
        return view('pengaduan.index', compact('pengaduan'));
    }
}
