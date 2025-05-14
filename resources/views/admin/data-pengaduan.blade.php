<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Pengaduan</title>
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

        .card-table {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            overflow-x: auto;
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
            color: #000;
        }

        img.foto {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid #ccc;
        }

        .btn {
            padding: 6px 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            font-weight: bold;
            margin: 2px;
        }

        .btn-verifikasi {
            background-color: #28a745;
            color: #fff;
        }

        .btn-tanggapi {
            background-color: #007bff;
            color: #fff;
        }

        .btn-hapus {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-export {
            background: #28a745;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 8px 16px;
            float: right;
            font-weight: bold;
        }

        .modal {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 12px;
            width: 400px;
            color: black;
        }

        .modal-content img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 6px;
            margin-top: 4px;
        }

        .pagination {
            display: flex;
            justify-content: start;
            margin-top: 25px;
            list-style: none;
            padding: 0;
            gap: 5px;
        }

        .pagination li a,
        .pagination li span {
            padding: 10px 15px;
            background-color: #fff;
            color: #990000;
            border-radius: 6px;
            border: 1px solid #ddd;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
            display: inline-block;
        }

        .pagination li.active span {
            background-color: #990000;
            color: white;
            border-color: #990000;
            box-shadow: 0 2px 5px rgba(153, 0, 0, 0.2);
        }

        .pagination li a:hover {
            background-color: #f5f5f5;
            border-color: #990000;
            transform: translateY(-2px);
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
        <a href="{{ route('admin.dashboard') }}"><span>🏠</span> Dashboard</a>
        <a href="{{ route('admin.data-tanggapan') }}" class="active"><span>✅</span> Data Tanggapan</a>
        <a href="{{ route('admin.data-pengaduan') }}"><span>📄</span> Data Pengaduan</a>
        <a href="{{ route('admin.data-petugas') }}"><span>👮</span> Data Petugas</a>
        <a href="{{ route('admin.data-masyarakat') }}"><span>👥</span> Data Masyarakat</a>
        <a href="{{ route('admin.profil-desa') }}"><span>🏡</span> Profil Desa</a>
        <a href="{{ route('logout') }}" class="logout"><span>🚪</span> Keluar</a>
    </div>

    <div class="content">
        <div class="breadcrumb">Pages / Pengaduan</div>
        <h1>Pengaduan</h1>

        <div class="card-table">
            <form method="get" style="margin-bottom:10px;">
                <button type="submit" name="export" value="1" class="btn-export">Export</button>
            </form>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Judul</th>
                        <th>Laporan</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = ($pengaduan->currentPage() - 1) * $pengaduan->perPage() + 1;
                    @endphp
                    @foreach ($pengaduan as $data)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ Carbon\Carbon::parse($data->tanggal)->format('Y-m-d') }}</td>
                        <td>{{ $data->nama}}</td>
                        <td>{{ $data->nik }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->no_hp }}</td>
                        <td>{{ $data->judul }}</td>
                        <td>{{ $data->laporan }}</td>
                        <td><img src="admin/{{ $data->foto }}" class="foto" alt="Foto Pengaduan"></td>
                        <td>{{ $data->status }}</td>
                        <td>
                            <form method="post" style="margin-bottom:4px;">
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <select name="status" required>
                                    <option value="">--Status--</option>
                                    <option value="Diproses">Diproses</option>
                                    <option value="Ditolak">Ditolak</option>
                                </select><br>
                                <button type="submit" name="verifikasi" class="btn btn-verifikasi">Verifikasi</button>
                            </form>
                            <button class="btn btn-tanggapi" onclick="openModal(<?= htmlspecialchars(json_encode($data)) ?>)">Tanggapi</button>
                            <form action="{{ route('admin.delete-pengaduan', $data['id']) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $pengaduan->links() }}
            </div>
        </div>
    </div>

    <div class="modal" id="modalTanggapi">
        <div class="modal-content">
            <form method="post">
                <input type="hidden" name="id" id="modalId">
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="text" id="modalTanggal" readonly>
                </div>
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" id="modalJudul" readonly>
                </div>
                <div class="form-group">
                    <label>Isi</label>
                    <textarea id="modalIsi" readonly></textarea>
                </div>
                <div class="form-group">
                    <label>Foto</label><br>
                    <img id="modalFoto" src="" alt="Foto Pengaduan">
                </div>
                <div class="form-group">
                    <label>Tanggapan</label>
                    <textarea name="tanggapan" required></textarea>
                </div>
                <button type="submit" name="tanggapi" class="btn btn-verifikasi">Tanggapi</button>
            </form>
        </div>
    </div>

    <script>
        function openModal(aduan) {
            document.getElementById('modalId').value = aduan.id;
            document.getElementById('modalTanggal').value = aduan.tanggal;
            document.getElementById('modalJudul').value = aduan.judul;
            document.getElementById('modalIsi').value = aduan.laporan;
            document.getElementById('modalFoto').src = "admin/" + aduan.foto;
            document.getElementById('modalTanggapi').style.display = 'flex';
        }
    </script>

</body>

</html>