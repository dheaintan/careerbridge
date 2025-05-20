<?php
session_start();
include '../koneksi.php';

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$passwordVerify = $_POST['passwordVerify'] ?? '';

if (!$email || !$password || !$passwordVerify) {
    die("Semua field harus diisi.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Format email tidak valid.");
}

if ($password !== $passwordVerify) {
    die("Password tidak cocok!");
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

try {
    // Cek email sudah terdaftar?
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM login_signup WHERE email = ?");
    $stmt->execute([$email]);
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        die("Email sudah terdaftar!");
    }

    // Insert user baru dengan role pelamar
    $insert = $pdo->prepare("INSERT INTO login_signup (email, password, role) VALUES (?, ?, 'pelamar')");
    $insert->execute([$email, $hashedPassword]);

    echo '<script>
            alert("Registrasi berhasil. Silakan login.");
            window.location.href = "masukpekerja.php";
          </script>';
} catch (PDOException $e) {
    die("Error database: " . $e->getMessage());
}