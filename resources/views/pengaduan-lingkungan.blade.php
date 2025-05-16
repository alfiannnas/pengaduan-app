<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Formulir Pengaduan Lingkungan</title>
    <style>
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

        /* Navbar */
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
            position: relative;
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

        /* Formulir */
        .form-container {
            background: white;
            margin: 30px auto;
            padding: 30px;
            border: 2px solid #A30303;
            border-radius: 10px;
            width: 90%;
            max-width: 1200px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .form-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #A30303;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .form-header h2 {
            color: #A30303;
            font-size: 24px;
        }

        .form-header button {
            background: #A30303;
            color: white;
            border: none;
            font-size: 20px;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            cursor: pointer;
        }

        form label {
            display: block;
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 5px;
            font-size: 16px;
        }

        form input[type="text"],
        form textarea,
        form input[type="file"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        form textarea {
            resize: vertical;
            min-height: 100px;
        }

        .btn-kirim {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
            float: right;
            margin-top: 20px;
        }

        .btn-kirim:hover {
            background-color: #218838;
        }

        /* Popup */
        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            visibility: hidden;
            opacity: 0;
            transition: 0.3s;
            z-index: 1000;
        }

        .popup.show {
            visibility: visible;
            opacity: 1;
        }

        .popup-content {
            background: white;
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .popup-content img {
            width: 80px;
            margin-bottom: 20px;
        }

        .popup-content h2 {
            color: black;
            font-size: 24px;
            margin-bottom: 10px;
        }

        /* Footer */
        footer {
            background-color: #A30303;
            color: white;
            display: flex;
            justify-content: space-around;
            padding: 30px;
            flex-wrap: wrap;
            margin-top: auto;
        }

        footer img {
            width: 60px;
            margin-bottom: 10px;
        }

        footer h3 {
            margin-bottom: 10px;
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
            padding: 10px;
            font-size: 14px;
        }
    </style>
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
</head>

<body>

    <!-- Navbar -->
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
                            <a href="{{ route('kesalahan-penulisan-data') }}">Kesalahan Penulisan Data Pribadi</a>
                            <a href="{{ route('permasalahan-dokumen') }}">Permasalahan Dokumen</a>
                            <a href="{{ route('keterlambatan-proses') }}">Keterlambatan Proses Administratif</a>
                            <a href="{{ route('pelayanan-tidak-sesuai') }}">Pelayanan Tidak Sesuai Prosedur</a>
                        </div>
                    </div>
                    <a href="{{ route('pengaduan-keamanan') }}">Pengaduan Keamanan dan Ketertiban</a>
                </div>
            </div>

            <a href="{{ route('status-pengaduan') }}">STATUS PENGADUAN</a>

            <div class="dropdown">
                <a href="#">PROFIL DESA</a>
                <div class="dropdown-content">
                    <a href="{{ route('sejarah-desa') }}">Sejarah</a>
                    <a href="{{ route('struktur-organisasi') }}">Struktur Organisasi</a>
                    <a href="{{ route('visi-misi') }}">Visi dan Misi</a>
                    <a href="{{ route('lokasi') }}">Lokasi</a>
                    <a href="{{ route('kontak') }}">Kontak</a>
                </div>
            </div>

            <div class="user-info">
                <a href="{{ route('profile') }}">👨🏻‍💼 {{ Auth::user()->name }}</a>
                <a href="{{ route('logout') }}">LOGOUT</a>
            </div>
        </nav>
    </header>

    <!-- Formulir -->
    <div class="form-container">
        <div class="form-header">
            <h2>FORMULIR PENGADUAN LINGKUNGAN</h2>
            <button onclick="window.history.back()">X</button>
        </div>

        <form action="{{ route('pengaduan-lingkungan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="judul">Judul Laporan</label>
            <input type="text" id="judul" name="judul" placeholder="Contoh: Sampah menumpuk" required>

            <label for="laporan">Isi Laporan</label>
            <input type="text" id="laporan" name="laporan" placeholder="Contoh: Sampah banyak di sungai" required>

            <label for="alamat">Alamat Lokasi</label>
            <input type="text" id="alamat" name="alamat" placeholder="Contoh: RT 04 RW 03, Dekat Sungai" required>

            <label for="imgupload">Foto Bukti (Opsional)</label>
            <input type="file" id="imgupload" name="imgupload" accept="image/*">

            <button type="submit" class="btn-kirim">Kirim</button>
        </form>
    </div>

    <!-- Popup -->
    <div class="popup" id="popupSuccess">
        <div class="popup-content">
            <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" alt="Centang">
            <h2>{{ session('success') ?? 'DATA BERHASIL TERKIRIM' }}</h2>
        </div>
    </div>

    <!-- Footer -->
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
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('home') }}">Pengaduan</a>
            <a href="{{ route('status-pengaduan') }}">Status Pengaduan</a>
            <a href="{{ route('home') }}">Profil Desa</a>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
            const popup = document.getElementById('popupSuccess');
            popup.classList.add('show');
            setTimeout(function() {
                popup.classList.remove('show');
            }, 3000);
            @endif
        });
    </script>

</body>

</html>