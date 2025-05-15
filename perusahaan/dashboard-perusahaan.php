<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['ID_perusahaan'])) {
    echo "Silakan login terlebih dahulu.";
    exit;
}

$id_perusahaan = $_SESSION['ID_perusahaan'];

try {
    $stmt = $pdo->prepare("SELECT nama_perusahaan, email FROM perusahaan WHERE ID_perusahaan = ?");
    $stmt->execute([$id_perusahaan]);
    $data = $stmt->fetch();

    if (!$data) {
        die("Data perusahaan tidak ditemukan.");
    }

    $nama_perusahaan = $data['nama_perusahaan'];
    $email_perusahaan = $data['email'];
} catch (PDOException $e) {
    die("Query gagal: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Perusahaan</title>
    <link rel="icon" type="image/x-icon" href="../logo%20careerbridge.png" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="../assets/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-decoration-none" href="#">
                <img src="../logo%20careerbridge.png" alt="CareerBridge" height="40" class="d-inline-block align-top" />
            </a>
            <div class="container my-4">
                <h3>Dashboard Perusahaan</h3>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row">
            <!-- Sidebar Menu -->
            <div class="col-md-3 mb-3">
                <div class="list-group">
                    <p class="list-group-item list-group-item-action active">Beranda</p>
                    <a href="editprofil-perusahaan.php" class="list-group-item list-group-item-action">Profil Perusahaan</a>
                    <a href="daftarlowongan.php" class="list-group-item list-group-item-action">Daftar Lowongan</a>
                    <a href="#" class="list-group-item list-group-item-action">Riwayat Pelamar</a>
                    <a href="#" class="list-group-item list-group-item-action">Lowongan Disimpan</a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="alert alert-success" role="alert">
                    Selamat datang, <strong><?php echo htmlspecialchars($nama_perusahaan); ?></strong>! Ini adalah dashboard Anda.
                </div>

                <!-- Ringkasan -->
                <div class="row my-4">
                    <div class="col-md-4">
                        <div class="card text-dark mb-3" style="background-color: #95B1EE;">
                            <div class="card-body">
                                <h5 class="card-title">Total Lowongan</h5>
                                <p class="card-text fs-4">1</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-dark mb-3" style="background-color: #E7F1A8;">
                            <div class="card-body">
                                <h5 class="card-title">Total Pelamar</h5>
                                <p class="card-text fs-4">72</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white mb-3" style="background-color: #364C84;">
                            <div class="card-body">
                                <h5 class="card-title">Profil Perusahaan</h5>
                                <p class="card-text">
                                    <?php echo htmlspecialchars($nama_perusahaan); ?><br />
                                    <?php echo htmlspecialchars($email_perusahaan); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-4 text-white small">
        <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>