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
            width: 160px;
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
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        textarea {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            padding: 8px;
            resize: vertical;
            min-height: 80px;
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
        <div class="breadcrumb">Pages / Pengaduan</div>
        <h1>Pengaduan</h1>

        <div class="card-table">
            <form method="post" action="{{ route('admin.export-pengaduan') }}" style="margin-bottom:10px;">
                @csrf
                <button type="submit" name="export" value="1" class="btn-export">Export</button>
            </form>

            <!-- Update the filter form -->
            <form method="GET" action="{{ route('admin.data-pengaduan') }}" style="margin-bottom: 20px;">
                <div style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
<!DOCTYPE html>
                    <!-- Nama filter -->
                    <div style="display: flex; gap: 10px; align-items: center;">
                        <input type="text" 
                               name="nama" 
                               placeholder="Cari berdasarkan nama..." 
                               value="{{ request('nama') }}"
                               style="width: 250px; padding: 8px; border-radius: 6px; border: 1px solid #ccc;">
                    </div>

                    <!-- Jenis Pengaduan filter -->
                    <div style="display: flex; gap: 10px; align-items: center;">
                        <select name="jenis_pengaduan" class="form-control" style="width: 250px; padding: 8px; border-radius: 6px; border: 1px solid #ccc;">
                            <option value="">Semua Jenis Pengaduan</option>
                            @foreach($jenisPengaduan as $jenis)
                                <option value="{{ $jenis }}" {{ request('jenis_pengaduan') == $jenis ? 'selected' : '' }}>
                                    {{ $jenis }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Buttons -->
                    <div style="display: flex; gap: 10px;">
                        <button type="submit" class="btn btn-verifikasi" style="padding: 8px 16px;">Filter</button>
                        @if(request('jenis_pengaduan') || request('nama'))
                            <a href="{{ route('admin.data-pengaduan') }}" class="btn btn-hapus" style="padding: 8px 16px;">Reset</a>
                        @endif
                    </div>
                </div>
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
                        <th>Jenis Pengaduan</th>
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
                        <td>{{ $data->jenis_pengaduan }}</td>
                        <td>{{ $data->laporan }}</td>
                        <td>                  
                            @if ($data['foto'])
                                <img src="{{ asset('storage/images/' . $data->foto) }}" style="width:200px;" class="foto" alt="Foto Pengaduan">
                            @else
                                <span>Tidak ada Foto</span>
                            @endif
                        </td>
                        <td>{{ $data->status }}</td>
                        <td style="display: flex; flex-direction: column; gap: 4px;">
                            <form method="post" action="{{ route('admin.verifikasi-pengaduan') }}">
                                @csrf
                                <input type="hidden" name="pengaduan_id" value="{{ $data->id }}">
                                <select style="width: 100%; margin-bottom: 5px;" name="status" required>
                                    <option value="">--Status--</option>
                                    <option value="Diproses">Diproses</option>
                                    <option value="Ditolak">Ditolak</option>
                                </select><br>
                                <button type="submit" name="verifikasi" class="btn btn-verifikasi" style="width: 100%;">Verifikasi</button>
                            </form>

                            <button class="btn btn-tanggapi" style="width: 100%;" onclick="openModal(<?= htmlspecialchars(json_encode($data)) ?>)">Tanggapi</button>
                            <form action="{{ route('admin.delete-pengaduan', $data['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-hapus" style="width: 100%;" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
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

    <!-- Modal Tanggapan Pengaduan -->
    <div class="modal" id="modalTanggapan">
        <div class="modal-content">
            <span class="close" id="closeTanggapanModal">&times;</span>
            <h2>Tanggapan Pengaduan</h2>
            <div id="detailPengaduan">
                <img id="fotoDetail" src="" alt="Foto Pengaduan" class="foto" style="display:none;">
                <div id="noFotoDetail" style="display:none; color:red; margin-bottom:20px;">Tidak Ada Foto</div>
                <div class="form-group">
                    <label>Tanggal:</label>
                    <div id="tanggalDetail"></div>
                </div>
                <div class="form-group">
                    <label>Nama:</label>
                    <div id="namaDetail"></div>
                </div>
                <div class="form-group">
                    <label>NIK:</label>
                    <div id="nikDetail"></div>
                </div>
                <div class="form-group">
                    <label>Judul:</label>
                    <div id="judulDetail"></div>
                </div>
                <div class="form-group">
                    <label>Laporan:</label>
                    <div id="laporanDetail"></div>
                </div>
            </div>
            <form action="{{ route('admin.tanggapi-pengaduan') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="pengaduan_id" id="pengaduanId">
                <div class="form-group">
                    <label>Tanggapan:</label>
                    <textarea name="tanggapan" id="tanggapanTextarea" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label>Upload File (PDF/DOC/DOCX/Image):</label>
                    <input type="file" name="file_tanggapan" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" class="form-control" style="width: 100%; padding: 8px; border-radius: 6px; border: 1px solid #ccc;">
                    <small style="color: #666; font-size: 12px;">Maksimal ukuran file: 2MB</small>
                </div>
                <div id="existingFileContainer" style="display: none; margin-bottom: 15px;">
                    <label>File Terlampir:</label>
                    <a href="#" id="downloadFileLink" class="btn btn-tanggapi" style="display: inline-block; margin-top: 5px;">
                        Download File
                    </a>
                </div>
                <button type="submit" class="btn btn-verifikasi">Tanggapi</button>
            </form>
        </div>
    </div>

    <script>
        const modalTanggapan = document.getElementById('modalTanggapan');
        const closeTanggapanBtn = document.getElementById('closeTanggapanModal');

        function openModal(data) {
            const fotoDetail = document.getElementById('fotoDetail');
            const noFotoDetail = document.getElementById('noFotoDetail');
            const existingFileContainer = document.getElementById('existingFileContainer');
            const downloadFileLink = document.getElementById('downloadFileLink');
            
            if (data.foto && data.foto !== "") {
                fotoDetail.src = "/storage/images/" + data.foto;
                fotoDetail.style.display = "block";
                noFotoDetail.style.display = "none";
            } else {
                fotoDetail.style.display = "none";
                noFotoDetail.style.display = "block";
            }
            
            // Handle file display
            if (data.tanggapan_detail && data.tanggapan_detail.file_tanggapan) {
                existingFileContainer.style.display = "block";
                downloadFileLink.href = "/storage/tanggapan/" + data.tanggapan_detail.file_tanggapan;
            } else {
                existingFileContainer.style.display = "none";
            }
            
            document.getElementById('tanggalDetail').textContent = data.tanggal;
            document.getElementById('namaDetail').textContent = data.nama;
            document.getElementById('nikDetail').textContent = data.nik;
            document.getElementById('judulDetail').textContent = data.judul;
            document.getElementById('laporanDetail').textContent = data.laporan;
            document.getElementById('pengaduanId').value = data.id;
            
            // Memuat data tanggapan jika ada
            if (data.tanggapan_detail && data.tanggapan_detail.tanggapan) {
                document.getElementById('tanggapanTextarea').value = data.tanggapan_detail.tanggapan;
            } else {
                document.getElementById('tanggapanTextarea').value = '';
            }

            modalTanggapan.style.display = 'flex';
        }

        if (closeTanggapanBtn) {
            closeTanggapanBtn.onclick = function() {
                modalTanggapan.style.display = 'none';
            }
        }

        window.onclick = function(e) {
            if (e.target == modalTanggapan) {
                modalTanggapan.style.display = 'none';
            }
        }
        lucide.createIcons();
    </script>

</body>

</html>