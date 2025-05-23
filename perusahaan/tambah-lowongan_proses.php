<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['ID_perusahaan'])) {
    header("Location: login-perusahaan.php");
    exit;
}

$ID_perusahaan = $_SESSION['ID_perusahaan'];

$query = "SELECT nama_perusahaan FROM perusahaan WHERE id_perusahaan = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$ID_perusahaan]);
$row = $stmt->fetch();

if (!$row) {
    die("Data perusahaan tidak ditemukan.");
}

$nama_perusahaan = $row['nama_perusahaan'];
if (empty($nama_perusahaan)) {
    die("Nama perusahaan belum diisi di profil. Silakan edit profil perusahaan terlebih dahulu.");
}

$posisi = trim($_POST['posisi'] ?? '');
$lokasi = trim($_POST['lokasi'] ?? '');
$tipe_pekerjaan = $_POST['tipe_pekerjaan'] ?? '';
$jenjang_pendidikan = $_POST['jenjang_pendidikan'] ?? '';
$level_pekerjaan = trim($_POST['level_pekerjaan'] ?? '');
$gaji_min = isset($_POST['gaji_min']) ? intval($_POST['gaji_min']) : 0;
$gaji_max = isset($_POST['gaji_max']) ? intval($_POST['gaji_max']) : 0;
$deskripsi_loker = strip_tags(trim($_POST['deskripsi_loker'] ?? ''));

$status_lowongan = 'buka';
$tanggal_posting = date('Y-m-d');

$errors = [];

if (!$posisi) $errors[] = "Posisi harus diisi.";
if (strlen($posisi) > 100) $errors[] = "Posisi terlalu panjang (maks 100 karakter).";

if (!$lokasi) $errors[] = "Lokasi harus diisi.";
if (strlen($lokasi) > 100) $errors[] = "Lokasi terlalu panjang (maks 100 karakter).";

if (!$tipe_pekerjaan) $errors[] = "Tipe pekerjaan harus dipilih.";
if (!$jenjang_pendidikan) $errors[] = "Jenjang pendidikan harus dipilih.";
if (!$level_pekerjaan) $errors[] = "Level pekerjaan harus diisi.";

if ($gaji_min <= 0) $errors[] = "Gaji minimal harus lebih besar dari 0.";
if ($gaji_max <= 0) $errors[] = "Gaji maksimal harus lebih besar dari 0.";
if ($gaji_min > $gaji_max) $errors[] = "Gaji minimal tidak boleh lebih besar dari gaji maksimal.";

if (!$deskripsi_loker) $errors[] = "Deskripsi loker harus diisi.";

if (!empty($errors)) {
    echo "<div style='padding: 1rem; background-color: #f8d7da; color: #842029; border: 1px solid #f5c2c7;'>";
    echo "<strong>Terjadi kesalahan:</strong><br>";
    echo implode("<br>", $errors);
    echo "</div>";
    exit;
}

$query = "INSERT INTO posting_job 
    (ID_perusahaan, posisi, nama_perusahaan, lokasi, tipe_pekerjaan, jenjang_pendidikan, level_pekerjaan, gaji_min, gaji_max, tanggal_posting, deskripsi_loker, status_lowongan)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $pdo->prepare($query);
$success = $stmt->execute([
    $ID_perusahaan,
    $posisi,
    $nama_perusahaan,
    $lokasi,
    $tipe_pekerjaan,
    $jenjang_pendidikan,
    $level_pekerjaan,
    $gaji_min,
    $gaji_max,
    $tanggal_posting,
    $deskripsi_loker,
    $status_lowongan
]);

if ($success) {
    header("Location: dashboard-perusahaan.php?status=berhasil");
    exit;
} else {
    $errorInfo = $stmt->errorInfo();
    die("Gagal menyimpan lowongan. Error: " . $errorInfo[2]);
}
?>