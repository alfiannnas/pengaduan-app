<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Petugas</title>
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

        .btn {
            padding: 6px 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            font-weight: bold;
            margin: 2px;
        }

        .btn-tambah {
            background-color: #28a745;
            color: #fff;
            float: right;
            margin-bottom: 10px;
        }

        .btn-hapus {
            background-color: #dc3545;
            color: #fff;
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

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            width: 400px;
            position: relative;
        }

        .modal-content h2 {
            margin-top: 0;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 20px;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 8px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .form-submit {
            background: #6a0dad;
            color: white;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        .message {
            background-color: #fff3cd;
            color: #856404;
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 8px;
            border-left: 5px solid #ffc107;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            font-size: 14px;
            font-weight: 500;
            position: relative;
            line-height: 1.5;
        }
    </style>
    <script src="https://unpkg.com/lucide@latest"></script>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
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
        <a href="{{ route('admin.profil-desa') }}"><i data-lucide="user-cog"></i> Profil Desa</a>
        <a href="{{ route('admin.profil-admin') }}"><i data-lucide="user"></i> Profil Admin</a>
        <a href="{{ route('logout') }}" class="logout"><i data-lucide="log-out"></i> Keluar</a>
    </div>

    <div class="content">
        <div class="breadcrumb">Pages / Petugas</div>
        <h1>Petugas</h1>

        @if ($errors->any())
        <div class="message">
            @foreach ($errors->all() as $error)
            {{ $error }}<br>
            @endforeach
        </div>
        @endif

        <div class="card-table">
            <a href="#" id="openModal" class="btn btn-tambah">Tambah Data</a>

            <table>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>USERNAME</th>
                        <th>NOMOR TELEPON</th>
                        <th>LEVEL</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = ($petugas->currentPage() - 1) * $petugas->perPage() + 1;
                    @endphp
                    @foreach($petugas as $data)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $data['name'] }}</td>
                        <td>{{ $data['username'] }}</td>
                        <td>{{ $data['telephone'] }}</td>
                        <td>{{ $data['level'] }}</td>
                        <td>
                            <form action="{{ route('admin.delete-petugas', $data['id']) }}" method="POST" style="display:inline;">
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
                {{ $petugas->links() }}
            </div>
        </div>

    </div>
    <!-- Modal Tambah Data -->
    <div class="modal" id="modalForm">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2>Tambah Petugas</h2>
            <form action="{{ route('admin.store-petugas') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label>NIK</label>
                    <input type="number" name="nik" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="number" name="telephone" required>
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <select name="level" required>
                        <option value="Admin">Admin</option>
                        <option value="Petugas">Petugas</option>
                    </select>
                </div>
                <button type="submit" class="form-submit">Simpan</button>
            </form>
        </div>
    </div>

    <script>
        const modal = document.getElementById('modalForm');
        const openBtn = document.getElementById('openModal');
        const closeBtn = document.getElementById('closeModal');

        openBtn.onclick = function() {
            modal.style.display = 'flex';
        }

        closeBtn.onclick = function() {
            modal.style.display = 'none';
        }

        window.onclick = function(e) {
            if (e.target == modal) {
                modal.style.display = 'none';
            }
        }
        lucide.createIcons();

    </script>


</body>

</html>