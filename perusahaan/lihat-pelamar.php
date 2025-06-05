<?php
session_start();
require '../koneksi.php';

if (!isset($pdo)) {
    die('Koneksi database belum diinisialisasi.');
}

if (!isset($_SESSION['ID_perusahaan'], $_SESSION['role']) || $_SESSION['role'] !== 'perusahaan') {
    die('Akses ditolak. Login sebagai perusahaan terlebih dahulu.');
}

$ID_perusahaan = $_SESSION['ID_perusahaan'];
echo "<!-- Debug Sesi: ID_perusahaan = $ID_perusahaan, Role = {$_SESSION['role']} -->";

try {
    $query = "
        SELECT
            aj.ID_apply,
            aj.created_at AS tanggal_lamar,
            p.ID_user AS pelamar_id,
            p.nama_lengkap,
            p.no_telp,
            p.alamat,
            p.pendidikan_terakhir,
            p.jenis_kelamin,
            u.email AS user_email,
            pj.posisi
        FROM apply_job aj
        JOIN detail_user p ON aj.ID_user = p.ID_user
        JOIN login_signup u ON aj.ID_user = u.ID_user
        JOIN posting_job pj ON aj.ID_job = pj.ID_job
        WHERE pj.ID_perusahaan = :id_perusahaan
        ORDER BY aj.created_at DESC
    ";

    $stmt = $pdo->prepare($query);
    $stmt->execute(['id_perusahaan' => $ID_perusahaan]);
    $rowCount = $stmt->rowCount();
    echo "<!-- Debug: Jumlah baris yang ditemukan = $rowCount -->";
    $lamaran = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($rowCount == 0) {
        echo "<!-- Debug: Tidak ada data untuk ID_perusahaan = $ID_perusahaan -->";
        $check_jobs = $pdo->prepare("SELECT COUNT(*) FROM posting_job WHERE ID_perusahaan = :id_perusahaan");
        $check_jobs->execute(['id_perusahaan' => $ID_perusahaan]);
        $job_count = $check_jobs->fetchColumn();
        echo "<!-- Debug: Jumlah lowongan untuk perusahaan = $job_count -->";
        if ($job_count > 0) {
            $check_applications = $pdo->prepare("SELECT COUNT(*) FROM apply_job aj JOIN posting_job pj ON aj.ID_job = pj.ID_job WHERE pj.ID_perusahaan = :id_perusahaan");
            $check_applications->execute(['id_perusahaan' => $ID_perusahaan]);
            $app_count = $check_applications->fetchColumn();
            echo "<!-- Debug: Jumlah lamaran untuk lowongan perusahaan = $app_count -->";
        }
    } else {
        echo "<!-- Debug Lamaran: " . print_r($lamaran, true) . " -->";
        if (!empty($lamaran)) {
            echo "<!-- Debug: pelamar_id pertama = " . print_r($lamaran[0]['pelamar_id'], true) . " -->";
        }
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
            <?php if (empty($lamaran)): ?>
                <p>Tidak ada pelamar untuk lowongan Anda saat ini.</p>
            <?php else: ?>
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
                        <td><?php echo htmlspecialchars($l['posisi'] ?? 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($l['nama_lengkap'] ?? 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($l['user_email'] ?? 'N/A'); ?></td>
                        <td>
                            <?php
                            $tanggal = isset($l['tanggal_lamar']) && $l['tanggal_lamar'] ? date('d-m-Y', strtotime($l['tanggal_lamar'])) : 'Tidak tersedia';
                            echo htmlspecialchars($tanggal);
                            ?>
                        </td>
                        <td>
                            <a href="detail-pelamar.php?ID_apply=<?php echo htmlspecialchars((string)($l['ID_apply'] ?? '')); ?>" class="btn btn-sm btn-primary">Lihat Profil</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
        <a href="dashboard-perusahaan.php" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
    </div>

    <div class="text-center mt-4 text-dark small">
        <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>