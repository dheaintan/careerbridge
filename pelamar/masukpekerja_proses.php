<?php
session_start();
include '../koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM login_signup WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    if (password_verify($password, $row['password'])) {
        $_SESSION['ID_user'] = $row['id'];
        $_SESSION['role'] = $row['role'];

        header("Location: landingpage-pelamar.html");
        exit();
    } else {
        // Jika password tidak cocok
        echo '<script language="javascript">
                window.alert("Password salah! Silakan coba lagi");
                window.location.href="daftarpekerja.php";
              </script>';
    }
} else {
    // Jika email tidak ditemukan dalam database
    echo '<script language="javascript">
            window.alert("Email tidak ditemukan! Silakan coba lagi");
            window.location.href="daftarpekerja.php";
          </script>';
}

$stmt->close();
$conn->close();
?>