<?php
session_start();
require '../koneksi.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('ID pelamar tidak valid.');
}

$id_pelamar = intval($_GET['id']);

try {
    $query = "SELECT * FROM detail_user WHERE ID_user = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id' => $id_pelamar]);
    $pelamar = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$pelamar) {
        die('Data pelamar tidak ditemukan.');
    }
} catch (PDOException $e) {
    die('Error: ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Detail Pelamar - CareerBridge</title>
        <link rel="icon" type="image/x-icon" href="../logo%20careerbridge.png" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
        <link href="../assets/bootstrap.min.css" rel="stylesheet" />
    </head>

    <body class="bg-light">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand text-decoration-none" href="#">
                    <img src="../logo%20careerbridge.png" alt="CareerBridge" height="40" class="d-inline-block align-top" />
                </a>

                <div class="container my-4">
                    <h3>Detail Pelamar</h3>
                </div>
            </div>
        </nav>

        <div class="container card shadow rounded pt-3 px-3 my-4">
            <div class="card-body">
                <h5 class="card-title">Nama Lengkap: <strong><?= htmlspecialchars($pelamar['nama_lengkap']) ?></strong></h5>
                <p class="card-text mb-2"><strong>Nomor Telepon:</strong> <?= htmlspecialchars($pelamar['no_telp'] ?? '-') ?></p>
                <p class="card-text mb-2"><strong>Alamat:</strong> <?= nl2br(htmlspecialchars($pelamar['alamat'] ?? '-')) ?></p>
                <p class="card-text mb-2"><strong>Pendidikan Terakhir:</strong> <?= htmlspecialchars($pelamar['pendidikan_terakhir'] ?? '-') ?></p>
                <p class="card-text mb-2"><strong>Jenis Kelamin:</strong> <?= ($pelamar['jenis_kelamin'] === 'P' ? 'Perempuan' : ($pelamar['jenis_kelamin'] === 'L' ? 'Laki-laki' : '-')) ?></p>

                <?php if (!empty($pelamar['CV'])): ?>
                    <p class="card-text mb-2"><strong>CV:</strong> <a href="../uploads/cv/<?= htmlspecialchars($pelamar['CV']) ?>" target="_blank" rel="noopener">Download CV</a></p>
                <?php else: ?>
                    <p class="card-text mb-2"><strong>CV:</strong> Belum tersedia</p>
                <?php endif; ?>
            </div>

            <div class="mt-4 d-flex justify-content-end">
                <button class="btn btn-success mb-3">Tandai Sudah Dihubungi</button>
            </div>
        </div>

        <div class="text-center mt-4 text-white small bg-primary py-3">
            <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>