<?php
include '../koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];
$passwordVerify = $_POST['passwordVerify'];

if ($password !== $passwordVerify) {
    echo '<script>alert("Password tidak cocok!"); window.history.back();</script>';
    exit;
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("SELECT * FROM login_signup WHERE email = ?");
$stmt->execute([$email]);
if ($stmt->rowCount() > 0) {
    echo '<script>alert("Email sudah terdaftar!"); window.history.back();</script>';
    exit;
}

$role = 'perusahaan';
$stmt = $pdo->prepare("INSERT INTO login_signup (email, password, role) VALUES (?, ?, ?)");
if ($stmt->execute([$email, $hashedPassword, $role])) {
    $id_user = $pdo->lastInsertId();

    $nama_perusahaan = 'Perusahaan Baru';
    $deskripsi = 'Deskripsi perusahaan belum diisi';
    $lokasi = 'Belum ditentukan';

    $stmt2 = $pdo->prepare("INSERT INTO perusahaan (nama_perusahaan, deskripsi_perusahaan, email, lokasi, ID_user) VALUES (?, ?, ?, ?, ?)");
    if ($stmt2->execute([$nama_perusahaan, $deskripsi, $email, $lokasi, $id_user])) {
        echo '<script>
                alert("Registrasi berhasil. Silakan login.");
                window.location.href = "masukperusahaan.php";
              </script>';
    } else {
        echo "Gagal menyimpan data perusahaan.";
    }
} else {
    echo "Gagal menyimpan user.";
}
?>