<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['ID_user']) || $_SESSION['role'] !== 'pelamar') {
    header("Location: masukpekerja.php");
    exit;
}

$id_user = $_SESSION['ID_user'];

$nama_lengkap = trim($_POST['nama_lengkap'] ?? '');
$no_telp = trim($_POST['no_telp'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');
$pendidikan = trim($_POST['pendidikan_terakhir'] ?? '');
$jenis_kelamin = trim($_POST['jenis_kelamin'] ?? '');
$email = trim($_POST['email'] ?? '');

// Update email di tabel login_signup
try {
    $stmtEmail = $pdo->prepare("UPDATE login_signup SET email = ? WHERE ID_user = ?");
    $stmtEmail->execute([$email, $id_user]);
} catch (PDOException $e) {
    die("Gagal update email: " . $e->getMessage());
}

// Ambil nama file CV lama dari database
$stmtOld = $pdo->prepare("SELECT CV FROM detail_user WHERE ID_user = ?");
$stmtOld->execute([$id_user]);
$old_cv = $stmtOld->fetchColumn();

$cv_filename = null;
if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
    $allowed_types = [
        'application/pdf',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
    ];

    if (!in_array($_FILES['cv']['type'], $allowed_types)) {
        die("File CV harus berupa PDF atau Word.");
    }

    $max_size = 2 * 1024 * 1024; // 2MB
    if ($_FILES['cv']['size'] > $max_size) {
        die("Ukuran file CV terlalu besar, maksimal 2MB.");
    }

    $upload_dir = '../uploads/cv/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    // Hapus file CV lama jika ada
    if ($old_cv) {
        $old_file_path = $upload_dir . $old_cv;
        if (file_exists($old_file_path)) {
            unlink($old_file_path);
        }
    }

    $file_ext = pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION);
    $cv_filename = 'cv_' . $id_user . '_' . time() . '.' . $file_ext;
    $target_file = $upload_dir . $cv_filename;

    if (!move_uploaded_file($_FILES['cv']['tmp_name'], $target_file)) {
        die("Gagal menyimpan file CV.");
    }
}

try {
    // Cek apakah data detail_user sudah ada
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM detail_user WHERE ID_user = ?");
    $stmt->execute([$id_user]);
    $exists = $stmt->fetchColumn();

    if ($exists) {
        // Update data profil, termasuk update CV jika ada file baru
        if ($cv_filename) {
            $query = "UPDATE detail_user SET nama_lengkap = ?, no_telp = ?, alamat = ?, pendidikan_terakhir = ?, jenis_kelamin = ?, CV = ? WHERE ID_user = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$nama_lengkap, $no_telp, $alamat, $pendidikan, $jenis_kelamin, $cv_filename, $id_user]);
        } else {
            $query = "UPDATE detail_user SET nama_lengkap = ?, no_telp = ?, alamat = ?, pendidikan_terakhir = ?, jenis_kelamin = ? WHERE ID_user = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$nama_lengkap, $no_telp, $alamat, $pendidikan, $jenis_kelamin, $id_user]);
        }
    } else {
        // Insert data baru, termasuk CV jika ada file baru
        if ($cv_filename) {
            $query = "INSERT INTO detail_user (ID_user, nama_lengkap, no_telp, alamat, pendidikan_terakhir, jenis_kelamin, CV) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$id_user, $nama_lengkap, $no_telp, $alamat, $pendidikan, $jenis_kelamin, $cv_filename]);
        } else {
            $query = "INSERT INTO detail_user (ID_user, nama_lengkap, no_telp, alamat, pendidikan_terakhir, jenis_kelamin) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$id_user, $nama_lengkap, $no_telp, $alamat, $pendidikan, $jenis_kelamin]);
        }
    }

    header("Location: dashboard-pelamar.php?update=success");
    exit;
} catch (PDOException $e) {
    die("Gagal menyimpan data profil: " . $e->getMessage());
}