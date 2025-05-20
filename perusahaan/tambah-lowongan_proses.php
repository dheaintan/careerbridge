<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['ID_perusahaan'])) {
    die("Login dulu bro!");
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
$deskripsi_loker = trim($_POST['deskripsi_loker'] ?? '');

$status_lowongan = 'buka';

$errors = [];
if (!$posisi) $errors[] = "Posisi harus diisi.";
if (!$lokasi) $errors[] = "Lokasi harus diisi.";
if (!$tipe_pekerjaan) $errors[] = "Tipe pekerjaan harus dipilih.";
if (!$jenjang_pendidikan) $errors[] = "Jenjang pendidikan harus dipilih.";
if (!$level_pekerjaan) $errors[] = "Level pekerjaan harus diisi.";
if ($gaji_min <= 0) $errors[] = "Gaji minimal harus lebih besar dari 0.";
if ($gaji_max <= 0) $errors[] = "Gaji maksimal harus lebih besar dari 0.";
if ($gaji_min > $gaji_max) $errors[] = "Gaji minimal tidak boleh lebih besar dari gaji maksimal.";
if (!$deskripsi_loker) $errors[] = "Deskripsi loker harus diisi.";

if (!empty($errors)) {
    die(implode("<br>", $errors));
}

$query = "INSERT INTO posting_job 
    (ID_perusahaan, posisi, nama_perusahaan, lokasi, tipe_pekerjaan, jenjang_pendidikan, level_pekerjaan, gaji_min, gaji_max, tanggal_posting, deskripsi_loker, status_lowongan)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, CURDATE(), ?, ?)";

$stmt = $pdo->prepare($query);
$execute = $stmt->execute([
    $ID_perusahaan,
    $posisi,
    $nama_perusahaan,
    $lokasi,
    $tipe_pekerjaan,
    $jenjang_pendidikan,
    $level_pekerjaan,
    $gaji_min,
    $gaji_max,
    $deskripsi_loker,
    $status_lowongan
]);

if ($execute) {
    header("Location: tambah-lowongan.php?status=berhasil");
    exit;
} else {
    die("Gagal menyimpan lowongan.");
}