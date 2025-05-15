<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasyarakatController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function pengaduanBantuanSosial()
    {
        if (Auth::check() && Auth::user()->level == 'Masyarakat') {
            return view('pengaduan-bantuan-sosial');
        } else if (Auth::check() && Auth::user()->level == 'Admin' || Auth::user()->level == 'Petugas') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('login');
        }
    }

    public function storePengaduanBantuanSosial(Request $request)
    {
        Pengaduan::create([
            'tanggal' => Carbon::now(),
            'nama' => Auth::user()->name,
            'nik' => Auth::user()->nik,
            'alamat' => $request->alamat,
            'no_hp' => Auth::user()->telephone,
            'judul' => $request->judul,
            'laporan' => $request->laporan,
            'status' => 'Diproses',

        ]);
        return redirect()->route('pengaduan-bantuan-sosial')->with('success', 'Pengaduan berhasil dikirim!');
    }

    public function pengaduanLingkungan()
    {
        if (Auth::check() && Auth::user()->level == 'Masyarakat') {
            return view('pengaduan-lingkungan');
        } else if (Auth::check() && Auth::user()->level == 'Admin' || Auth::user()->level == 'Petugas') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('login');
        }
    }

    public function storePengaduanLingkungan(Request $request)
    {
        Pengaduan::create([
            'tanggal' => Carbon::now(),
            'nama' => Auth::user()->name,
            'nik' => Auth::user()->nik,
            'alamat' => $request->alamat,
            'no_hp' => Auth::user()->telephone,
            'judul' => $request->judul,
            'laporan' => $request->laporan,
            'status' => 'Diproses',
        ]);
        return redirect()->route('pengaduan-lingkungan')->with('success', 'Pengaduan berhasil dikirim!');
    }

    public function kesalahanPenulisanData()
    {
        if (Auth::check() && Auth::user()->level == 'Masyarakat') {
            return view('kesalahan-penulisan-data');
        } else if (Auth::check() && Auth::user()->level == 'Admin' || Auth::user()->level == 'Petugas') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('login');
        }
    }

    public function storeKesalahanPenulisanData(Request $request)
    {
        // dd($request->all());
        Pengaduan::create([
            'tanggal' => Carbon::now(),
            'nama' => $request->nama,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'judul' => $request->judul,
            'laporan' => $request->laporan,
            'status' => 'Diproses',
        ]);
        return redirect()->route('kesalahan-penulisan-data')->with('success', 'Pengaduan berhasil dikirim!');
    }
}
