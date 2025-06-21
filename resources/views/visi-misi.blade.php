<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Visi dan Misi Desa Tundagan</title>
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
            text-align: center;
        }

        .content img {
            width: 180px;
            margin-bottom: 20px;
        }

        .content h1 {
            color: #A30303;
            margin-top: 10px;
        }

        .content h3 {
            color: #7a7a7a;
            font-weight: normal;
            margin-top: 5px;
        }

        .visi {
            margin-top: 40px;
        }

        .visi h2 {
            color: #A30303;
            margin-bottom: 10px;
        }

        .visi p {
            font-size: 18px;
            font-weight: bold;
            color: #A30303;
            margin-bottom: 30px;
        }

        .misi {
            margin-top: 20px;
            text-align: left;
        }

        .misi h2 {
            color: #A30303;
            margin-bottom: 15px;
            text-align: center;
        }

        .misi ol {
            margin-left: 30px;
            line-height: 1.8;
            font-size: 16px;
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
        <img src="{{ asset('images/logo.png') }}" alt="Logo Desa Tundagan">
        <h1>DESA TUNDAGAN</h1>
        <h3>Kecamatan Watukumpul, Kabupaten Pemalang, Provinsi Jawa Tengah</h3>

        <div class="visi">
            <h2>VISI</h2>
            <p>{{ $visi }}</p>
        </div>

        <div class="misi">
            <h2>MISI</h2>
            @php
                $misi_items = preg_split('/\r?\n/', $misi);
                $is_list = count($misi_items) > 1;
            @endphp
            @if($is_list)
                <ol style="list-style: none; padding-left: 0;">
                    @foreach($misi_items as $item)
                        @if(trim($item) !== '')
                            <li>{{ $item }}</li>
                        @endif
                    @endforeach
                </ol>
            @else
                <p>{{ $misi }}</p>
            @endif
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