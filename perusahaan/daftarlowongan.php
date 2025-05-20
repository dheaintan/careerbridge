<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['ID_perusahaan'])) {
    echo "Silakan login terlebih dahulu.";
    exit;
}

$id_perusahaan = $_SESSION['ID_perusahaan'];

try {
    $stmt_lowongan = $pdo->prepare("SELECT * FROM posting_job WHERE ID_perusahaan = ? ORDER BY tanggal_posting DESC");
    $stmt_lowongan->execute([$id_perusahaan]);
    $lowongan_list = $stmt_lowongan->fetchAll();
} catch (PDOException $e) {
    die("Query gagal: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Lowongan</title>
    <link rel="icon" type="image/x-icon" href="../logo%20careerbridge.png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../logo%20careerbridge.png" alt="CareerBridge" height="40">
            </a>
            <div class="container my-4">
                <h3>Daftar Lowongan</h3>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="d-flex justify-content-end align-items-center mb-4">
            <a href="tambah-lowongan.php" class="btn btn-primary">+ Tambah Lowongan</a>
        </div>
        <div class="container card shadow rounded pt-3 px-3">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Posisi</th>
                            <th>Lokasi</th>
                            <th>Tanggal Posting</th>
                            <th>Pelamar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lowongan_list as $lowongan): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($lowongan['posisi']); ?></td>
                            <td><?php echo htmlspecialchars($lowongan['lokasi']); ?></td>
                            <td><?php echo date('d F Y', strtotime($lowongan['tanggal_posting'])); ?></td>
                            <td>
                                <?php
                                    $stmt_pelamar = $pdo->prepare("SELECT COUNT(*) FROM pelamar WHERE ID_job = ?");
                                    $stmt_pelamar->execute([$lowongan['ID_job']]);
                                    $jumlah_pelamar = $stmt_pelamar->fetchColumn();
                                    echo $jumlah_pelamar;
                                ?>
                            </td>
                            <td>
                                <a href="lihat-pelamar.php?ID_job=<?php echo $lowongan['ID_job']; ?>" class="btn btn-sm btn-info">Lihat Lowongan</a>
                                <a href="edit-lowongan.php?ID_job=<?php echo $lowongan['ID_job']; ?>" class="btn btn-sm btn-warning">Edit Lowongan</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="text-center mt-4 text-white small">
        <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>