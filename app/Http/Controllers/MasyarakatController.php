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
        if (Auth::check()) {
            return view('pengaduan-bantuan-sosial');
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
}
