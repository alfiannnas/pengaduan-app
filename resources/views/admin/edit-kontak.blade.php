<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Profil Desa - Admin</title>
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

        input[type="text"], textarea {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
        }

        input[type="text"]:focus, textarea:focus {
            outline: none;
            border-color: #990000;
        }

        .btn-ubah {
            background-color: #990000;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-ubah:hover {
            background-color: #7a0000;
        }

        .custom-file-input-wrapper {
            position: relative;
            width: 100%;
        }
        .custom-file-label {
            display: inline-block;
            padding: 10px 20px;
            background: #f0f0f0;
            color: #333;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            border: 2px dashed #990000;
            transition: background 0.2s, color 0.2s;
        }
        .custom-file-label:hover {
            background: #990000;
            color: #fff;
        }
        #preview img {
            max-width: 120px;
            max-height: 120px;
            border-radius: 8px;
            margin-top: 8px;
            border: 2px solid #990000;
        }
        .form-upload {
            position: relative;
            min-height: 220px;
            padding-bottom: 60px;
        }
        .dropzone {
            border: 2px dashed #990000;
            border-radius: 10px;
            background: #fff6f6;
            padding: 32px 0;
            text-align: center;
            cursor: pointer;
            transition: border-color 0.2s, background 0.2s;
            margin-bottom: 20px;
            position: relative;
        }
        .dropzone.dragover {
            border-color: #4e00ff;
            background: #ffeaea;
        }
        #dropzone-content svg {
            margin-bottom: 8px;
        }
        #dropzone-content p {
            color: #990000;
            font-weight: 500;
            font-size: 16px;
        }
        #preview {
            margin-top: 10px;
        }
        .remove-img-btn {
            position: absolute;
            top: 0;
            right: 0;
            background: #dc3545;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 28px;
            height: 28px;
            font-size: 18px;
            cursor: pointer;
            z-index: 2;
            transform: translate(30%, -30%);
        }
        .btn-kiri-bawah {
            position: absolute;
            left: 0;
            bottom: 0;
            margin: 16px;
            padding: 12px 28px;
            font-size: 16px;
            border-radius: 6px;
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
        <div class="breadcrumb">Pages / Profil Desa</div>
        <h1>Profil Desa</h1>    

        <div class="card-table">
            <form action="{{ route('admin.profil-desa.update', ['slug' => $profilDesa->slug]) }}" method="POST" enctype="multipart/form-data" class="form-upload">
                @csrf
                <div style="margin-bottom: 20px;">
                    <label for="nama" style="display: block; margin-bottom: 8px; font-weight: bold;">Nama Profil</label>
                    <input type="text" id="nama" name="nama" value="{{ $profilDesa->nama ?? '' }}" 
                        style="width: 100%; padding: 8px; padding-right: 0px; border: 1px solid #ddd; border-radius: 4px;" readonly>
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="telepon" style="display: block; margin-bottom: 8px; font-weight: bold;">Nomor Telepon</label>
                    <input type="text" id="telepon" name="telepon" value="{{ old('telepon', $telepon ?? '') }}" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:4px;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="email" style="display: block; margin-bottom: 8px; font-weight: bold;">Alamat Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $email ?? '') }}" style="width:100%; padding:8px;  padding-right: 0px; border:1px solid #ddd; border-radius:4px;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="jam_kerja" style="display: block; margin-bottom: 8px; font-weight: bold;">Jam Kerja</label>
                    <input type="text" id="jam_kerja" name="jam_kerja" value="{{ old('jam_kerja', $jam_kerja ?? '') }}" style="width:100%; padding:8px;  padding-right: 0px; border:1px solid #ddd; border-radius:4px;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="alamat" style="display: block; margin-bottom: 8px; font-weight: bold;">Alamat Desa</label>
                    <textarea id="alamat" name="alamat" rows="3" style="width:100%; padding:8px;  padding-right: 0px; border:1px solid #ddd; border-radius:4px;">{{ old('alamat', $alamat ?? '') }}</textarea>
                </div>
                <button type="submit" class="btn btn-ubah btn-kiri-bawah">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>

<script>
        lucide.createIcons();
</script>
</body>

</html>