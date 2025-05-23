<?php
session_start();
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_job = $_POST['id_job'];
    $id_perusahaan = $_SESSION['ID_perusahaan'];
    $posisi = $_POST['posisi'];
    $lokasi = $_POST['lokasi'];
    $tipe_pekerjaan = $_POST['tipe_pekerjaan'];
    $jenjang = $_POST['jenjang_pendidikan'];
    $level = $_POST['level_pekerjaan'];
    $gaji_min = $_POST['gaji_min'];
    $gaji_max = $_POST['gaji_max'];
    $deskripsi = $_POST['deskripsi_loker'];
    $tanggal = $_POST['tanggal_posting'];

    try {
        $stmt = $pdo->prepare("UPDATE posting_job SET posisi = ?, lokasi = ?, tipe_pekerjaan = ?, jenjang_pendidikan = ?, level_pekerjaan = ?, gaji_min = ?, gaji_max = ?, deskripsi_loker = ?, tanggal_posting = ? WHERE ID_job = ? AND ID_perusahaan = ?");
        $stmt->execute([$posisi, $lokasi, $tipe_pekerjaan, $jenjang, $level, $gaji_min, $gaji_max, $deskripsi, $tanggal, $id_job, $id_perusahaan]);

        header("Location: edit-lowongan.php?ID_job=$id_job&success=1");
        exit;
    } catch (PDOException $e) {
        die("Gagal memperbarui: " . $e->getMessage());
    }
}