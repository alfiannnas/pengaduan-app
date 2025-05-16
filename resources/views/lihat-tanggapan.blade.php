<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Lihat Tanggapan</title>
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

        .container {
            background: white;
            margin: 30px auto;
            padding: 30px;
            border: 2px solid #A30303;
            border-radius: 10px;
            width: 90%;
            max-width: 1000px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .container-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #A30303;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .container-header h2 {
            color: #A30303;
            font-size: 24px;
        }

        .container-header button {
            background: #A30303;
            color: white;
            border: none;
            font-size: 20px;
            width: 35px;
            height: 35px;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            font-size: 16px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            background: #f0f0f0;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .foto-container {
            margin-top: 10px;
        }

        .foto-container img {
            width: 200px;
            height: auto;
            border: 2px solid #ccc;
            padding: 5px;
            border-radius: 10px;
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
            <a href="home2.php">HOME</a>
            <div class="dropdown">
                <a href="home2.php">PENGADUAN</a>
                <div class="dropdown-content">
                    <a href="pengaduan_bansos.php">Pengaduan Bantuan Sosial</a>
                    <a href="pengaduan_lingkungan.php">Pengaduan Lingkungan</a>
                    <div class="dropdown-sub">
                        <a href="home2.php">Pengaduan Administratif</a>
                        <div class="dropdown-sub-content">
                            <a href="kesalahan_penulisan_data.php">Kesalahan Penulisan Data Pribadi</a>
                            <a href="permasalahan_dokumen.php">Permasalahan Dokumen</a>
                            <a href="keterlambatan_proses.php">Keterlambatan Proses Administratif</a>
                            <a href="pelayanan_tidak_sesuai.php">Pelayanan Tidak Sesuai Prosedur</a>
                        </div>
                    </div>
                    <a href="pengaduan_keamanan.php">Pengaduan Keamanan dan Ketertiban</a>
                </div>
            </div>
            <a href="status_pengaduan.php">STATUS PENGADUAN</a>
            <div class="dropdown">
                <a href="home2.php">PROFIL DESA</a>
                <div class="dropdown-content">
                    <a href="sejarah_desa.php">Sejarah</a>
                    <a href="struktur_organisasi.php">Struktur Organisasi</a>
                    <a href="visi_misi.php">Visi dan Misi</a>
                    <a href="lokasi.php">Lokasi</a>
                    <a href="kontak.php">Kontak</a>
                </div>
            </div>
            <div class="user-info">
                <a href="profile.php">👨🏻‍💼 {{ Auth::user()->name }}</a>
                <a href="home2.php?logout=true">LOGOUT</a>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="container-header">
            <h2>LIHAT TANGGAPAN</h2>
            <button onclick="window.history.back()">X</button>
        </div>

        <div class="form-group">
            <label>Judul Laporan</label>
            <input type="text" value="{{ $pengaduan->judul }}" readonly>
        </div>

        <div class="form-group">
            <label>Isi Laporan</label>
            <input type="text" value="{{ $pengaduan->laporan }}" readonly>
        </div>

        <div class="form-group">
            <label>Foto</label>
            <div class="foto-container">
            @if ($pengaduan->foto)
                <img src="{{ asset('storage/images/' . $pengaduan->foto) }}" style="width:200px;" alt="Foto Bukti">
            @else
                <span>Tidak ada Foto</span>
            @endif
            </div>
        </div>

        <div class="form-group">
            <label>Tanggapan</label>
            <input type="text" value="{{ $pengaduan->tanggapanDetail->tanggapan ?? 'Belum ada tanggapan' }}" readonly>
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
            <a href="home2.php">Home</a>
            <a href="home2.php">Pengaduan</a>
            <a href="status_pengaduan.php">Status Pengaduan</a>
            <a href="home2.php">Profil Desa</a>
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