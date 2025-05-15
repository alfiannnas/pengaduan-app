<?php
session_start();

// Handle logout jika ada parameter logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: home1.php'); // arahkan ke home1.php setelah logout
    exit;
  }

$_SESSION['username'] = 'Fajar Arif'; // contoh session login

// Data dummy pengaduan
$pengaduan = [
  [
    'id' => 1,
    'judul' => 'Pengaduan Keamanan dan Ketertiban',
    'isi' => 'Motor saya hilang di depan pasar.',
    'foto' => 'image/motor.jpeg', 
    'status' => 'Selesai',
    'tanggapan' => 'Motor anda telah ditemukan di Polsek terdekat.'
  ],
  [
    'id' => 2,
    'judul' => 'Pengaduan Bansos',
    'isi' => 'Belum menerima bantuan sosial.',
    'foto' => 'image/bansos.jpeg',
    'status' => 'Menunggu',
    'tanggapan' => ''
  ],
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Status Pengaduan</title>
  <style>
    /* --- Style nya tetap sama kayak sebelumnya --- */
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Arial', sans-serif; background: #f7f7f7; min-height: 100vh; display: flex; flex-direction: column; }
    header { background-color: #A30303; display: flex; align-items: center; padding: 10px 30px; color: white; position: sticky; top: 0; z-index: 999; }
    header img { width: 50px; margin-right: 10px; }
    nav { margin-left: auto; display: flex; gap: 20px; align-items: center; }
    nav a { color: white; text-decoration: none; font-weight: bold; padding: 10px 5px; }
    nav .dropdown { position: relative; }
    nav .dropdown-content, nav .dropdown-sub-content {
      display: none; position: absolute; background: white; top: 100%; left: 0; min-width: 220px; box-shadow: 0 2px 8px rgba(0,0,0,0.2); z-index: 999;
    }
    nav .dropdown-content a, nav .dropdown-sub-content a {
      display: block; color: black; padding: 10px; font-weight: normal;
    }
    nav .dropdown-content a:hover, nav .dropdown-sub-content a:hover {
      background-color: #3501AE; color: white;
    }
    nav .dropdown:hover .dropdown-content { display: block; }
    .dropdown-sub { position: relative; }
    .dropdown-sub:hover .dropdown-sub-content { display: block; left: 100%; top: 0; }
    .user-info { display: flex; align-items: center; gap: 10px; font-weight: bold; }
    .container { margin: 40px auto; width: 95%; max-width: 1400px; background: white; padding: 30px; border: 2px solid #A30303; border-radius: 10px; }
    h2 { color: #A30303; margin-bottom: 30px; font-size: 28px; }
    table { width: 100%; border-collapse: collapse; }
    th, td { border: 1px solid #A30303; padding: 14px; text-align: center; font-size: 16px; }
    th { background: #A30303; color: white; }
    td img { width: 120px; height: auto; object-fit: cover; border-radius: 10px; }
    .status-selesai { background: green; color: white; padding: 8px 12px; border-radius: 8px; display: inline-block; }
    .status-menunggu { background: orange; color: white; padding: 8px 12px; border-radius: 8px; display: inline-block; }
    .btn-hapus { background: red; color: white; padding: 8px 15px; border: none; border-radius: 8px; font-size: 14px; cursor: pointer; }
    .btn-tanggapan { background: #4CAF50; color: white; padding: 8px 12px; border-radius: 8px; font-size: 14px; margin-top: 5px; text-decoration: none; display: inline-block; }
    footer { background-color: #A30303; color: white; display: flex; justify-content: space-around; padding: 40px 20px; flex-wrap: wrap; margin-top: 60px; }
    footer img { width: 70px; margin-bottom: 10px; }
    footer h3 { margin-bottom: 15px; }
    footer a { color: white; text-decoration: none; margin-top: 5px; display: block; }
    footer a:hover { text-decoration: underline; }
    .copyright { background: #F12F2F; color: white; text-align: center; padding: 15px; font-size: 14px; }
  </style>
</head>
<body>

<header>
  <img src="image/logo.png" alt="Logo Desa">
  <strong>DESA TUNDAGAN</strong>
  <nav>
    <a href="home2.php">HOME</a>
    <div class="dropdown">
      <a href="home2.php">PENGADUAN</a>
      <div class="dropdown-content">
        <a href="pengaduan_bansos.php">Pengaduan Bantuan Sosial</a>
        <a href="pengaduan_lingkungan.php">Pengaduan Lingkungan</a>
        <div class="dropdown-sub">
          <a href="home2.php">Pengaduan Administratif</a>
          <div class="dropdown-sub-content">
          <a href="kesalahan_penulisan_data.php">Kesalahan Penulisan Data Pribadi</a>
            <a href="permasalahan_dokumen.php">Permasalahan Dokumen</a>
            <a href="keterlambatan_proses.php">Keterlambatan Proses Administratif</a>
            <a href="pelayanan_tidak_sesuai.php">Pelayanan Tidak Sesuai Prosedur</a>
          </div>
        </div>
        <a href="pengaduan_keamanan.php">Pengaduan Keamanan dan Ketertiban</a>
      </div>
    </div>
    <a href="status_pengaduan.php">STATUS PENGADUAN</a>
    <a href="home2.php">PROFIL DESA</a>
    <div class="user-info">
       <a href="profile.php">👨🏻‍💼 <?php echo $_SESSION['username']; ?></a>
      <a href="home2.php?logout=true">LOGOUT</a>
    </div>
  </nav>
</header>

<div class="container">
  <h2>Status Pengaduan Anda</h2>
  <table>
    <thead>
      <tr>
        <th>NO</th>
        <th>JUDUL</th>
        <th>ISI</th>
        <th>FOTO</th>
        <th>STATUS</th>
        <th>AKSI</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pengaduan as $index => $data): ?>
      <tr>
        <td><?php echo $index + 1; ?></td>
        <td><?php echo htmlspecialchars($data['judul']); ?></td>
        <td><?php echo htmlspecialchars($data['isi']); ?></td>
        <td><img src="<?php echo htmlspecialchars($data['foto']); ?>" alt="Foto Dummy"></td>
        <td>
          <?php if ($data['status'] === 'Selesai'): ?>
            <div class="status-selesai">SELESAI</div><br>
            <a href="tanggapan.php?id=<?php echo $data['id']; ?>" class="btn-tanggapan">Lihat Tanggapan</a>
          <?php else: ?>
            <div class="status-menunggu">MENUNGGU</div>
          <?php endif; ?>
        </td>
        <td>
          <button class="btn-hapus" onclick="confirm('Yakin ingin menghapus pengaduan ini?')">HAPUS</button>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<footer>
  <div style="display: flex; align-items: center; gap: 15px;">
    <img src="image/logo.png" alt="Logo Desa">
    <div>
      <h3>Desa Tundagan</h3>
      Kecamatan Watukumpul<br>
      Kabupaten Pemalang<br>
      Provinsi Jawa Tengah
    </div>
  </div>

  <div>
    <h3>Navigasi</h3>
    <a href="home2.php">Home</a>
    <a href="home2.php">Pengaduan</a>
    <a href="status_pengaduan.php">Status Pengaduan</a>
    <a href="home2.php">Profil Desa</a>
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

</body>
</html>
