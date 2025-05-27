<?php
session_start();

if (!isset($_SESSION['ID_user'])) {
    header('Location: masukpekerja.php');
    exit();
}

$ID_user = $_SESSION['ID_user'];

require '../koneksi.php';

try {
    $sql = "SELECT simpan_loker.ID_job, posting_job.posisi, posting_job.nama_perusahaan, posting_job.lokasi, posting_job.tanggal_posting
            FROM simpan_loker
            JOIN posting_job ON simpan_loker.ID_job = posting_job.ID_job
            WHERE simpan_loker.ID_user = :ID_user
            ORDER BY simpan_loker.created_at DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['ID_user' => $ID_user]);
    $lowongan = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Terjadi kesalahan: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lowongan Disimpan</title>
    <link rel="icon" type="image/x-icon" href="../logo%20careerbridge.png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-decoration-none">
                <img src="../logo%20careerbridge.png" alt="CareerBridge" height="40" class="d-inline-block align-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="cari-loker.php" style="font-family: 'Inter', sans-serif;">Cari Lowongan Kerja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../artikel.html" style="font-family: 'Inter', sans-serif;">Tips Loker</a>
                    </li>
                </ul>
                <form class="d-flex align-items-center mx-1">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #e7f1a8; color: black; font-size: 0.90rem">
                            Akun Saya
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="logout-pelamar.php">Logout</a></li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <div style="width: 100%; height: 2px; background-color: black;"></div>

    <div class="container my-5">
        <h3 class="mb-4">Lowongan Disimpan</h3>
        <div class="row g-4">
            <?php
            if ($lowongan) {
                foreach ($lowongan as $row) {
                    $id_job = htmlspecialchars($row['ID_job']);
                    $posisi = htmlspecialchars($row['posisi']);
                    $nama_perusahaan = htmlspecialchars($row['nama_perusahaan']);
                    $lokasi = htmlspecialchars($row['lokasi']);
                    $tanggal_posting = date("d F Y", strtotime($row['tanggal_posting']));
                    echo "
                    <div class='col-md-6'>
                        <div class='card shadow-sm'>
                            <div class='card-body'>
                                <h5 class='card-title'>$posisi</h5>
                                <p class='card-text'>$nama_perusahaan • $lokasi</p>
                                <p class='text-muted mb-1'>Diposting pada: $tanggal_posting</p>
                                <a href='../perusahaan/detail-pekerjaan.php?id=$id_job' class='btn btn-primary btn-sm'>Lihat Lowongan</a>
                                <a href='hapus_bookmark.php?id=$id_job' class='btn btn-outline-danger btn-sm'>Hapus</a>
                            </div>
                        </div>
                    </div>";
                }
            } else {
                echo "<p class='text-center'>Tidak ada lowongan yang dibookmark.</p>";
            }
            ?>
        </div>
    </div>

    <footer class="text-white py-5" style="background-color: #364c84">
        <div class="container text-white">
            <div class="row">
                <div class="col-md-5">
                    <div class="d-flex align-items-start mb-3">
                        <img src="../logo%20careerbridge.png" alt="CareerBridge" height="100" class="d-inline-block align-top">
                    </div>
                    <p style="max-width: 500px;">
                        CareerBridge adalah platform yang membantu pencari kerja menemukan pekerjaan yang tepat dan memudahkan perusahaan dalam merekrut karyawan. Dengan sistem yang mudah digunakan, CareerBridge membuat proses mencari kerja dan perekrutan menjadi lebih cepat dan efisien.
                    </p>
                </div>
                <div class="col-md-2">
                    <h6 class="fw-bold">Tentang Kami</h6>
                    <div class="d-flex flex-column">
                        <a href="../pusatbantuan.html" class="text-white text-decoration-none mb-1">Pusat Bantuan</a>
                        <a href="../kebijakanprivasi.html" class="text-white text-decoration-none mb-1">Kebijakan Privasi</a>
                        <a href="../snk.html" class="text-white text-decoration-none mb-1">Kondisi dan Ketentuan</a>
                    </div>
                </div>
                <div class="col-md-2">
                    <h6 class="fw-bold">Pencari Kerja</h6>
                    <div class="d-flex flex-column">
                        <a href="daftarpekerja.php" class="text-white text-decoration-none mb-1">Registrasi Pencari Kerja</a>
                        <a href="cari-loker.php" class="text-white text-decoration-none mb-1">Cari Lowongan Kerja</a>
                        <a href="../artikel.html" class="text-white text-decoration-none mb-1">Tips Loker</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <h6 class="fw-bold">Perusahaan</h6>
                    <div class="d-flex flex-column">
                        <a href="../perusahaan/masukperusahaan.php" class="text-white text-decoration-none mb-1">Registrasi Perusahaan</a>
                        <a href="../perusahaan/pasang-loker.php" class="text-white text-decoration-none mb-1">Pasang Loker</a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4 text-white small">
                <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>