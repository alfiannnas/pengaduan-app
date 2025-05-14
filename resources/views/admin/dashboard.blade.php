<?php
// Tidak ada proses login, ini hanya tampilan (frontend) saja untuk presentasi
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
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

        .cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .card {
            background: #fff;
            color: #000;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card .info {
            font-size: 18px;
        }

        .card .info .number {
            font-size: 28px;
            font-weight: bold;
            margin-top: 5px;
        }

        .icon {
            font-size: 30px;
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
        <a href="data_tanggapan.php"><span>✅</span> Data Tanggapan</a>
        <a href="data_pengaduan.php"><span>📄</span> Data Pengaduan</a>
        <a href="data_petugas.php"><span>👮</span> Data Petugas</a>
        <a href="data_masyarakat"><img src="https://cdn-icons-png.flaticon.com/512/1077/1077114.png" alt="Masyarakat" style="width:20px;"> Data Masyarakat</a>
        <a href="Profile_desa.php"><span>🏡</span> Profil Desa</a>
        <a href="login.php" class="logout"><span>🚪</span> Keluar</a>
    </div>

    <div class="content">
        <div class="breadcrumb">Pages / Dashboard</div>
        <h1>Dashboard</h1>

        <div class="cards">
            <div class="card">
                <div class="info">
                    <div>Jumlah Tanggapan</div>
                    <div class="number">2</div>
                </div>
                <div class="icon">✅</div>
            </div>
            <div class="card">
                <div class="info">
                    <div>Jumlah Pengaduan</div>
                    <div class="number">2</div>
                </div>
                <div class="icon">📄</div>
            </div>
            <div class="card">
                <div class="info">
                    <div>Jumlah Petugas</div>
                    <div class="number">2</div>
                </div>
                <div class="icon">👮</div>
            </div>
            <div class="card">
                <div class="info">
                    <div>Jumlah Masyarakat</div>
                    <div class="number">2</div>
                </div>
                <div class="icon">
                    <img src="https://cdn-icons-png.flaticon.com/512/1077/1077114.png" alt="Masyarakat" style="width:30px;">
                </div>
            </div>
        </div>
    </div>

</body>

</html>