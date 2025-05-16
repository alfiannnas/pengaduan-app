<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Status Pengaduan</title>
    <style>
        /* --- Style nya tetap sama kayak sebelumnya --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #f7f7f7;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #A30303;
            display: flex;
            align-items: center;
            padding: 10px 30px;
            color: white;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        header img {
            width: 50px;
            margin-right: 10px;
        }

        nav {
            margin-left: auto;
            display: flex;
            gap: 20px;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 5px;
        }

        nav .dropdown {
            position: relative;
        }

        nav .dropdown-content,
        nav .dropdown-sub-content {
            display: none;
            position: absolute;
            background: white;
            top: 100%;
            left: 0;
            min-width: 220px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            z-index: 999;
        }

        nav .dropdown-content a,
        nav .dropdown-sub-content a {
            display: block;
            color: black;
            padding: 10px;
            font-weight: normal;
        }

        nav .dropdown-content a:hover,
        nav .dropdown-sub-content a:hover {
            background-color: #3501AE;
            color: white;
        }

        nav .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-sub {
            position: relative;
        }

        .dropdown-sub:hover .dropdown-sub-content {
            display: block;
            left: 100%;
            top: 0;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: bold;
        }

        .container {
            margin: 40px auto;
            width: 95%;
            max-width: 1400px;
            background: white;
            padding: 30px;
            border: 2px solid #A30303;
            border-radius: 10px;
        }

        h2 {
            color: #A30303;
            margin-bottom: 30px;
            font-size: 28px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #A30303;
            padding: 14px;
            text-align: center;
            font-size: 16px;
        }

        th {
            background: #A30303;
            color: white;
        }

        td img {
            width: 120px;
            height: auto;
            object-fit: cover;
            border-radius: 10px;
        }

        .status-selesai {
            background: green;
            color: white;
            padding: 8px 12px;
            border-radius: 8px;
            display: inline-block;
        }

        .status-menunggu {
            background: orange;
            color: white;
            padding: 8px 12px;
            border-radius: 8px;
            display: inline-block;
        }

        .btn-hapus {
            background: red;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-tanggapan {
            background: #4CAF50;
            color: white;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 14px;
            margin-top: 5px;
            text-decoration: none;
            display: inline-block;
        }

        footer {
            background-color: #A30303;
            color: white;
            display: flex;
            justify-content: space-around;
            padding: 40px 20px;
            flex-wrap: wrap;
            margin-top: 60px;
        }

        footer img {
            width: 70px;
            margin-bottom: 10px;
        }

        footer h3 {
            margin-bottom: 15px;
        }

        footer a {
            color: white;
            text-decoration: none;
            margin-top: 5px;
            display: block;
        }

        footer a:hover {
            text-decoration: underline;
        }

        .copyright {
            background: #F12F2F;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 14px;
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

    <header>
        <img src="{{ asset('images/logo.png') }}" alt="Logo Desa">
        <strong>DESA TUNDAGAN</strong>
        <nav>
            <a href="{{ route('home') }}">HOME</a>
            <div class="dropdown">
                <a href="#">PENGADUAN</a>
                <div class="dropdown-content">
                    <a href="{{ route('pengaduan-bantuan-sosial') }}">Pengaduan Bantuan Sosial</a>
                    <a href="{{ route('pengaduan-lingkungan') }}">Pengaduan Lingkungan</a>
                    <div class="dropdown-sub">
                        <a href="#">Pengaduan Administratif</a>
                        <div class="dropdown-sub-content">
                            <a href="{{ route('kesalahan-penulisan-data') }}">Kesalahan Penulisan Data</a>
                            <a href="{{ route('permasalahan-dokumen') }}">Permasalahan Dokumen</a>
                            <a href="{{ route('keterlambatan-proses') }}">Keterlambatan Proses</a>
                            <a href="{{ route('pelayanan-tidak-sesuai') }}">Pelayanan Tidak Sesuai</a>
                        </div>
                    </div>
                    <a href="{{ route('pengaduan-keamanan') }}">Pengaduan Keamanan dan Ketertiban</a>
                </div>
            </div>
            <a href="{{ route('status-pengaduan') }}">STATUS PENGADUAN</a>
            <a href="#">PROFIL DESA</a>
            <div class="user-info">
                <a href="#">👨🏻‍💼 {{ Auth::user()->name }}</a>
                <a href="{{ route('logout') }}">LOGOUT</a>
            </div>
        </nav>
    </header>

    <div class="container">
        <h2>Status Pengaduan Anda</h2>
        <table>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>JUDUL</th>
                    <th>ISI</th>
                    <th>FOTO</th>
                    <th>STATUS</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = ($pengaduan->currentPage() - 1) * $pengaduan->perPage() + 1;
                @endphp
                @foreach ($pengaduan as $index => $data)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ ($data['judul']) }}</td>
                    <td>{{ $data['laporan']}}</td>
                    <td>
                        @if ($data['foto'])
                            <img src="{{ asset('storage/images/' . $data['foto']) }}" style="width:200px;" alt="Foto Bukti">
                        @else
                            <span>Tidak ada Foto</span>
                        @endif
                    </td>
                    <td>
                        <div class="{{ $data['status'] == 'Selesai' ? 'status-selesai' : 'status-menunggu' }}">{{ $data['status'] }}</div><br>
                        <a href="{{ route('status-pengaduan.detail', $data['id']) }}" class="btn-tanggapan">Lihat Tanggapan</a>
                    </td>
                    <td>
                        <form action="{{ route('status-pengaduan.delete', $data['id']) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengaduan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-hapus">HAPUS</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $pengaduan->links() }}
        </div>
    </div>

    <footer>
        <div style="display: flex; align-items: center; gap: 15px;">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Desa">
            <div>
                <h3>Desa Tundagan</h3>
                Kecamatan Watukumpul<br>
                Kabupaten Pemalang<br>
                Provinsi Jawa Tengah
            </div>
        </div>

        <div>
            <h3>Navigasi</h3>
            <a href="{{ route('home') }}">Home</a>
            <a href="#">Pengaduan</a>
            <a href="{{ route('status-pengaduan') }}">Status Pengaduan</a>
            <a href="#">Profil Desa</a>
        </div>

        <div>
            <h3>Kontak Desa</h3>
            📞 0831-5953-5131<br>
            📧 desatundagan@gmail.com<br>
            🕒 07:30 - 16:00 WIB<br>
            📍 Desa Tundagan, Kecamatan Watukumpul
        </div>
    </footer>

    <div class="copyright">
        Copyright © 2025 All rights reserved | Fajar Arif Yanto
    </div>

</body>

</html>