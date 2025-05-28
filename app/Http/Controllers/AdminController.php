<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\ProfileDesa;
use App\Models\Tanggapan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

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
        $tanggapan = Tanggapan::with('pengaduan')
            ->whereHas('pengaduan')
            ->select('tanggapan.*')
            ->join(DB::raw('(SELECT pengaduan_id, MAX(created_at) as latest_date FROM tanggapan GROUP BY pengaduan_id) as latest'), function($join) {
                $join->on('tanggapan.pengaduan_id', '=', 'latest.pengaduan_id')
                     ->on('tanggapan.created_at', '=', 'latest.latest_date');
            })
            ->paginate(10);
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
        $tanggapan = Tanggapan::with('pengaduan')
            ->whereHas('pengaduan')
            ->get();

        return Excel::download(
            new class($tanggapan) implements
                \Maatwebsite\Excel\Concerns\FromCollection,
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

    public function dataPengaduan(Request $request)
    {
        $query = Pengaduan::with('tanggapanDetail');
        
        // Filter by jenis_pengaduan
        if ($request->has('jenis_pengaduan') && $request->jenis_pengaduan != '') {
            $query->where('jenis_pengaduan', $request->jenis_pengaduan);
        }
        
        // Filter by nama
        if ($request->has('nama') && $request->nama != '') {
            $query->where('nama', 'like', '%' . $request->nama . '%');
        }
        
        $pengaduan = $query->paginate(10);
        
        // Hardcoded jenis pengaduan values
        $jenisPengaduan = [
            'Pengaduan Bantuan Sosial',
            'Pengaduan Lingkungan',
            'Pengaduan Kesalahan Penulisan Data',
            'Pengaduan Permasalahan Dokumen',
            'Pengaduan Keterlambatan Proses',
            'Pengaduan Pelayanan Tidak Sesuai',
            'Pengaduan Keamanan'
        ];
        
        return view('admin.data-pengaduan', compact('pengaduan', 'jenisPengaduan'));
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
            new class($pengaduan) implements
                \Maatwebsite\Excel\Concerns\FromCollection,
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
                        'Jenis Pengaduan',
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
                        $row->jenis_pengaduan ?? 'N/A',
                        $row->laporan ?? 'N/A',
                        $row->status,
                        $row->tanggapanDetail->tanggapan ?? 'N/A',
                    ];
                }
            },
            'pengaduan.xlsx'
        );
    }

    public function verifikasiPengaduan(Request $request)
    {
        $pengaduan = Pengaduan::find($request->pengaduan_id);
        $pengaduan->status = $request->status;
        $pengaduan->save();
        return redirect()->back()->with('success', 'Pengaduan berhasil diverifikasi');
    }

    public function tanggapiPengaduan(Request $request)
    {
        $request->validate([
            'tanggapan' => 'required',
            'file_tanggapan' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048'
        ]);

        $pengaduan = Pengaduan::find($request->pengaduan_id);

        $tanggapan = Tanggapan::firstOrNew(['pengaduan_id' => $pengaduan->id]);
        $tanggapan->tanggapan = $request->tanggapan;
        
        // Handle file upload
        if ($request->hasFile('file_tanggapan')) {
            $file = $request->file('file_tanggapan');
            $filename = time() . '_' . $file->getClientOriginalName();
            // Store in public disk
            $file->move(public_path('storage/tanggapan'), $filename);
            $tanggapan->file_tanggapan = $filename;
        }
        
        $pengaduan->status = 'Selesai';
        $pengaduan->save();
        
        $tanggapan->save();
        
        return redirect()->back()->with('success', 'Pengaduan berhasil ditanggapi');
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
        $profilDesa = ProfileDesa::all();
        return view('admin.profil-desa', compact('profilDesa'));
    }

    public function storeProfilDesa(Request $request)
    {
        ProfileDesa::create([
            'nama' => 'Nama Baru',
            'level' => 'Admin',
        ]);

        return redirect()->route('admin.profil-desa')->with('success', 'Profil Desa berhasil ditambahkan');
    }

    public function editProfilDesa($id)
    {
        $profilDesa = ProfileDesa::find($id);
        return view('admin.edit-profil-desa', compact('profilDesa'));
    }

    public function deleteProfilDesa(Request $request)
    {
        $profilDesa = ProfileDesa::find($request->id);
        $profilDesa->delete();

        return redirect()->route('admin.profil-desa')->with('success', 'Profil Desa berhasil dihapus');
    }

    public function updateProfilDesa(Request $request, $id)
    {
        $profilDesa = ProfileDesa::find($id);

        $profilDesa->nama = $request->nama;
        $profilDesa->deskripsi = $request->deskripsi;
        $profilDesa->save();

        return redirect()->route('admin.profil-desa')->with('success', 'Profil Desa berhasil diubah');
    }
}
