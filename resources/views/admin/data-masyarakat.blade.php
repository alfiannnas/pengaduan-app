<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Masyarakat</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #990000;
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
            color: #990000;
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
            color: #000;
        }

        .btn {
            padding: 6px 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            font-weight: bold;
            margin: 2px;
        }

        .btn-tambah {
            background-color: #28a745;
            color: #fff;
            float: right;
            margin-bottom: 10px;
        }

        .btn-hapus {
            background-color: #dc3545;
            color: #fff;
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
        <a href="dashboard.php"><span>🏠</span> Dashboard</a>
        <a href="{{ route('admin.data-tanggapan') }}" class="active"><span>✅</span> Data Tanggapan</a>
        <a href="{{ route('admin.data-pengaduan') }}"><span>📄</span> Data Pengaduan</a>
        <a href="{{ route('admin.data-petugas') }}"><span>👮</span> Data Petugas</a>
        <a href="{{ route('admin.data-masyarakat') }}"><span>👥</span> Data Masyarakat</a>
        <a href="profile_desa.php"><span>🏡</span> Profil Desa</a>
        <a href="#" class="logout"><span>🚪</span> Keluar</a>
    </div>

    <div class="content">
        <div class="breadcrumb">Pages / Masyarakat</div>
        <h1>Masyarakat</h1>

        <div class="card-table">
            <a href="tambah_data.php" class="btn btn-tambah">Tambah Data</a>

            <table>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>USERNAME</th>
                        <th>NOMOR TELEPON</th>
                        <th>LEVEL</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = ($masyarakat->currentPage() - 1) * $masyarakat->perPage() + 1;
                    @endphp
                    @foreach($masyarakat as $data)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $data['name'] }}</td>
                        <td>{{ $data['username'] }}</td>
                        <td>{{ $data['telephone'] }}</td>
                        <td>{{ $data['level'] }}</td>
                        <td>
                            <form action="{{ route('admin.delete-masyarakat', $data['id']) }}" method="POST" style="display:inline;">
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
                {{ $masyarakat->links() }}
            </div>
        </div>

    </div>

</body>

</html>