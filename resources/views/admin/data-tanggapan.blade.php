<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Tanggapan</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #A30303;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #fff;
            padding: 20px;
            box-sizing: border-box;
            position: fixed;
        }

        .profile {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            background: #ddd;
            padding: 10px;
        }

        .profile h2 {
            margin-top: 10px;
            font-size: 20px;
            font-weight: bold;
        }

        .sidebar hr {
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            color: black;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .sidebar a:hover {
            background: #f0f0f0;
            border-radius: 8px;
        }

        .sidebar a.logout {
            color: #A30303;
            font-weight: bold;
        }

        .content {
            margin-left: 270px;
            padding: 30px;
            color: white;
        }

        .breadcrumb {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .content h1 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .card-table {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            overflow-x: auto;
        }

        .card-table h2 {
            margin-top: 0;
            margin-bottom: 20px;
            color: #000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1200px;
        }

        th,
        td {
            padding: 12px 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
            color: #000;
        }

        th {
            background-color: #f9f9f9;
            color: #333;
        }

        .btn-export {
            background-color: #28a745;
            color: #fff;
            padding: 8px 16px;
            border: none;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            float: right;
            margin-bottom: 10px;
            text-decoration: none;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            font-size: 12px;
            border-radius: 6px;
            color: #fff;
            font-weight: bold;
        }

        .badge-success {
            background-color: #28a745;
        }

        .badge-warning {
            background-color: #ffc107;
        }

        .badge-danger {
            background-color: #dc3545;
        }

        .btn-hapus {
            background-color: #dc3545;
            color: #fff;
            padding: 5px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            font-weight: bold;
        }

        .pagination {
            display: flex;
            justify-content: start;
            margin-top: 25px;
            list-style: none;
            padding: 0;
            gap: 5px;
        }

        .pagination li a,
        .pagination li span {
            padding: 10px 15px;
            background-color: #fff;
            color: #990000;
            border-radius: 6px;
            border: 1px solid #ddd;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
            display: inline-block;
        }

        .pagination li.active span {
            background-color: #990000;
            color: white;
            border-color: #990000;
            box-shadow: 0 2px 5px rgba(153, 0, 0, 0.2);
        }

        .pagination li a:hover {
            background-color: #f5f5f5;
            border-color: #990000;
            transform: translateY(-2px);
        }
    </style>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body>

    <div class="sidebar">
        <div class="profile">
            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="Profile Admin">
            <h2>Admin</h2>
        </div>
        <hr>
        <a href="{{ route('admin.dashboard') }}"><span>🏠</span> Dashboard</a>
        <a href="{{ route('admin.data-tanggapan') }}" class="active"><span>✅</span> Data Tanggapan</a>
        <a href="{{ route('admin.data-pengaduan') }}"><span>📄</span> Data Pengaduan</a>
        <a href="{{ route('admin.data-petugas') }}"><span>👮</span> Data Petugas</a>
        <a href="{{ route('admin.data-masyarakat') }}"><span>👥</span> Data Masyarakat</a>
        <a href="{{ route('admin.profil-desa') }}"><span>🏡</span> Profil Desa</a>
        <a href="{{ route('logout') }}" class="logout"><span>🚪</span> Keluar</a>
    </div>

    <div class="content">
        <div class="breadcrumb">Pages / Tanggapan</div>
        <h1>Tanggapan</h1>

        <div class="card-table">
            <form method="post" action="{{ route('admin.export-tanggapan') }}" style="margin-bottom:10px;">
                @csrf
                <button type="submit" name="export" value="1" class="btn-export">Export</button>
            </form>
            <h2>Data Tanggapan</h2>
            <table>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>TANGGAL</th>
                        <th>NAMA</th>
                        <th>NIK</th>
                        <th>ALAMAT</th>
                        <th>NO HP</th>
                        <th>JUDUL</th>
                        <th>TANGGAPAN</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tanggapan as $t)
                    <tr>
                        <td>{{ $t->id }}</td>
                        <td>{{ Carbon\Carbon::parse($t->pengaduan->tanggal)->format('Y-m-d') }}</td>
                        <td>{{ $t->pengaduan->nama }}</td>
                        <td>{{ $t->pengaduan->nik }}</td>
                        <td>{{ $t->pengaduan->alamat }}</td>
                        <td>{{ $t->pengaduan->no_hp }}</td>
                        <td>{{ $t->pengaduan->judul }}</td>
                        <td>{{ $t->tanggapan }}</td>
                        <td><span class="badge {{ $t->pengaduan->status === 'Diproses' ? 'badge-warning' : 'badge-success'}}">{{ $t->pengaduan->status }}</span></td>
                        <td>
                            <form action="{{ route('admin.delete-tanggapan', $t['id']) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $tanggapan->links() }}
            </div>
        </div>
    </div>

</body>

</html>