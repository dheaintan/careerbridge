<?php
session_start();
include '../koneksi.php';

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    echo '<script>
            alert("Email dan password harus diisi!");
            window.location.href = "masukpekerja.php";
          </script>';
    exit();
}

try {
    $stmt = $pdo->prepare("SELECT * FROM login_signup WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['ID_user'] = $user['ID_user'];
            $_SESSION['role'] = $user['role'];

            header("Location: landingpage-pelamar.html");
            exit();
        } else {
            echo '<script>
                    alert("Password salah! Silakan coba lagi");
                    window.location.href = "masukpekerja.php";
                  </script>';
            exit();
        }
    } else {
        echo '<script>
                alert("Email tidak ditemukan! Silakan coba lagi");
                window.location.href = "masukpekerja.php";
              </script>';
        exit();
    }
} catch (PDOException $e) {
    die("Error query: " . $e->getMessage());
}