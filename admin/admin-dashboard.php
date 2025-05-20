<?php
session_start();
include '../koneksi.php';

// Cek apakah admin sudah login
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header('Location: admin-login.php');
    exit;
}

// Ambil daftar loker yang statusnya 'ditinjau' dan 'buka'
$stmt = $pdo->prepare("SELECT * FROM posting_job WHERE status_lowongan IN ('ditinjau', 'buka') ORDER BY tanggal_posting DESC");
$stmt->execute();
$lokerList = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Verifikasi atau tolak loker
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];

    if ($action == 'verify') {
        // Update status menjadi 'buka' setelah diverifikasi
        $stmt = $pdo->prepare("UPDATE posting_job SET status_lowongan = 'buka' WHERE ID_job = :id_job");
        $stmt->bindValue(':id_job', $id, PDO::PARAM_INT);
        $stmt->execute();
    } elseif ($action == 'reject') {
        // Update status menjadi 'tutup' jika ditolak
        $stmt = $pdo->prepare("UPDATE posting_job SET status_lowongan = 'tutup' WHERE ID_job = :id_job");
        $stmt->bindValue(':id_job', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    // Redirect setelah aksi
    header('Location: admin-dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Admin - Verifikasi Loker</title>
    <link rel="icon" type="image/x-icon" href="../logo careerbridge.png">
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2 class="text-center mb-4">Dashboard Admin</h2>

                <h4>Daftar Loker yang Perlu Diverifikasi</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Posisi</th>
                            <th>Perusahaan</th>
                            <th>Lokasi</th>
                            <th>Tanggal Posting</th>
                            <th>Gaji</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($lokerList): ?>
                            <?php foreach ($lokerList as $loker): ?>
                                <tr>
                                    <td><?php echo $loker['ID_job']; ?></td>
                                    <td><?php echo htmlspecialchars($loker['posisi']); ?></td>
                                    <td><?php echo htmlspecialchars($loker['nama_perusahaan']); ?></td>
                                    <td><?php echo htmlspecialchars($loker['lokasi']); ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($loker['tanggal_posting'])); ?></td>
                                    <td><?php echo "Rp " . number_format($loker['gaji_min'], 0, ',', '.'); ?> - <?php echo "Rp " . number_format($loker['gaji_max'], 0, ',', '.'); ?></td>
                                    <td>
                                        <?php
                                            if ($loker['status_lowongan'] == 'ditinjau') {
                                                echo '<span class="badge bg-warning">Sedang Ditinjau</span>';
                                            } else {
                                                echo '<span class="badge bg-success">Telah Diverifikasi</span>';
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php if ($loker['status_lowongan'] == 'ditinjau'): ?>
                                            <a href="admin-dashboard.php?action=verify&id=<?php echo $loker['ID_job']; ?>" class="btn btn-success btn-sm">Verifikasi</a>
                                            <a href="admin-dashboard.php?action=reject&id=<?php echo $loker['ID_job']; ?>" class="btn btn-danger btn-sm">Tolak</a>
                                        <?php else: ?>
                                            <span class="text-muted">Tidak ada tindakan</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada loker yang perlu diverifikasi.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
