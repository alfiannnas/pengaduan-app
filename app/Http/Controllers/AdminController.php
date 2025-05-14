<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function dataTanggapan()
    {
        $tanggapan = Tanggapan::with('pengaduan')->paginate(10);
        return view('admin.data-tanggapan', compact('tanggapan'));
    }

    public function dataPengaduan()
    {
        $pengaduan = Pengaduan::paginate(10);
        return view('admin.data-pengaduan', compact('pengaduan'));
    }
}