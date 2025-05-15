<?php
include '../koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];
$passwordVerify = $_POST['passwordVerify'];

// Validasi jika password tidak cocok
if ($password !== $passwordVerify) {
    echo "Password tidak cocok!";
    exit;
}

// Enkripsi password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Cek apakah email sudah terdaftar
$cek = mysqli_query($conn, "SELECT * FROM login_signup WHERE email='$email'");
if (mysqli_num_rows($cek) > 0) {
    echo "Email sudah terdaftar!";
    exit;
}

// Simpan data ke DB
$query = "INSERT INTO login_signup (email, password) VALUES ('$email', '$hashedPassword')";
if (mysqli_query($conn, $query)) {
    // Notifikasi berhasil daftar dan redirect ke halaman login
    echo '<script type="text/javascript">
            alert("Registrasi berhasil. Silakan login.");
            window.location.href = "masukpekerja.php"; // redirect ke halaman login
          </script>';
} else {
    echo "Terjadi kesalahan: " . mysqli_error($conn);
}
?>
