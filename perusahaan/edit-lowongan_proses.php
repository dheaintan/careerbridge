<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['ID_perusahaan'])) {
    echo "Silakan login terlebih dahulu.";
    exit;
}

$success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_job = $_POST['id_job'];
    $posisi = $_POST['posisi'];
    $lokasi = $_POST['lokasi'];
    $tipe_pekerjaan = $_POST['tipe_pekerjaan'];
    $jenjang_pendidikan = $_POST['jenjang_pendidikan'];
    $level_pekerjaan = $_POST['level_pekerjaan'];
    $gaji_min = $_POST['gaji_min'];
    $gaji_max = $_POST['gaji_max'];
    $deskripsi_loker = $_POST['deskripsi_loker'];
    $tanggal_posting = $_POST['tanggal_posting'];

    try {
        $stmt = $pdo->prepare("UPDATE posting_job SET posisi = ?, lokasi = ?, tipe_pekerjaan = ?, jenjang_pendidikan = ?, level_pekerjaan = ?, gaji_min = ?, gaji_max = ?, deskripsi_loker = ?, tanggal_posting = ? WHERE ID_job = ? AND ID_Perusahaan = ?");
        $stmt->execute([$posisi, $lokasi, $tipe_pekerjaan, $jenjang_pendidikan, $level_pekerjaan, $gaji_min, $gaji_max, $deskripsi_loker, $tanggal_posting, $id_job, $_SESSION['ID_perusahaan']]);
        
        $success = true;
    } catch (PDOException $e) {
        die("Query gagal: " . $e->getMessage());
    }
}
?>