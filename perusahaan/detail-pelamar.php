<?php
session_start();
require '../koneksi.php';

if (!isset($pdo)) {
    die('Koneksi database belum diinisialisasi.');
}

if (!isset($_SESSION['ID_perusahaan'], $_SESSION['role']) || $_SESSION['role'] !== 'perusahaan') {
    die('Akses ditolak. Login sebagai perusahaan terlebih dahulu.');
}

if (!isset($_GET['ID_apply']) || !is_numeric($_GET['ID_apply'])) {
    echo '<script>
            alert("ID pelamar tidak valid!");
            window.location.href = "lihat-daftar-pelamar.php";
          </script>';
    exit();
}

$ID_apply = (int)$_GET['ID_apply'];
$ID_perusahaan = $_SESSION['ID_perusahaan'];

try {
    $query = "
        SELECT
            aj.ID_apply,
            aj.created_at AS tanggal_lamar,
            aj.status_lamaran,
            p.ID_user AS pelamar_id,
            p.nama_lengkap,
            p.no_telp,
            p.alamat,
            p.pendidikan_terakhir,
            p.jenis_kelamin,
            u.email AS user_email,
            pj.posisi,
            pj.nama_perusahaan
        FROM apply_job aj
        JOIN detail_user p ON aj.ID_user = p.ID_user
        JOIN login_signup u ON aj.ID_user = u.ID_user
        JOIN posting_job pj ON aj.ID_job = pj.ID_job
        WHERE aj.ID_apply = :ID_apply AND pj.ID_perusahaan = :ID_perusahaan
    ";

    $stmt = $pdo->prepare($query);
    $stmt->execute(['ID_apply' => $ID_apply, 'ID_perusahaan' => $ID_perusahaan]);
    $pelamar = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$pelamar) {
        echo '<script>
                alert("Data pelamar tidak ditemukan atau Anda tidak memiliki akses untuk melihat data ini!");
                window.location.href = "lihat-daftar-pelamar.php";
              </script>';
        exit();
    }
} catch (PDOException $e) {
    die("Error: " . htmlspecialchars($e->getMessage()));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Pelamar</title>
    <link rel="icon" type="image/x-icon" href="../logo%20careerbridge.png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-decoration-none">
                <img src="../logo%20careerbridge.png" alt="CareerBridge" height="40" class="d-inline-block align-top">
            </a>
            <div class="container my-4">
                <h3>Detail Pelamar</h3>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header" style="background-color: #364c84; color: white;">
                <h5 class="mb-0">Informasi Pelamar</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Nama:</strong> <?php echo htmlspecialchars($pelamar['nama_lengkap'] ?? 'N/A'); ?></p>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($pelamar['user_email'] ?? 'N/A'); ?></p>
                        <p><strong>No. Telepon:</strong> <?php echo htmlspecialchars($pelamar['no_telp'] ?? 'N/A'); ?></p>
                        <p><strong>Alamat:</strong> <?php echo htmlspecialchars($pelamar['alamat'] ?? 'N/A'); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Pendidikan Terakhir:</strong> <?php echo htmlspecialchars($pelamar['pendidikan_terakhir'] ?? 'N/A'); ?></p>
                        <p><strong>Jenis Kelamin:</strong> <?php echo htmlspecialchars($pelamar['jenis_kelamin'] ?? 'N/A'); ?></p>
                        <p><strong>Posisi yang Dilamar:</strong> <?php echo htmlspecialchars($pelamar['posisi'] ?? 'N/A'); ?></p>
                        <p><strong>Tanggal Lamaran:</strong> 
                            <?php
                            $tanggal = isset($pelamar['tanggal_lamar']) && $pelamar['tanggal_lamar'] ? date('d-m-Y', strtotime($pelamar['tanggal_lamar'])) : 'Tidak tersedia';
                            echo htmlspecialchars($tanggal);
                            ?>
                        </p>
                        <p><strong>Status Lamaran:</strong> 
                            <?php
                            $status = $pelamar['status_lamaran'] ?? 'N/A';
                            $badge_class = $status === 'buka' ? 'bg-success' : 'bg-secondary';
                            ?>
                            <span class="badge <?php echo $badge_class; ?>">
                                <?php echo htmlspecialchars($status); ?>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <a href="lihat-pelamar.php" class="btn btn-secondary mt-3">Kembali ke Daftar Pelamar</a>
    </div>

    <div class="text-center mt-4 text-white small">
        <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>