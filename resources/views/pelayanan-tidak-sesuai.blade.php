<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Formulir Pengaduan Administratif</title>
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

        .form-container {
            background: white;
            margin: 30px auto;
            padding: 30px;
            border: 2px solid #A30303;
            border-radius: 10px;
            width: 90%;
            max-width: 1200px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
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
            border-radius: 5px;
            cursor: pointer;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form-group {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .form-group input {
            flex: 1;
        }

        form label {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 5px;
        }

        form input[type="text"],
        form input[type="number"],
        form input[type="email"],
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
            min-height: 120px;
        }

        form button[type="submit"] {
            background: green;
            color: white;
            padding: 12px;
            font-size: 18px;
            border: none;
            border-radius: 10px;
            width: 120px;
            align-self: flex-end;
            cursor: pointer;
        }

        form button[type="submit"]:hover {
            background: darkgreen;
        }

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

        
        footer .w-4, 
        footer .h-4 {
            width: 16px !important;
            height: 16px !important;
            vertical-align: middle;
            margin-right: 6px;
        }
        footer .kontak-desa-item {
            display: flex;
            align-items: center;
            margin-bottom: 6px;
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

    <div class="form-container">
        <div class="form-header">
            <h2>FORMULIR ADMINISTRATIF</h2>
            <button onclick="window.history.back()">X</button>
        </div>

        <form action="{{ route('pelayanan-tidak-sesuai.store') }}" method="POST" enctype="multipart/form-data" id="formAdministratif">
            @csrf
            <label>Data Pelapor</label>
            <div class="form-group">
                <input type="text" name="nama" placeholder="Nama Lengkap" required>
                <input type="text" name="nik" placeholder="NIK" required>
            </div>

            <input type="text" name="alamat" placeholder="Alamat" required>
            <input type="text" name="no_hp" placeholder="No. HP" required>
            <input type="email" name="email" placeholder="Email" required>

            <label>Jenis Pengaduan Administratif</label>
            <input type="text" name="judul" value="Pelayanan Tidak Sesuai Prosedur" readonly>

            <label>Uraian Pengaduan</label>
            <textarea name="laporan" placeholder="Tuliskan uraian detail permasalahan Anda di sini..." required></textarea>

            <label for="imgupload">Foto Bukti (Opsional)</label>
            <input type="file" id="imgupload" name="imgupload" accept="image/*">

            <button type="submit">Kirim</button>
        </form>
    </div>

    <div class="popup" id="popupSuccess">
        <div class="popup-content">
            <img src="{{ asset('images/centang.png') }}" alt="Berhasil">
            <h2>{{ session('success') ?? 'Data Berhasil Dikirim!' }}</h2>
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
            <a href="{{ route('home') }}">Pengaduan</a>
            <a href="{{ route('status-pengaduan') }}">Status Pengaduan</a>
            <a href="{{ route('home') }}">Profil Desa</a>
        </div>

        <div>
            <h3>Kontak Desa</h3>
            <div class="kontak-desa-item"><x-lucide-phone class="w-4 h-4" /> 0831-5953-5131</div>
            <div class="kontak-desa-item"><x-lucide-mail class="w-4 h-4" /> desatundagan@gmail.com</div>
            <div class="kontak-desa-item"><x-lucide-clock class="w-4 h-4" /> 07:30 - 16:00 WIB</div>
            <div class="kontak-desa-item"><x-lucide-map-pin class="w-4 h-4" /> Desa Tundagan, Kecamatan Watukumpul</div>
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