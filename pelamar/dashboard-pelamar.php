<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['ID_user']) || $_SESSION['role'] !== 'pelamar') {
    header("Location: masukpekerja.php");
    exit;
}

$id_user = $_SESSION['ID_user'];

$stmt = $pdo->prepare("SELECT nama_lengkap FROM detail_user WHERE ID_user = ?");
$stmt->execute([$id_user]);
$user = $stmt->fetch();

if (!$user) {
    echo '<div class="alert alert-warning">Profil belum lengkap. <a href="editprofil-pelamar.php">Isi profil sekarang</a>.</div>';
    $nama_lengkap = "Pengguna";
} else {
    $nama_lengkap = $user['nama_lengkap'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Pelamar</title>
    <link rel="icon" type="image/x-icon" href="../logo%20careerbridge.png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-decoration-none">
                <img src="../logo%20careerbridge.png" alt="CareerBridge" height="40" class="d-inline-block align-top">
            </a>

            <div class="container my-4">
                <h3>Dashboard Pelamar</h3>
            </div>
        </div>
    </nav>

  <div class="container my-5">
    <div class="row">
      <div class="col-md-3 mb-3">
        <div class="list-group">
          <p class="list-group-item list-group-item-action active">Beranda</p>
          <a href="editprofil-pelamar.php" class="list-group-item list-group-item-action">Profil Saya</a>
          <a href="riwayatlamaran-pelamar.html" class="list-group-item list-group-item-action">Riwayat Lamaran</a>
          <a href="lowongandisimpan-pelamar.php" class="list-group-item list-group-item-action">Lowongan Disimpan</a>
        </div>
      </div>

      <div class="col-md-9">
        <div class="alert alert-success" role="alert">
          Selamat datang, <strong><?= htmlspecialchars($nama_lengkap) ?></strong>! Ini adalah dashboard Anda.
        </div>


        <h5>Riwayat Lamaran Terbaru</h5>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Posisi</th>
              <th>Perusahaan</th>
              <th>Status</th>
              <th>Tanggal Lamar</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Frontend Developer</td>
              <td>PT Maju Jaya</td>
              <td><span class="badge bg-warning text-dark">Diproses</span></td>
              <td>26 April 2025</td>
            </tr>
            <tr>
              <td>UI/UX Designer</td>
              <td>CV Kreatif Digital</td>
              <td><span class="badge bg-success">Diterima</span></td>
              <td>20 April 2025</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="text-center mt-4 text-muted small">
    <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
  </div>

</body>
</html>
