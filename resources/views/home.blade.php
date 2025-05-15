<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Website Pengaduan Desa Tundagan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
        }

        /* Header & Hero */
        .hero {
            position: relative;
            width: 100%;
            height: 400px;
            background: url('{{ asset("images/bg.png") }}') center center / cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(5px);
        }

        .hero h1 {
            position: relative;
            color: #A30303;
            font-size: 50px;
            text-align: center;
            font-weight: bold;
            z-index: 1;
        }

        header {
            background-color: #A30303;
            color: white;
            display: flex;
            align-items: center;
            padding: 10px 30px;
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
            position: relative;
            padding: 10px 5px;
        }

        nav .dropdown {
            position: relative;
        }

        nav .dropdown-content,
        nav .dropdown-sub-content {
            display: none;
            position: absolute;
            background-color: white;
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
            text-align: left;
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

        /* Sub Dropdown */
        .dropdown-sub {
            position: relative;
        }

        .dropdown-sub:hover .dropdown-sub-content {
            display: block;
            left: 100%;
            top: 0;
        }

        /* Style tambahan */
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: bold;
        }

        /* Section lainnya */
        .stat-box {
            border: 2px solid #A30303;
            border-radius: 10px;
            padding: 20px 40px;
            text-align: center;
            background: white;
        }

        .stat-box h3 {
            color: #A30303;
            margin-bottom: 10px;
        }

        .stat-box span {
            font-size: 30px;
            color: #333;
        }

        .guide {
            background: white;
            margin: 30px 50px;
            padding: 30px;
            border: 2px solid #A30303;
            border-radius: 10px;
        }

        .guide h2 {
            color: #A30303;
            margin-bottom: 20px;
        }

        .guide ol {
            color: #333;
            line-height: 1.8;
            margin-left: 20px;
        }

        footer {
            background-color: #A30303;
            color: white;
            display: flex;
            justify-content: space-around;
            padding: 30px;
            flex-wrap: wrap;
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
            <a href="{{ route('home') }}">HOME</a>

            <div class="dropdown">
                <a href="#">PENGADUAN</a>
                <div class="dropdown-content">
                    <a href="{{ route('pengaduan-bantuan-sosial') }}">Pengaduan Bantuan Sosial</a>
                    <a href="{{ route('pengaduan-lingkungan') }}">Pengaduan Lingkungan</a>

                    <div class="dropdown-sub">
                        <a href="#">Pengaduan Administratif</a>
                        <div class="dropdown-sub-content">
                            <a href="">Kesalahan Penulisan Data Pribadi</a>
                            <a href="">Permasalahan Dokumen</a>
                            <a href="">Keterlambatan Proses Administratif</a>
                            <a href="">Pelayanan Tidak Sesuai Prosedur</a>
                        </div>
                    </div>

                    <a href="">Pengaduan Keamanan dan Ketertiban</a>
                </div>
            </div>

            <a href="#">STATUS PENGADUAN</a>

            <div class="dropdown">
                <a href="#">PROFIL DESA</a>
                <div class="dropdown-content">
                    <a href="">Sejarah</a>
                    <a href="#">Struktur Organisasi</a>
                    <a href="#">Visi dan Misi</a>
                    <a href="#">Lokasi</a>
                    <a href="#">Kontak</a>
                </div>
            </div>
            <div class="user-info">
                <a href="{{ Auth::check() ? route('logout') : route('login') }}">{{ Auth::check() ? '👨🏻‍💼 ' . Auth::user()->name : 'Login' }}</a>
                <a href="{{ Auth::check() ? route('logout') : route('registration') }}">{{ Auth::check() ? 'LOGOUT' : 'Register' }}</a>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Selamat Datang<br>Website Pengaduan Desa Tundagan</h1>
    </section>

    <!-- Panduan -->
    <div class="guide">
        <h2>Panduan Pengaduan</h2>
        <ol>
            <li>Kunjungi website pengaduan desa tundagan.</li>
            <li>Lakukan login (jika sudah punya akun) atau registrasi (jika belum punya akun).</li>
            <li>Pilih menu Pengaduan.</li>
            <li>Pilih pengaduan yang ingin dipilih.</li>
            <li>Isi formulir pengaduan yang sudah disediakan.</li>
            <li>Kirim pengaduan dengan menekan tombol “Kirim”.</li>
            <li>Cek status pengaduan di menu Status Pengaduan.</li>
            <li>Pengaduan Anda akan diteruskan kepada pihak terkait untuk ditindaklanjuti.</li>
            <li>Berikan masukan atau penilaian terhadap pelayanan apabila pengaduan sudah terselesaikan.</li>
        </ol>
    </div>

    <!-- Footer -->
    <footer>
        <div style="display: flex; align-items: center; gap: 15px;">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Desa" style="width: 60px;">
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
            <a href="home1.php">Pengaduan</a>
            <a href="home1.php">Status Pengaduan</a>
            <a href="home1.php">Profil Desa</a>
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