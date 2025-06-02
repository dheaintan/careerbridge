<?php
session_start();
require '../koneksi.php';

if (!isset($pdo)) {
    die('Koneksi database belum diinisialisasi.');
}

if (!isset($_SESSION['ID_user'], $_SESSION['role']) || $_SESSION['role'] !== 'perusahaan') {
    die('Akses ditolak. Login sebagai perusahaan terlebih dahulu.');
}

$ID_perusahaan = $_SESSION['ID_user'];

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
                u.email,
                pj.posisi
            FROM apply_job aj
            JOIN detail_user p ON aj.ID_user = p.ID_user
            JOIN login_signup u ON aj.ID_user = u.ID_user
            JOIN posting_job pj ON aj.ID_job = pj.ID_job
            WHERE pj.ID_Perusahaan = :id_perusahaan
            ORDER BY aj.created_at DESC
        ";

    $stmt = $pdo->prepare($query);
    $stmt->execute(['id_perusahaan' => $ID_perusahaan]);
    $lamaran = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Error: " . htmlspecialchars($e->getMessage()));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lihat Daftar Pelamar</title>
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
                <h3>Daftar Kandidat</h3>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Posisi</th>
                        <th>Nama Pelamar</th>
                        <th>Email</th>
                        <th>Tanggal Lamar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($lamaran as $l): ?>
                    <tr>
                        <td><?= htmlspecialchars($l['posisi']) ?></td>
                        <td><?= htmlspecialchars($l['nama_lengkap']) ?></td>
                        <td><?= htmlspecialchars($l['email']) ?></td>
                        <td><?= date('d-m-Y', strtotime($l['tanggal_lamar'])) ?></td>
                        <td>
                            <a href="detail-pelamar.php?id=<?= $l['pelamar_id'] ?>" class="btn btn-sm btn-primary">Lihat Profil</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
    </tbody>
</table>
        </div>
      
        <a href="dashboard-perusahaan.php" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
    </div>

    <div class="text-center mt-4 text-white small">
        <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
    </div>
</body>
</html>