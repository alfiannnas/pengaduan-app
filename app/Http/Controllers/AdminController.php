<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pengaduan = Pengaduan::count();
        $tanggapan = Tanggapan::count();
        $masyarakat = User::where('level', 'Masyarakat')->count();
        $petugas = User::where('level', 'Petugas')->count();
        return view('admin.dashboard', compact('pengaduan', 'tanggapan', 'masyarakat', 'petugas'));
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

    public function exportTanggapan(Request $request)
    {
        $tanggapan = Tanggapan::with('pengaduan')->get();
        
        return Excel::download(
            new class($tanggapan) implements \Maatwebsite\Excel\Concerns\FromCollection, 
                \Maatwebsite\Excel\Concerns\WithHeadings,
                \Maatwebsite\Excel\Concerns\WithMapping {
                
                protected $tanggapan;
                
                public function __construct($tanggapan)
                {
                    $this->tanggapan = $tanggapan;
                }
                
                public function collection()
                {
                    return $this->tanggapan;
                }
                
                public function headings(): array
                {
                    return [
                        
                        'No',
                        'Tanggal',
                        'Nama',
                        'NIK',
                        'Alamat',
                        'No HP',
                        'Judul',
                        'Tanggapan',
                        'Status',
                    ];
                }
                private $counter = 1;
                
                public function map($row): array
                {
                    return [
                        $this->counter++,
                        Carbon::parse($row->pengaduan->tanggal)->format('Y-m-d'),
                        $row->pengaduan->nama ?? 'N/A',
                        $row->pengaduan->nik ?? 'N/A',
                        $row->pengaduan->alamat ?? 'N/A',
                        $row->pengaduan->no_hp ?? 'N/A',
                        $row->pengaduan->judul ?? 'N/A',
                        $row->tanggapan ?? 'N/A',
                        $row->pengaduan->status ?? 'N/A',
                    ];
                }
            },
            'tanggapan.xlsx'
        );
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

    public function exportPengaduan(Request $request)
    {
        $pengaduan = Pengaduan::with('tanggapanDetail')->get();
        
        return Excel::download(
            new class($pengaduan) implements \Maatwebsite\Excel\Concerns\FromCollection, 
                \Maatwebsite\Excel\Concerns\WithHeadings,
                \Maatwebsite\Excel\Concerns\WithMapping {
                
                protected $pengaduan;
                
                public function __construct($pengaduan)
                {
                    $this->pengaduan = $pengaduan;
                }
                
                public function collection()
                {
                    return $this->pengaduan;
                }
                
                public function headings(): array
                {
                    return [
                        'No',
                        'Tanggal',
                        'Nama',
                        'NIK',
                        'Alamat',
                        'No HP',
                        'Judul', 
                        'Laporan',
                        'Status',
                        'Tanggapan',
                    ];
                }
                
                public function map($row): array
                {
                    static $i = 1;
                    return [
                        $i++,
                        Carbon::parse($row->tanggal)->format('Y-m-d'),
                        $row->nama ?? 'N/A',
                        $row->nik ?? 'N/A',
                        $row->alamat ?? 'N/A',
                        $row->no_hp ?? 'N/A',
                        $row->judul ?? 'N/A', 
                        $row->laporan ?? 'N/A',
                        $row->status,
                        $row->tanggapanDetail->tanggapan ?? 'N/A',
                    ];
                }
            },
            'pengaduan.xlsx'
        );
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

    public function profilDesa()
    {
        return view('admin.profil-desa');
    }
}