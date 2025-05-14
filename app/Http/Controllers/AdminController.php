<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function dataPengaduan()
    {
        $pengaduan = Pengaduan::paginate(10);
        return view('admin.data-pengaduan', compact('pengaduan'));
    }
}