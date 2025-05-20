<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['ID_user']) || $_SESSION['role'] !== 'pelamar') {
    header("Location: masukpekerja.php");
    exit;
}

$id_user = $_SESSION['ID_user'];

// Ambil data profil lengkap termasuk CV
$stmt = $pdo->prepare("SELECT nama_lengkap, no_telp, alamat, pendidikan_terakhir, jenis_kelamin, CV FROM detail_user WHERE ID_user = ?");
$stmt->execute([$id_user]);
$user = $stmt->fetch();

$alamat = $user['alamat'] ?? '';
$nama = $user['nama_lengkap'] ?? '';
$no_telp = $user['no_telp'] ?? '';
$pendidikan = $user['pendidikan_terakhir'] ?? '';
$jenis_kelamin = $user['jenis_kelamin'] ?? '';
$cv_filename = $user['CV'] ?? '';

// Ambil email dari tabel login_signup
$stmt2 = $pdo->prepare("SELECT email FROM login_signup WHERE ID_user = ?");
$stmt2->execute([$id_user]);
$user2 = $stmt2->fetch();
$email = $user2['email'] ?? '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Profil Saya</title>
  <link rel="icon" type="image/x-icon" href="../logo%20careerbridge.png" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link href="../assets/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand text-decoration-none" href="#">
        <img src="../logo%20careerbridge.png" alt="CareerBridge" height="40" class="d-inline-block align-top" />
      </a>
      <div class="container my-4">
        <h3>Profil Saya</h3>
      </div>
    </div>
  </nav>

<div class="container card shadow rounded pt-3 px-3">
  <form action="editprofil-pelamar_proses.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Lengkap</label>
      <input
        type="text"
        class="form-control"
        id="nama"
        name="nama_lengkap"
        placeholder="Masukkan nama lengkap"
        required
        style="border: 1px solid black;"
        value="<?= htmlspecialchars($nama) ?>"
      />
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Alamat Email</label>
      <input
        type="email"
        class="form-control"
        id="email"
        name="email"
        placeholder="Masukkan email aktif"
        required
        style="border: 1px solid black;"
        value="<?= htmlspecialchars($email) ?>"
      />
    </div>

    <div class="mb-3">
      <label for="telepon" class="form-label">No. Telepon</label>
      <input
        type="text"
        class="form-control"
        id="telepon"
        name="no_telp"
        placeholder="08xxxxxxxxxx"
        required
        style="border: 1px solid black;"
        value="<?= htmlspecialchars($no_telp) ?>"
      />
    </div>

    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat</label>
      <textarea
        class="form-control"
        id="alamat"
        name="alamat"
        rows="2"
        placeholder="Masukkan alamat lengkap"
        required
        style="border: 1px solid black;"
      ><?= htmlspecialchars($alamat) ?></textarea>
    </div>

    <div class="mb-3">
      <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
      <select
        class="form-select"
        id="pendidikan"
        name="pendidikan_terakhir"
        required
        style="border: 1px solid black;"
      >
        <option value="" disabled <?= $pendidikan == '' ? 'selected' : '' ?>>Pilih pendidikan terakhir</option>
        <option value="SMA/SMK" <?= $pendidikan == 'SMA/SMK' ? 'selected' : '' ?>>SMA/SMK</option>
        <option value="D3" <?= $pendidikan == 'D3' ? 'selected' : '' ?>>D3</option>
        <option value="S1" <?= $pendidikan == 'S1' ? 'selected' : '' ?>>S1</option>
        <option value="S2" <?= $pendidikan == 'S2' ? 'selected' : '' ?>>S2</option>
        <option value="S3" <?= $pendidikan == 'S3' ? 'selected' : '' ?>>S3</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
      <select
        class="form-select"
        id="jenis_kelamin"
        name="jenis_kelamin"
        required
        style="border: 1px solid black;"
      >
        <option value="" disabled <?= $jenis_kelamin == '' ? 'selected' : '' ?>>Pilih jenis kelamin</option>
        <option value="L" <?= $jenis_kelamin == 'L' ? 'selected' : '' ?>>Laki-laki</option>
        <option value="P" <?= $jenis_kelamin == 'P' ? 'selected' : '' ?>>Perempuan</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="cv" class="form-label">Upload CV</label>
      <input
        class="form-control"
        type="file"
        id="cv"
        name="cv"
        accept=".pdf,.doc,.docx"
        style="border: 1px solid black;"
      />
      <small class="text-muted">Kosongkan jika tidak ingin mengganti CV.</small>

      <?php if ($cv_filename): ?>
        <p class="mt-2">CV saat ini: 
          <a href="../uploads/cv/<?= htmlspecialchars($cv_filename) ?>" target="_blank"><?= htmlspecialchars($cv_filename) ?></a>
        </p>
      <?php else: ?>
        <p class="mt-2 text-muted">Belum ada CV yang diupload.</p>
      <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-success mb-3">Simpan Perubahan</button>
  </form>
</div>

  <div class="text-center mt-4 mb-4 text-muted small">
    <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
  </div>

</body>
</html>