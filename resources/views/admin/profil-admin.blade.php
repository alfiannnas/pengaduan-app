<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Profil Desa - Admin</title>
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
            color: black;
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
            vertical-align: middle;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            font-weight: bold;
            margin: 2px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-tambah {
            background-color: #4e00ff;
            color: #fff;
        }

        .btn-ubah {
            background-color: #28a745;
            color: #fff;
        }

        .btn-hapus {
            background-color: #dc3545;
            color: #fff;
        }

        .form-group {
            margin-bottom: 18px;
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 6px;
            color: #333;
            letter-spacing: 0.5px;
        }

        .form-group input {
            padding: 10px 14px;
            border: 1.5px solid #cfcfcf;
            border-radius: 8px;
            font-size: 15px;
            transition: border-color 0.2s;
            background: #f9f9f9;
            outline: none;
        }

        .form-group input:focus {
            border-color: #990000;
            background: #fff;
        }

        .btn-ubah {
            background-color: #28a745;
            color: #fff;
            padding: 10px 22px;
            font-size: 15px;
            border-radius: 8px;
            margin-top: 8px;
            transition: background 0.2s;
        }

        .btn-ubah:hover {
            background-color: #218838;
        }
    </style>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body>

    <div class="sidebar">
        <div class="profile">
            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="Profile Admin">
            <h2>{{ Auth::user()->name }}</h2>
        </div>
        <hr>
        <a href="{{ route('admin.dashboard') }}"><i data-lucide="home"></i> Dashboard</a>
        <a href="{{ route('admin.data-tanggapan') }}" class="active"><i data-lucide="check-circle"></i> Data Tanggapan</a>
        <a href="{{ route('admin.data-pengaduan') }}"><i data-lucide="file-text"></i> Data Pengaduan</a>
        <a href="{{ route('admin.data-petugas') }}"><i data-lucide="users"></i> Data Petugas</a>
        <a href="{{ route('admin.data-masyarakat') }}"><i data-lucide="users"></i> Data Masyarakat</a>
        <a href="{{ route('admin.profil-desa') }}"><i data-lucide="home"></i> Profil Desa</a>
        <a href="{{ route('admin.profil-admin') }}"><i data-lucide="user"></i> Profil Admin</a>
        <a href="{{ route('logout') }}" class="logout"><i data-lucide="log-out"></i> Keluar</a>
 
    </div>

    <div class="content">
        <div class="breadcrumb">Pages / Profil Admin</div>
        <h1>Profil Desa</h1>

        <div class="card-table">
            @if ($errors->any())
                <div style="background:#ffe0e0; color:#990000; border-radius:8px; padding:12px 18px; margin-bottom:18px; border:1.5px solid #ffb3b3;">
                    <strong>Terjadi kesalahan:</strong>
                    <ul style="margin:8px 0 0 18px; padding:0; font-size:14px;">
                        @foreach ($errors->all() as $error)
                            <li style="margin-bottom:4px;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div style="background:#e0ffe0; color:#155724; border-radius:8px; padding:12px 18px; margin-bottom:18px; border:1.5px solid #b3ffb3;">
                    <strong>Berhasil:</strong> {{ session('success') }}
                </div>
            @endif
            <form method="POST" action="{{ route('admin.update-profile') }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" name="username" value="{{ old('name', Auth::user()->username) }}" required>
                </div>
                <div class="form-group">
                    <label>Nama:</label>
                    <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                </div>
                <div class="form-group">
                    <label>NIK:</label>
                    <input type="text" name="nik" value="{{ old('nik', Auth::user()->nik) }}" required>
                </div>
                <div class="form-group">
                    <label>Telephone:</label>
                    <input type="text" name="telephone" value="{{ old('telephone', Auth::user()->telephone) }}" required>
                </div>
                <div class="form-group">
                    <label>Password Baru (opsional):</label>
                    <input type="password" name="password">
                </div>
                <button type="submit" class="btn btn-ubah">Simpan Perubahan</button>
            </form>
        </div>
    </div>
    <script>
        lucide.createIcons();
    </script>

</body>

</html>