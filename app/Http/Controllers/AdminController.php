<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;

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

    public function dataPetugas()
    {
        $petugas = User::where('level', 'Petugas')
            ->orWhere('level', 'Admin')
            ->paginate(10);
        return view('admin.data-petugas', compact('petugas'));
    }

    public function deletePetugas($id)
    {
        $petugas = User::find($id);
        $petugas->delete();
        return redirect()->back()->with('success', 'Petugas berhasil dihapus');
    }

    public function dataMasyarakat()
    {
        $masyarakat = User::where('level', 'Masyarakat')
            ->paginate(10);
        return view('admin.data-masyarakat', compact('masyarakat'));
    }

    public function deleteMasyarakat($id)
    {
        $masyarakat = User::find($id);
        $masyarakat->delete();
        return redirect()->back()->with('success', 'Masyarakat berhasil dihapus');
    }
}