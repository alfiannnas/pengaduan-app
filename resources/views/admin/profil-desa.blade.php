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
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="profile">
            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="Profile Admin">
            <h2>Admin</h2>
        </div>
        <hr>
        <a href="dashboard.php"><span>🏠</span> Dashboard</a>
        <a href="data_tanggapan.php" class="active"><span>✅</span> Data Tanggapan</a>
        <a href="data_pengaduan.php"><span>📄</span> Data Pengaduan</a>
        <a href="data_petugas.php"><span>👮</span> Data Petugas</a>
        <a href="data_masyarakat.php"><span>👥</span> Data Masyarakat</a>
        <a href="profile_desa.php"><span>🏡</span> Profil Desa</a>
        <a href="#" class="logout"><span>🚪</span> Keluar</a>
    </div>

    <div class="content">
        <div class="breadcrumb">Pages / Profil Desa</div>
        <h1>Profil Desa</h1>

        <div class="card-table">
            <table>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th style="width: 400px;">NAMA</th>
                        <th>LEVEL</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profilDesa as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $data['nama'] }}</td>
                        <td>{{ $data['level'] }}</td>
                        <td>
                            <form method="post" style="display:inline;">
                                @csrf
                                <input type="hidden" name="tambah" value="1">
                                <button type="submit" class="btn btn-tambah">Tambah</button>
                            </form>
                            <form method="post" action="{{ route('admin.profil-desa.update') }}" style="display:inline;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data['id'] }}">
                                <input type="text" name="nama" value="{{ $data['nama'] }}" style="display:none;">
                                <button type="button" class="btn btn-ubah" onclick="ubahData(this)">Ubah</button>
                            </form>
                            <form method="post" action="{{ route('admin.profil-desa.delete', ['id' => $data['id']]) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="hapus" class="btn btn-hapus" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function ubahData(button) {
            let form = button.parentElement;
            let inputNama = form.querySelector('input[name="nama"]');
            let namaBaru = prompt("Masukkan Nama Baru:", inputNama.value);
            if (namaBaru !== null && namaBaru.trim() !== "") {
                inputNama.value = namaBaru;
                form.submit();
            }
        }
    </script>

</body>

</html>