<?php
session_start();
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['ID_perusahaan'])) {
        echo "ID perusahaan tidak ditemukan di session.";
        exit;
    }

    $id_perusahaan = $_SESSION['ID_perusahaan'];

    $nama = htmlspecialchars(trim($_POST['nama_perusahaan'] ?? ''));
    $deskripsi = htmlspecialchars(trim($_POST['deskripsi_perusahaan'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email_perusahaan'] ?? ''));
    $lokasi = htmlspecialchars(trim($_POST['lokasi_perusahaan'] ?? ''));

    if (!$nama || !$deskripsi || !$email || !$lokasi) {
        echo "Semua field harus diisi.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Format email tidak valid.";
        exit;
    }

    $email_check_query = "SELECT COUNT(*) FROM perusahaan WHERE email = :email AND ID_perusahaan != :id";
    $stmt = $pdo->prepare($email_check_query);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':id', $id_perusahaan, PDO::PARAM_INT);
    $stmt->execute();
    $email_exists = $stmt->fetchColumn();

    if ($email_exists) {
        echo "Email sudah terdaftar.";
        exit;
    }

    $logo_filename = null;

    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "../uploads/logos/";
        $logo_filename = basename($_FILES["logo"]["name"]);
        $target_file = $target_dir . $logo_filename;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
            echo "Hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.";
            exit;
        }

        if (!move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
            echo "Terjadi kesalahan saat mengunggah logo.";
            exit;
        }
    }

    try {
        $query = "UPDATE perusahaan 
                  SET nama_perusahaan = :nama, deskripsi_perusahaan = :deskripsi, email = :email, lokasi = :lokasi";

        if ($logo_filename) {
            $query .= ", logo_url = :logo";
        }

        $query .= " WHERE ID_perusahaan = :id";

        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':nama', $nama);
        $stmt->bindValue(':deskripsi', $deskripsi);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':lokasi', $lokasi);
        if ($logo_filename) {
            $stmt->bindValue(':logo', $logo_filename);
        }
        $stmt->bindValue(':id', $id_perusahaan, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $updateJob = $pdo->prepare("UPDATE posting_job SET nama_perusahaan = :nama WHERE ID_perusahaan = :id");
            $updateJob->bindValue(':nama', $nama);
            $updateJob->bindValue(':id', $id_perusahaan, PDO::PARAM_INT);
            $updateJob->execute();

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