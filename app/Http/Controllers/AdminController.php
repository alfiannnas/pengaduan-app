<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    public function deleteTanggapan($id)
    {
        $tanggapan = Tanggapan::find($id);
        $tanggapan->delete();
        return redirect()->back()->with('success', 'Tanggapan berhasil dihapus');
    }

    public function dataPengaduan()
    {
        $pengaduan = Pengaduan::paginate(10);
        return view('admin.data-pengaduan', compact('pengaduan'));
    }

    public function deletePengaduan($id)
    {
        $pengaduan = Pengaduan::find($id);
        $tanggapan = Tanggapan::where('pengaduan_id', $id)->get();
        foreach ($tanggapan as $t) {
            $t->delete();
        }
        $pengaduan->delete();
        return redirect()->back()->with('success', 'Pengaduan berhasil dihapus');
    }

    public function dataPetugas()
    {
        $petugas = User::where('level', 'Petugas')
            ->orWhere('level', 'Admin')
            ->paginate(10);
        return view('admin.data-petugas', compact('petugas'));
    }

    public function createPetugas()
    {
        return view('admin.create-petugas');
    }

    public function storePetugas(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nik' => 'required|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
            'telephone' => 'required|unique:users',
            'level' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->nik = $request->nik;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->telephone = $request->telephone;
        $user->level = $request->level;
        $user->save();

        return redirect()->route('admin.data-petugas')->with('success', 'Petugas berhasil ditambahkan');
    }

    public function createMasyarakat()
    {
        return view('admin.create-masyarakat');
    }

    public function storeMasyarakat(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nik' => 'required|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
            'telephone' => 'required|unique:users',
            'level' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->nik = $request->nik;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->telephone = $request->telephone;
        $user->level = $request->level;
        $user->save();

        return redirect()->route('admin.data-masyarakat')->with('success', 'Masyarakat berhasil ditambahkan');
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