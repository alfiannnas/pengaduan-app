<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Lokasi Desa Tundagan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #f9f9f9;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background: #A30303;
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
            background: #3501AE;
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

        .content {
            background: white;
            padding: 40px;
            width: 90%;
            max-width: 1200px;
            margin: 30px auto;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            color: black;
            margin-bottom: 10px;
        }

        .subtitle {
            font-size: 16px;
            color: #666;
            margin-bottom: 30px;
        }

        .lokasi-container {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
        }

        .lokasi-info {
            border: 2px solid #A30303;
            border-radius: 10px;
            padding: 20px;
            flex: 1;
            min-width: 280px;
        }

        .lokasi-info h2 {
            font-size: 20px;
            color: black;
            margin-bottom: 15px;
        }

        .lokasi-info table {
            width: 100%;
            border-collapse: collapse;
        }

        .lokasi-info th,
        .lokasi-info td {
            padding: 8px 5px;
            text-align: left;
        }

        .lokasi-info th {
            color: gray;
            font-weight: normal;
        }

        .lokasi-info td strong {
            color: black;
        }

        .map {
            flex: 1;
            min-width: 280px;
            height: 400px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .map iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        footer {
            background: #A30303;
            color: white;
            display: flex;
            justify-content: space-around;
            padding: 30px 20px;
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
        .user-link {
            display: flex;
            align-items: center;
            gap: 2px;
            text-decoration: none;
            color: inherit;
        }

        .user-icon {
            width: 20px;
            height: 20px;
            margin-rigt: -2px;
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
                @if (Auth::check())
                    <a href="{{ route('profile') }}" class="user-link">
                        <x-lucide-user class="user-icon" />
                        <span>{{ Auth::user()->name }}</span>
                    </a>
                    <a href="{{ route('logout') }}">LOGOUT</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('registration') }}">Register</a>
                @endif
            </div>
        </nav>
    </header>

    <div class="content">
        <div class="title">LOKASI DESA</div>
        <div class="subtitle">Lokasi Desa Tundagan</div>

        <div class="lokasi-container">
            <div class="lokasi-info">
                <h2>Desa Tundagan</h2>
                <table>
                    <tr>
                        <th colspan="2">Batas Desa</th>
                    </tr>
                    <tr>
                        <td><strong>Utara</strong></td>
                        <td>Desa Tlagasana</td>
                    </tr>
                    <tr>
                        <td><strong>Selatan</strong></td>
                        <td>Desa Panusupan (Purbalingga)</td>
                    </tr>
                    <tr>
                        <td><strong>Barat</strong></td>
                        <td>Desa Bongas</td>
                    </tr>
                    <tr>
                        <td><strong>Timur</strong></td>
                        <td>Desa Klesem (Pekalongan)</td>
                    </tr>
                </table>
            </div>

            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63399.89910678082!2d109.2348722!3d-7.2422617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7020110f6fbd27%3A0x8c0c4d09b4ea9e67!2sTundagan%2C%20Watukumpul%2C%20Pemalang%20Regency%2C%20Central%20Java!5e0!3m2!1sen!2sid!4v1714300000000!5m2!1sen!2sid"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
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

</body>

</html>