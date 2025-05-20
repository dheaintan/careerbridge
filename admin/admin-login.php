<?php
session_start();
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Validasi input
    if (empty($email) || empty($password)) {
        die("Email dan Password harus diisi!");
    }

    // Query untuk cek admin
    $stmt = $pdo->prepare("SELECT * FROM login_signup WHERE email = :email LIMIT 1");
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password']) && $user['role'] === 'admin') {
        // Simpan session berdasarkan role
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = $user['ID_user'];

        // Update last_login ke waktu sekarang
        $stmt = $pdo->prepare("UPDATE login_signup SET last_login = CURRENT_TIMESTAMP WHERE ID_user = :id_user");
        $stmt->bindValue(':id_user', $user['ID_user'], PDO::PARAM_INT);
        $stmt->execute();

        header('Location: admin-dashboard.php');
        exit;
    } else {
        die("Email atau password salah, atau bukan admin.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login Admin</title>
    <link rel="icon" type="image/x-icon" href="../logo careerbridge.png">
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2 class="text-center mb-4">Login Admin</h2>

                <form method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
