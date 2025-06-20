<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\User;
use App\Models\ProfileDesa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        // Store Image
        $extension = $request->file('imgupload')->extension();
        $imgname = date('dmyHis') . '.' . $extension;
        $request->file('imgupload')->storeAs('images', $imgname);
        
        Pengaduan::create([
            'user_id' => Auth::user()->id,
            'jenis_pengaduan' => 'Pengaduan Bantuan Sosial',
            'tanggal' => Carbon::now(),
            'nama' => Auth::user()->name,
            'nik' => Auth::user()->nik,
            'alamat' => $request->alamat,
            'no_hp' => Auth::user()->telephone,
            'judul' => $request->judul,
            'laporan' => $request->laporan,
            'status' => 'Diproses',
            'foto' => $imgname
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
        // Store Image
        $extension = $request->file('imgupload')->extension();
        $imgname = date('dmyHis') . '.' . $extension;
        $request->file('imgupload')->storeAs('images', $imgname);

        Pengaduan::create([
            'user_id' => Auth::user()->id,
            'jenis_pengaduan' => 'Pengaduan Lingkungan',
            'tanggal' => Carbon::now(),
            'nama' => Auth::user()->name,
            'nik' => Auth::user()->nik,
            'alamat' => $request->alamat,
            'no_hp' => Auth::user()->telephone,
            'judul' => $request->judul,
            'laporan' => $request->laporan,
            'status' => 'Diproses',
            'foto' => $imgname
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
        // Store Image
        $extension = $request->file('imgupload')->extension();
        $imgname = date('dmyHis') . '.' . $extension;
        $request->file('imgupload')->storeAs('images', $imgname);

        Pengaduan::create([
            'user_id' => Auth::user()->id,
            'jenis_pengaduan' => 'Pengaduan Kesalahan Penulisan Data',
            'tanggal' => Carbon::now(),
            'nama' => $request->nama,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'judul' => $request->judul,
            'laporan' => $request->laporan,
            'status' => 'Diproses',
            'foto' => $imgname
        ]);
        return redirect()->route('kesalahan-penulisan-data')->with('success', 'Pengaduan berhasil dikirim!');
    }

    public function permasalahanDokumen()
    {
        if (Auth::check() && Auth::user()->level == 'Masyarakat') {
            return view('permasalahan-dokumen');
        } else if (Auth::check() && Auth::user()->level == 'Admin' || Auth::user()->level == 'Petugas') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('login');
        }
    }

    public function storePermasalahanDokumen(Request $request)
    {
        // Store Image
        $extension = $request->file('imgupload')->extension();
        $imgname = date('dmyHis') . '.' . $extension;
        $request->file('imgupload')->storeAs('images', $imgname);

        Pengaduan::create([
            'user_id' => Auth::user()->id,
            'jenis_pengaduan' => 'Pengaduan Permasalahan Dokumen',
            'tanggal' => Carbon::now(),
            'nama' => $request->nama,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'judul' => $request->judul,
            'laporan' => $request->laporan,
            'status' => 'Diproses',
            'foto' => $imgname
        ]);
        return redirect()->route('permasalahan-dokumen')->with('success', 'Pengaduan berhasil dikirim!');
    }

    public function keterlambatanProses()
    {
        if (Auth::check() && Auth::user()->level == 'Masyarakat') {
            return view('keterlambatan-proses');
        } else if (Auth::check() && Auth::user()->level == 'Admin' || Auth::user()->level == 'Petugas') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('login');
        }
    }

    public function storeKeterlambatanProses(Request $request)
    {
        // Store Image
        $extension = $request->file('imgupload')->extension();
        $imgname = date('dmyHis') . '.' . $extension;
        $request->file('imgupload')->storeAs('images', $imgname);

        Pengaduan::create([
            'user_id' => Auth::user()->id,
            'jenis_pengaduan' => 'Pengaduan Keterlambatan Proses',
            'tanggal' => Carbon::now(),
            'nama' => $request->nama,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'judul' => $request->judul,
            'laporan' => $request->laporan,
            'status' => 'Diproses',
            'foto' => $imgname
        ]);
        return redirect()->route('keterlambatan-proses')->with('success', 'Pengaduan berhasil dikirim!');
    }

    public function pelayananTidakSesuai()
    {
        if (Auth::check() && Auth::user()->level == 'Masyarakat') {
            return view('pelayanan-tidak-sesuai');
        } else if (Auth::check() && Auth::user()->level == 'Admin' || Auth::user()->level == 'Petugas') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('login');
        }
    }

    public function storePelayananTidakSesuai(Request $request)
    {
        // Store Image
        $extension = $request->file('imgupload')->extension();
        $imgname = date('dmyHis') . '.' . $extension;
        $request->file('imgupload')->storeAs('images', $imgname);

        Pengaduan::create([
            'user_id' => Auth::user()->id,
            'jenis_pengaduan' => 'Pengaduan Pelayanan Tidak Sesuai',
            'tanggal' => Carbon::now(),
            'nama' => $request->nama,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'judul' => $request->judul,
            'laporan' => $request->laporan,
            'status' => 'Diproses',
            'foto' => $imgname
        ]);
        return redirect()->route('pelayanan-tidak-sesuai')->with('success', 'Pengaduan berhasil dikirim!');
    }

    public function pengaduanKeamanan()
    {
        if (Auth::check() && Auth::user()->level == 'Masyarakat') {
            return view('pengaduan-keamanan');
        } else if (Auth::check() && Auth::user()->level == 'Admin' || Auth::user()->level == 'Petugas') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('login');
        }
    }

    public function storePengaduanKeamanan(Request $request)
    {
        // Store Image
        $extension = $request->file('imgupload')->extension();
        $imgname = date('dmyHis') . '.' . $extension;
        $request->file('imgupload')->storeAs('images', $imgname);

        Pengaduan::create([
            'user_id' => Auth::user()->id,
            'jenis_pengaduan' => 'Pengaduan Keamanan',
            'tanggal' => Carbon::now(),
            'nama' => Auth::user()->name,
            'nik' => Auth::user()->nik,
            'alamat' => $request->alamat,
            'no_hp' => Auth::user()->telephone,
            'judul' => $request->judul,
            'laporan' => $request->laporan,
            'status' => 'Diproses',
            'foto' => $imgname
        ]);
        return redirect()->route('pengaduan-keamanan')->with('success', 'Pengaduan berhasil dikirim!');
    }

    public function statusPengaduan()
    {
        if (Auth::check() && Auth::user()->level == 'Masyarakat') {
            $pengaduan = Pengaduan::where('user_id', Auth::user()->id)
                ->paginate(10);
            return view('status-pengaduan', compact('pengaduan'));
        } else if (Auth::check() && Auth::user()->level == 'Admin' || Auth::user()->level == 'Petugas') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('login');
        }
    }

    public function statusPengaduanDetail($id)
    {
        $user_id = Auth::id();
    
        $pengaduan = Pengaduan::where('id', $id)
            ->where('user_id', $user_id)
            ->first();

        if ($pengaduan) {
            return view('lihat-tanggapan', compact('pengaduan'));
        } else {
            return redirect()->route('status-pengaduan');
        }
    }

    public function deletePengaduan($id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->delete();
        return redirect()->back()->with('success', 'Pengaduan berhasil dihapus');
    }

    public function sejarahDesa()
    {
        $sejarahDesa = ProfileDesa::where('nama', 'Sejarah')->first();
        return view('sejarah-desa', compact('sejarahDesa'));
    }

    public function strukturOrganisasi()
    {
        $strukturOrganisasi = ProfileDesa::where('slug', 'struktur-organisasi')->first();

        return view('struktur-organisasi', [
            'foto' => $strukturOrganisasi->foto ?? null
        ]);
    }

    public function visiMisi()
    {
        // Ambil data dari database (misal slug = 'visi-misi')
        $profilDesa = ProfileDesa::where('slug', 'visi-misi')->first();

        // Default jika tidak ada data
        $visi = '';
        $misi = '';

        if ($profilDesa && $profilDesa->deskripsi) {
            // Ambil isi <h1>Visi</h1><p>...</p> (support multiline)
            preg_match('/<h1>Visi<\/h1><p>(.*?)<\/p>/s', $profilDesa->deskripsi, $visiMatch);
            // Ambil isi <h1>Misi</h1><p>...</p> (support multiline)
            preg_match('/<h1>Misi<\/h1><p>(.*?)<\/p>/s', $profilDesa->deskripsi, $misiMatch);

            $visi = $visiMatch[1] ?? '';
            $misi = $misiMatch[1] ?? '';
        }


        return view('visi-misi', [
            'visi' => $visi,
            'misi' => $misi,
        ]);
    }

    public function lokasi()
    {
        return view('lokasi');
    }

    public function kontak()
    {
        $profilDesa = ProfileDesa::where('slug', 'kontak')->first();

        $deskripsi = $profilDesa->deskripsi;


        preg_match('/<b>Telepon:<\\/b> (.*?)<br>/', $deskripsi, $telp);
        preg_match('/<b>Email:<\\/b> (.*?)<br>/', $deskripsi, $email);
        preg_match('/<b>Jam Kerja:<\\/b> (.*?)<br>/', $deskripsi, $jam);
        preg_match('/<b>Alamat:<\\/b> (.*?)<\\/p>/', $deskripsi, $alamat);

        return view('kontak', [
            'telepon' => $telp[1] ?? '',
            'email' => $email[1] ?? '',
            'jam_kerja' => $jam[1] ?? '',
            'alamat' => $alamat[1] ?? '',
        ]);
    }

    public function profile()
    {
        if (Auth::check() && Auth::user()->level == 'Masyarakat') {
            $userData = User::where('id', Auth::user()->id)->first();
            return view('profile', compact('userData'));
        } else if (Auth::check() && Auth::user()->level == 'Admin' || Auth::user()->level == 'Petugas') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('login');
        }
    }

    public function editProfile()
    {
        if (Auth::check() && Auth::user()->level == 'Masyarakat') {
            $userData = User::where('id', Auth::user()->id)->first();
            return view('edit-profile', compact('userData'));
        } else if (Auth::check() && Auth::user()->level == 'Admin' || Auth::user()->level == 'Petugas') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('login');
        }
    }

    public function storeProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'password' => 'nullable|string|min:6',
        ]);

        $user->name = $request->nama;
        $user->username = $request->username;
        $user->telephone = $request->telepon;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile berhasil diubah');
    }
    

}
