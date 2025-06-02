<?php
session_start();

$role = strtolower($_SESSION['role'] ?? '');
$username = $_SESSION['username'] ?? '';

$isLoggedIn = isset($_SESSION['ID_user']) && !empty($_SESSION['ID_user']);
$href = '#';

if ($isLoggedIn && $role === 'perusahaan') {
    $href = 'dashboard-perusahaan.php';
} else {
    $href = 'masukperusahaan.php';
}
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Pasang Iklan Lowongan Kerja - CareerBridge</title>
    <link rel="icon" href="../logo%20careerbridge.png" type="image/x-icon"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet"/>
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
                            <a class="nav-link active" aria-current="page" href="../pelamar/cari-loker" style="font-family: 'Inter', sans-serif;">Cari Lowongan Kerja</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link active  border-bottom border-dark" style="font-family: 'Inter', sans-serif;">Pasang Lowongan</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../artikel.html" style="font-family: 'Inter', sans-serif;">Tips Loker</a>
                        </li>
                    </ul>
                    
                    <form class="d-flex align-items-center mx-1">
                        <div class="dropdown">
                            <?php if ($role === 'pelamar'): ?>
                                <button class="btn dropdown-toggle d-flex align-items-center"
                                    type="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                    style="background-color: #e7f1a8; color: black; font-size: 0.90rem;">
                                    <i class="bi bi-person-circle me-2" style="font-size: 1.2rem;"></i> <?= htmlspecialchars($username ?: 'Profil Pelamar') ?>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="../pelamar/dashboard-pelamar.php">Dashboard Pelamar</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="../pelamar/logout-pelamar.php">Logout</a></li>
                                </ul>

                                <?php elseif ($role === 'perusahaan'): ?>
                                <button class="btn dropdown-toggle d-flex align-items-center"
                                    type="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                    style="background-color: #e7f1a8; color: black; font-size: 0.90rem;">
                                    <i class="bi bi-building me-2" style="font-size: 1.2rem;"></i> <?= htmlspecialchars($username ?: 'Profil Perusahaan') ?>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="dashboard-perusahaan.php">Dashboard Perusahaan</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="logout-perusahaan.php">Logout</a></li>
                                </ul>

                                <?php else: ?>
                                    <button
                                        class="btn dropdown-toggle"
                                        type="button"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                        style="background-color: #e7f1a8; color: black; font-size: 0.90rem;">
                                        Masuk
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="../pelamar/masukpekerja.php">Masuk sebagai Pencari Kerja</a></li>
                                        <li><a class="dropdown-item" href="../perusahaan/masukperusahaan.php">Masuk sebagai Perusahaan</a></li>
                                    </ul>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </nav>

        <section class="text-white text-center py-3" style="background-color: #364C84;">
            <div class="container">
                <h1 class="display-5 fw-bold" style="font-family: 'Inter', sans-serif">Pasang Iklan Lowongan Kerja</h1>
                <p class="lead mb-3" style="font-family: 'Inter', sans-serif">Rekrut Kandidat Terbaik dengan Mudah Bersama CareerBridge 🚀</p>
            </div>
        </section>

        <nav aria-label="breadcrumb" class="container my-3">
            <ol class="breadcrumb bg-transparent p-0 mb-0">
                <li class="breadcrumb-item">
                    <a href="../pelamar/cari-loker.php" class="text-decoration-none text-muted">Beranda</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Pasang Lowongan</li>
            </ol>
        </nav>

        <main class="container mb-5">
            <div class="row align-items-center gy-4">
                <div class="col-md-6">
                    <h3 class="fw-bold mb-4" style="color: #364C84">Perekrutan Praktis &amp; Efisien</h3>
                    <p class="text-muted mb-3">
                        Tinggalkan cara lama yang ribet! Dengan CareerBridge, Anda bisa:
                    </p>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <i class="bi bi-check-circle-fill me-2" style="color: #364C84"></i>
                            <span class="fw-semibold">Menjangkau Kandidat Terbaik:</span> Iklan Anda akan dilihat oleh ribuan pencari kerja berkualitas.
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-clock-fill me-2" style="color: #364C84"></i>
                            <span class="fw-semibold">Hemat Waktu:</span> Filter otomatis membantu Anda menemukan kandidat yang sesuai dengan cepat.
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-gear-fill me-2" style="color: #364C84"></i>
                            <span class="fw-semibold">Proses Mudah:</span> Pasang lowongan hanya dalam beberapa langkah sederhana.
                        </li>
                    </ul>
                    <a href="<?= htmlspecialchars($href) ?>" class="btn fw-semibold mt-3 text-white" style="background-color: #364C84">
                        Mulai Sekarang
                    </a>
                </div>
                <div class="col-md-6 text-center">
                    <img src="https://blush.design/api/download?shareUri=vK7buK3J0r3Kgf6N&c=Hair_0%7Ed5d5d5-0.7%7E372310-0.8%7Ed5d5d5_Skin_0%7Ec3986a-0.7%7E673a18-0.8%7Ec3986a&w=800&h=800&fm=png" alt="Ilustrasi Rekrutmen" class="img-fluid rounded shadow-sm" loading="lazy"/>
                </div>
            </div>
        </main>

        <footer class="text-white py-5" style="background-color: #364C84;">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="d-flex align-items-start mb-3">
                            <img src="../logo%20careerbridge.png" alt="CareerBridge" height="100" class="d-inline-block align-top" />
                        </div>
                        <p>
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
                            <a href="../pelamar/daftarpekerja.php" class="text-white text-decoration-none mb-1">Registrasi Pencari Kerja</a>
                            <a href="../pelamar/cari-loker.php" class="text-white text-decoration-none mb-1">Cari Lowongan Kerja</a>
                            <a href="../artikel.html" class="text-white text-decoration-none mb-1">Tips Loker</a>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <h6 class="fw-bold">Perusahaan</h6>
                        <div class="d-flex flex-column">
                            <a href="masukperusahaan.php" class="text-white text-decoration-none mb-1">Registrasi Perusahaan</a>
                            <a href="pasang-loker.php" class="text-white text-decoration-none mb-1">Pasang Loker</a>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4 small">
                <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
                </div>
            </div>
        </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>