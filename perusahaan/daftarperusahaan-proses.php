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

// Cek apakah email sudah terdaftar
$cek = mysqli_query($conn, "SELECT * FROM login_signup WHERE email='$email'");
if (mysqli_num_rows($cek) > 0) {
    echo '<script>alert("Email sudah terdaftar!"); window.history.back();</script>';
    exit;
}

$role = 'perusahaan';

// Simpan ke login_signup
$query = "INSERT INTO login_signup (email, password, role) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sss", $email, $hashedPassword, $role);

if ($stmt->execute()) {
    $id_user = $stmt->insert_id;

    $nama_perusahaan = 'Perusahaan Baru';
    $deskripsi = 'Deskripsi perusahaan belum diisi';
    $lokasi = 'Belum ditentukan';

    $query2 = "INSERT INTO perusahaan (nama_perusahaan, deskripsi_perusahaan, email, lokasi, ID_user) VALUES (?, ?, ?, ?, ?)";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param("ssssi", $nama_perusahaan, $deskripsi, $email, $lokasi, $id_user);

    if ($stmt2->execute()) {
        echo '<script>
                alert("Registrasi berhasil. Silakan login.");
                window.location.href = "masukperusahaan.php";
              </script>';
    } else {
        echo "Gagal menyimpan data perusahaan: " . $stmt2->error;
    }

    $stmt2->close();
} else {
    echo "Gagal menyimpan user: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
