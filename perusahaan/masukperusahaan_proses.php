<?php
session_start();
include '../koneksi.php';

if (!isset($_POST['email']) || !isset($_POST['password'])) {
    echo '<script>
            alert("Email dan password harus diisi!");
            window.location.href = "masukperusahaan.php";
          </script>';
    exit();
}

$email = trim($_POST['email']);
$password = $_POST['password'];

// Validasi email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo '<script>
            alert("Email tidak valid! Silakan coba lagi");
            window.location.href = "masukperusahaan.php";
          </script>';
    exit();
}

try {
    $stmt = $pdo->prepare("SELECT ID_user, email, password, role FROM login_signup WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        if (password_verify($password, $user['password'])) {
            if ($user['role'] === 'perusahaan') {
                $_SESSION['ID_user'] = $user['ID_user'];
                $_SESSION['role'] = $user['role'];

                $stmt2 = $pdo->prepare("SELECT ID_Perusahaan FROM perusahaan WHERE ID_user = ?");
                $stmt2->execute([$_SESSION['ID_user']]);
                $perusahaan = $stmt2->fetch();

                if ($perusahaan) {
                    $_SESSION['ID_perusahaan'] = $perusahaan['ID_Perusahaan'];

                    header("Location: landingpage-perusahaan.html");
                    exit();
                } else {
                    echo '<script>
                            alert("Data perusahaan tidak ditemukan untuk akun ini.");
                            window.location.href = "masukperusahaan.php";
                          </script>';
                    exit();
                }
            } else {
                echo '<script>
                        alert("Akses hanya untuk perusahaan!");
                        window.location.href = "masukperusahaan.php";
                      </script>';
                exit();
            }
        } else {
            echo '<script>
                    alert("Password salah! Silakan coba lagi");
                    window.location.href = "masukperusahaan.php";
                  </script>';
            exit();
        }
    } else {
        echo '<script>
                alert("Email tidak ditemukan! Silakan coba lagi");
                window.location.href = "masukperusahaan.php";
              </script>';
        exit();
    }
} catch (PDOException $e) {
    die("Error query: " . $e->getMessage());
}