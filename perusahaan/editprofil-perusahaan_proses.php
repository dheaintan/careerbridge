<?php
session_start();
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['ID_perusahaan'])) {
        echo "ID perusahaan tidak ditemukan di session.";
        exit;
    }

    $id_perusahaan = $_SESSION['ID_perusahaan'];

    $nama = trim($_POST['nama_perusahaan'] ?? '');
    $deskripsi = trim($_POST['deskripsi_perusahaan'] ?? '');
    $email = trim($_POST['email_perusahaan'] ?? '');
    $lokasi = trim($_POST['lokasi_perusahaan'] ?? '');

    if (!$nama || !$deskripsi || !$email || !$lokasi) {
        echo "Semua field harus diisi.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Format email tidak valid.";
        exit;
    }

    try {
        $query = "UPDATE perusahaan 
                  SET nama_perusahaan = :nama, deskripsi_perusahaan = :deskripsi, email = :email, lokasi = :lokasi 
                  WHERE ID_perusahaan = :id";

        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':nama', $nama);
        $stmt->bindValue(':deskripsi', $deskripsi);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':lokasi', $lokasi);
        $stmt->bindValue(':id', $id_perusahaan, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: dashboard-perusahaan.php?status=sukses");
            exit;
        } else {
            echo "Gagal update profil perusahaan.";
        }
    } catch (PDOException $e) {
        echo "Error saat update: " . $e->getMessage();
    }
} else {
    echo "Akses langsung tidak diperbolehkan.";
}