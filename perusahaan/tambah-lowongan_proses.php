<?php
session_start();
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['ID_perusahaan'])) {
        die("Login dulu bro!");
    }

    $ID_perusahaan = $_SESSION['ID_perusahaan'];

    // Ambil data dari form dengan trim dan sanitasi dasar
    $posisi = trim($_POST['posisi'] ?? '');
    $nama_perusahaan = trim($_POST['nama_perusahaan'] ?? '');
    $lokasi = trim($_POST['lokasi'] ?? '');
    $tipe_pekerjaan = $_POST['tipe_pekerjaan'] ?? '';
    $jenjang_pendidikan = $_POST['jenjang_pendidikan'] ?? '';
    $level_pekerjaan = trim($_POST['level_pekerjaan'] ?? '');
    $gaji = isset($_POST['gaji']) ? (int)$_POST['gaji'] : 0;
    $deskripsi_loker = trim($_POST['deskripsi_loker'] ?? '');
    $status_lowongan = 'buka';

    // Validasi sederhana
    if (!$posisi || !$nama_perusahaan || !$lokasi || !$tipe_pekerjaan || !$jenjang_pendidikan || !$level_pekerjaan || $gaji <= 0 || !$deskripsi_loker) {
        die("Semua field harus diisi dengan benar.");
    }

    $query = "INSERT INTO posting_job 
        (ID_perusahaan, posisi, nama_perusahaan, lokasi, tipe_pekerjaan, jenjang_pendidikan, level_pekerjaan, gaji, tanggal_posting, deskripsi_loker, status_lowongan)
        VALUES (:ID_perusahaan, :posisi, :nama_perusahaan, :lokasi, :tipe_pekerjaan, :jenjang_pendidikan, :level_pekerjaan, :gaji, CURDATE(), :deskripsi_loker, :status_lowongan)";

    $stmt = $pdo->prepare($query);

    $stmt->bindValue(':ID_perusahaan', $ID_perusahaan, PDO::PARAM_INT);
    $stmt->bindValue(':posisi', $posisi);
    $stmt->bindValue(':nama_perusahaan', $nama_perusahaan);
    $stmt->bindValue(':lokasi', $lokasi);
    $stmt->bindValue(':tipe_pekerjaan', $tipe_pekerjaan);
    $stmt->bindValue(':jenjang_pendidikan', $jenjang_pendidikan);
    $stmt->bindValue(':level_pekerjaan', $level_pekerjaan);
    $stmt->bindValue(':gaji', $gaji, PDO::PARAM_INT);
    $stmt->bindValue(':deskripsi_loker', $deskripsi_loker);
    $stmt->bindValue(':status_lowongan', $status_lowongan);

    if ($stmt->execute()) {
        header("Location: daftar-lowongan.php?status=berhasil");
        exit;
    } else {
        $error = $stmt->errorInfo();
        die("Gagal menyimpan lowongan: " . $error[2]);
    }
} else {
    die("Akses tidak valid.");
}