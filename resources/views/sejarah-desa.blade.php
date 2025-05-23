<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Sejarah Desa Tundagan</title>
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
        }

        .content h2 {
            margin-bottom: 20px;
        }

        .sejarah-container {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }

        .text-content {
            flex: 1 1 55%;
        }

        .text-content p {
            margin-bottom: 15px;
            font-size: 18px;
            line-height: 1.7;
            text-align: justify;
        }

        .image-content {
            flex: 1 1 40%;
        }

        .image-content img {
            width: 100%;
            border-radius: 10px;
        }

        .selengkapnya {
            color: #A30303;
            background: none;
            border: none;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }

        .hidden-text {
            display: none;
        }

        footer {
            background: #A30303;
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
                <a href="{{ route('sejarah-desa') }}">PROFIL DESA</a>
                <div class="dropdown-content">
                    <a href="{{ route('sejarah-desa') }}">Sejarah</a>
                    <a href="{{ route('struktur-organisasi') }}">Struktur Organisasi</a>
                    <a href="{{ route('visi-misi') }}">Visi dan Misi</a>
                    <a href="{{ route('lokasi') }}">Lokasi</a>
                    <a href="{{ route('kontak') }}">Kontak</a>
                </div>
            </div>
            <div class="user-info">
                <a href="{{ Auth::check() ? route('profile') : route('login') }}">{{ Auth::check() ? '👨🏻‍💼 ' . Auth::user()->name : 'Login' }}</a>
                <a href="{{ Auth::check() ? route('logout') : route('registration') }}">{{ Auth::check() ? 'LOGOUT' : 'Register' }}</a>
            </div>
        </nav>
    </header>

    <div class="content">
        <h2>SEJARAH DESA TUNDAGAN</h2>

        <div class="sejarah-container">
            <div class="text-content">
                <p>Desa Tundagan berdiri sejak masa penjajahan Belanda dan menjadi basis gerilyawan RI. Pada tahun 1920, Desa dipimpin Lurah Tirta Yuda selama 15 tahun, ditandai dengan semangat gotong royong meski masyarakat mengalami kelaparan akibat kekurangan pangan.</p>

                <div id="hiddenText" class="hidden-text">
                    <p>Tahun 1935–1944, Lurah Tarojan memimpin di tengah tekanan tentara Belanda yang membuat banyak warga mengungsi ke hutan. Pada 1945–1960, di bawah Lurah Arjadirana, masyarakat membangun lumbung desa untuk mengatasi kekurangan pangan. Namun, desa juga menghadapi wabah penyakit akibat lingkungan kumuh.</p>

                    <p>Lurah Mujawikarta (1960–1987) memfokuskan pada pelebaran jalan, pembangunan balai desa, dan renovasi lumbung. Dilanjutkan oleh Lurah Jamhari (1987–1997), pembangunan infrastruktur seperti jalan penghubung antar desa dan pengadaan listrik tenaga air mulai berkembang.</p>

                    <p>Pada era Lurah Bunyamin (1997–2006), pembangunan besar-besaran dilakukan, seperti penyediaan air bersih, pengaspalan jalan, pengadaan listrik PLN, dan pembangunan jembatan Sungai Polaga. Namun, bencana tanah longsor dan banjir bandang sempat melanda desa, merelokasi banyak warga.</p>

                    <p>Tahun 2006–2009, di bawah kepemimpinan Imam Mahdi dan PJS Hadi Safa\'at, pembangunan PAMSIMAS, balai desa, dan drainase dilaksanakan.</p>

                    <p>Sejak 2010, Kepala Desa Nurul Humam melanjutkan pembangunan besar seperti pengaspalan jalan, rabat beton, pembangunan irigasi, pengadaan PLTS, embung, dan menara telekomunikasi, meningkatkan infrastruktur dan kesejahteraan masyarakat.</p>

                    <p>Desa Tundagan terus berkembang dengan semangat gotong royong dan pengelolaan yang baik hingga saat ini.</p>
                </div>

                <button id="readMoreBtn" class="selengkapnya" onclick="toggleText()">Selengkapnya</button>
            </div>

            <div class="image-content">
                <img src="{{ asset('images/desa.png') }}" alt="Kantor Desa Tundagan">
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
        function toggleText() {
            var hiddenText = document.getElementById('hiddenText');
            var btn = document.getElementById('readMoreBtn');

            if (hiddenText.style.display === 'none' || hiddenText.style.display === '') {
                hiddenText.style.display = 'block';
                btn.textContent = 'Sembunyikan';
            } else {
                hiddenText.style.display = 'none';
                btn.textContent = 'Selengkapnya';
            }
        }
    </script>

</body>

</html>