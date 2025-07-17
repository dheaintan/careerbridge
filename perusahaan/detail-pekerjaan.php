<?php
session_start();
include '../koneksi.php';

$role = strtolower($_SESSION['role'] ?? '');
$username = $_SESSION['username'] ?? '';

if ($role === 'pelamar' && isset($_SESSION['ID_user'])) {
    try {
        $stmt = $pdo->prepare("SELECT nama_lengkap FROM detail_user WHERE ID_user = ?");
        $stmt->execute([$_SESSION['ID_user']]);
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
        $username = $user_data['nama_lengkap'] ?? $username;
    } catch (PDOException $e) {
        error_log("Gagal mengambil nama pelamar: " . $e->getMessage());
    }
} elseif ($role === 'perusahaan' && isset($_SESSION['ID_perusahaan'])) {
    try {
        $stmt = $pdo->prepare("SELECT nama_perusahaan FROM perusahaan WHERE ID_perusahaan = ?");
        $stmt->execute([$_SESSION['ID_perusahaan']]);
        $perusahaan_data = $stmt->fetch(PDO::FETCH_ASSOC);
        $username = $perusahaan_data['nama_perusahaan'] ?? $username;
    } catch (PDOException $e) {
        error_log("Gagal mengambil nama perusahaan: " . $e->getMessage());
    }
}

if (!isset($pdo) || is_null($pdo)) {
    die("Variabel \$pdo tidak didefinisikan. Periksa file koneksi.php.");
}

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit;
}

$id = intval($_GET['id']);

try {
    $query = "
        SELECT 
            l.*,
            p.nama_perusahaan,
            p.logo_url,
            p.deskripsi_perusahaan
        FROM posting_job l
        JOIN perusahaan p ON l.ID_Perusahaan = p.ID_Perusahaan
        WHERE l.ID_job = :id
    ";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id' => $id]);
    $loker = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$loker) {
        echo "Data lowongan tidak ditemukan.";
        exit;
    }

    $isLoggedIn = isset($_SESSION['ID_user']) ? true : false;
    if (!$isLoggedIn) {
        error_log('Sesi ID_user tidak ditemukan: ' . json_encode($_SESSION));
    }

    $alreadyBookmarked = false;
    if ($isLoggedIn) {
        $ID_user = $_SESSION['ID_user'];
        $query = "SELECT * FROM simpan_loker WHERE ID_user = :id_user AND ID_job = :id_job";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['id_user' => $ID_user, 'id_job' => $id]);
        if ($stmt->rowCount() > 0) {
            $alreadyBookmarked = true;
        }
    }

    $alreadyApplied = false;
    if ($isLoggedIn) {
        $ID_user = $_SESSION['ID_user'];
        $query = "SELECT * FROM apply_job WHERE ID_user = :id_user AND ID_job = :id_job";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['id_user' => $ID_user, 'id_job' => $id]);
        if ($stmt->rowCount() > 0) {
            $alreadyApplied = true;
        }
    }

} catch (PDOException $e) {
    echo "Terjadi kesalahan: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lowongan Kerja - CareerBridge</title>
    <link rel="icon" type="image/x-icon" href="../logo%20careerbridge.png" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="../assets/bootstrap.min.css" rel="stylesheet" />
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
                        <a class="nav-link active" aria-current="page" href="/careerbridge/pelamar/cari-loker.php" style="font-family: 'Inter', sans-serif;">Cari Lowongan Kerja</a>
                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/careerbridge/perusahaan/pasang-loker.php" style="font-family: 'Inter', sans-serif;">Pasang Lowongan</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/careerbridge/artikel.html" style="font-family: 'Inter', sans-serif;">Tips Loker</a>
                    </li>
                </ul>
              
                <form class="d-flex align-items-center mx-1">
                    <div class="dropdown">
                        <?php if ($role === 'pelamar'): ?>
                            <button
                                class="btn dropdown-toggle d-flex align-items-center"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                                style="background-color: #e7f1a8; color: black; font-size: 1rem;">
                                <i class="bi bi-person-circle me-2" style="font-size: 1.2rem;"></i> 
                                <?= htmlspecialchars($username ?: 'Pelamar') ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="/careerbridge/pelamar/dashboard-pelamar.php">Dashboard Pelamar</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/careerbridge/pelamar/logout-pelamar.php">Logout</a></li>
                            </ul>

                        <?php elseif ($role === 'perusahaan'): ?>
                            <button
                                class="btn dropdown-toggle d-flex align-items-center"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                                style="background-color: #e7f1a8; color: black; font-size: 1rem;">
                                <i class="bi bi-building me-2" style="font-size: 1.2rem;"></i> 
                                <?= htmlspecialchars($username ?: 'Perusahaan') ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="/careerbridge/perusahaan/dashboard-perusahaan.php">Dashboard Perusahaan</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/careerbridge/perusahaan/logout-perusahaan.php">Logout</a></li>
                            </ul>

                        <?php else: ?>
                            <button
                                class="btn dropdown-toggle"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                                style="background-color: #e7f1a8; color: black; font-size: 1rem;">
                                Akun
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="/careerbridge/pelamar/masukpekerja.php">Masuk sebagai Pencari Kerja</a></li>
                                <li><a class="dropdown-item" href="/careerbridge/perusahaan/masukperusahaan.php">Masuk sebagai Perusahaan</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/careerbridge/pelamar/daftarpekerja.php">Daftar Pencari Kerja</a></li>
                                <li><a class="dropdown-item" href="/careerbridge/perusahaan/daftarperusahaan.php">Daftar Perusahaan</a></li>
                            </ul>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <hr class="my-0" style="border-top: 2px solid black" />

    <main class="container my-5">
        <div class="row gy-4">
            <section class="col-lg-8">
                <article class="bg-white p-4 rounded-4 shadow-sm border">
                    <header class="d-flex flex-wrap justify-content-between align-items-start mb-3">
                        <div>
                            <h1 class="h4 fw-bold mb-1"><?= htmlspecialchars($loker['posisi']) ?></h1>
                            <p class="fw-semibold mb-0" style="color:#364C84"><?= htmlspecialchars($loker['nama_perusahaan']) ?></p>
                        </div>
                        <div class="d-flex gap-2 mt-2">
                            <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content rounded-4 p-3">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title fw-bold" id="loginModalLabel">Tertarik dengan lowongan ini?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Kamu harus login dulu agar bisa menyimpan atau melamar lowongan pekerjaan yang kamu idamkan.</p>
                                            <div class="d-flex gap-3">
                                                <button type="button" class="btn btn-secondary flex-fill" data-bs-dismiss="modal">Kembali</button>
                                                <a href="../pelamar/masukpekerja.php?redirect=<?= urlencode($_SERVER['REQUEST_URI']); ?>" class="btn btn-primary flex-fill" style="background-color: #364C84;">Login</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button
                                type="button"
                                class="btn btn-sm <?= $alreadyBookmarked ? 'btn-secondary' : 'btn-outline-secondary' ?>"
                                aria-pressed="<?= $alreadyBookmarked ? 'true' : 'false' ?>"
                                aria-label="<?= $alreadyBookmarked ? 'Lowongan sudah di-bookmark' : 'Bookmark lowongan' ?>"
                                onclick="cekLogin('bookmark')">
                                <i class="bi bi-bookmark<?= $alreadyBookmarked ? '-fill' : '' ?>"></i>
                            </button>

                            <?php
                                $role = strtolower($_SESSION['role'] ?? '');
                            ?>

                            <?php if ($role === 'pelamar'): ?>
                                <button type="button"
                                    class="btn btn-sm text-white <?= $alreadyApplied ? 'btn-secondary disabled' : '' ?>"
                                    style="background-color: #364C84" <?= $alreadyApplied ? 'aria-disabled="true"' : '' ?>
                                    onclick="cekLogin('apply')"> <?= $alreadyApplied ? 'Sudah Melamar' : 'Lamar Sekarang' ?>
                                </button>
                            <?php elseif ($role === 'perusahaan'): ?>
                                <button type="button"
                                    class="btn btn-sm btn-secondary disabled"
                                    aria-disabled="true"
                                    title="Hanya pelamar yang dapat melamar pekerjaan"> Hanya untuk Pelamar
                                </button>
                            <?php else: ?>
                                <button
                                    type="button"
                                    class="btn btn-sm text-white"
                                    style="background-color: #364C84"
                                    onclick="cekLogin('apply')"> Lamar Sekarang
                                </button>
                            <?php endif; ?>

                        </div>
                    </header>

                    <section class="row text-muted">
                        <div class="col-md-4 mb-3 d-flex align-items-start">
                            <i class="bi bi-geo-alt fs-4 me-2" style="color:#364C84"></i>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Lokasi</h6>
                                <p class="mb-0"><?= htmlspecialchars($loker['lokasi']) ?></p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 d-flex align-items-start">
                            <i class="bi bi-briefcase fs-4 me-2" style="color:#364C84"></i>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Tipe Pekerjaan</h6>
                                <p class="mb-0"><?= htmlspecialchars($loker['tipe_pekerjaan']) ?></p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 d-flex align-items-start">
                            <i class="bi bi-bar-chart fs-4 me-2" style="color:#364C84"></i>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Level Pekerjaan</h6>
                                <p class="mb-0"><?= htmlspecialchars($loker['level_pekerjaan']) ?></p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 d-flex align-items-start">
                            <i class="bi bi-tags fs-4 me-2" style="color:#364C84"></i>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Fungsi</h6>
                                <p class="mb-0" style="font-family: 'M PLUS Rounded 1c', sans-serif;"><?= htmlspecialchars($loker['posisi']) ?></p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 d-flex align-items-start">
                            <i class="bi bi-mortarboard fs-4 me-2" style="color:#364C84"></i>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Pendidikan</h6>
                                <?php if (!empty($loker['jenjang_pendidikan'])): ?>
                                    <p class="mb-0"><?= htmlspecialchars($loker['jenjang_pendidikan']) ?></p>
                                <?php else: ?>
                                    <p class="mb-0 text-muted">Data tidak tersedia</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 d-flex align-items-start">
                            <i class="bi bi-cash-coin fs-4 me-2" style="color:#364C84"></i>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Gaji</h6>
                                <?php if (!empty($loker['gaji_min']) && !empty($loker['gaji_max'])): ?>
                                    <p class="mb-0">
                                        Rp<?= number_format($loker['gaji_min'], 0, ',', '.') ?> - Rp<?= number_format($loker['gaji_max'], 0, ',', '.') ?>
                                    </p>
                                <?php else: ?>
                                    <p class="mb-0 text-muted">Gaji tidak tersedia</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>

                    <section class="mt-4">
                        <p><?= htmlspecialchars($loker['nama_perusahaan']) ?> sedang membuka lowongan pekerjaan sebagai <strong><?= htmlspecialchars($loker['posisi']) ?></strong>.</p>
                        <h2 class="h5 fw-bold mt-4">Tanggung Jawab Pekerjaan:</h2>
                        <p><?= nl2br(htmlspecialchars($loker['deskripsi_loker'])) ?></p>
                    </section>
                </article>
            </section>

            <aside class="col-lg-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body text-center">
                        <!-- Logo Perusahaan untuk Lowongan Utama -->
                        <img 
    src="../uploads/logos/<?= htmlspecialchars($loker['logo_url'] ?: 'default-logo.png') ?>" 
    alt="Logo <?= htmlspecialchars($loker['nama_perusahaan']) ?>" 
    class="rounded-circle mx-auto mb-3" 
    style="width: 60px; height: 60px; object-fit: cover;">

                        <h3 class="h6 fw-bold"><?= htmlspecialchars($loker['nama_perusahaan']) ?></h3>
                        <p class="text-muted small mb-1"><i class="bi bi-geo-alt"></i> <?= htmlspecialchars($loker['lokasi']) ?></p>
                        <p class="small">
                            <?= htmlspecialchars($loker['nama_perusahaan']) ?> adalah
                            <?= htmlspecialchars($loker['deskripsi_perusahaan'] ?? 'Deskripsi perusahaan tidak tersedia') ?>.
                        </p>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="h6 fw-bold mb-3">Lowongan Serupa</h2>
                        <?php
                        try {
                            // Query untuk lowongan serupa, termasuk logo perusahaan
                            $query = "
                                SELECT
                                    l.ID_job,
                                    p.nama_perusahaan,
                                    p.logo_url,
                                    l.posisi,
                                    l.lokasi,
                                    l.tipe_pekerjaan,
                                    l.jenjang_pendidikan,
                                    l.level_pekerjaan,
                                    l.gaji_min,
                                    l.gaji_max
                                FROM posting_job l
                                JOIN perusahaan p ON l.ID_Perusahaan = p.ID_Perusahaan
                                WHERE l.status_lowongan = 'buka'
                                ORDER BY l.ID_job DESC LIMIT 5
                            ";
                            $stmt = $pdo->prepare($query);
                            $stmt->execute();
                            $lowongan = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($lowongan as $row):
                        ?>
                            <a href="detail-pekerjaan.php?id=<?= $row['ID_job'] ?>" class="text-decoration-none text-dark d-block mb-3">
                                <div class="d-flex gap-3 align-items-center">
                                    <img src="../uploads/logos/<?= htmlspecialchars($row['logo_url'] ?: '../logo%20careerbridge.png') ?>" alt="Logo <?= htmlspecialchars($row['nama_perusahaan']) ?>" class="rounded-circle" style="width: 75px; height: 75px; object-fit: cover;" onerror="this.src='/careerbridge/logo%20careerbridge.png'; console.log('Gagal memuat logo: ../uploads/logos/<?= htmlspecialchars($row['logo_url'] ?: '../logo%20careerbridge.png') ?>');">
                                    <div class="flex-grow-1">
                                        <div class="text-primary small"><?= htmlspecialchars($row['nama_perusahaan']) ?></div>
                                        <div class="fw-bold fs-5" style="font-family: 'M PLUS Rounded 1c', sans-serif;">
                                            <?= htmlspecialchars($row['posisi']) ?>
                                        </div>
                                        <div class="d-flex gap-3 text-muted small mt-1">
                                            <div><i class="bi bi-geo-alt"></i> <?= htmlspecialchars($row['lokasi']) ?></div>
                                            <div><i class="bi bi-cash-coin"></i> Rp<?= number_format($row['gaji_min'], 0, ',', '.') ?> - Rp<?= number_format($row['gaji_max'], 0, ',', '.') ?></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php
                            endforeach;
                        } catch (PDOException $e) {
                            echo "<p class='text-danger'>Terjadi kesalahan: " . htmlspecialchars($e->getMessage()) . "</p>";
                        }
                        ?>
                    </div>
                </div>
            </aside>
        </div>
    </main>

    <footer class="text-white py-5" style="background-color:#364C84">
        <div class="container">
            <div class="row gy-4">
                <section class="col-md-5">
                    <img src="../logo%20careerbridge.png" alt="CareerBridge" height="100" class="mb-3" />
                    <p>
                        CareerBridge adalah platform yang membantu pencari kerja menemukan pekerjaan yang tepat dan memudahkan perusahaan dalam merekrut karyawan. Dengan sistem yang mudah digunakan, CareerBridge membuat proses mencari kerja dan perekrutan menjadi lebih cepat dan efisien.
                    </p>
                </section>
                <section class="col-md-2">
                    <h3 class="h6 fw-bold">Tentang Kami</h3>
                    <nav class="nav flex-column fs-6">
                        <a href="../pusatbantuan.html" class="nav-link p-0 text-white">Pusat Bantuan</a>
                        <a href="../kebijakanprivasi.html" class="nav-link p-0 text-white">Kebijakan Privasi</a>
                        <a href="../snk.html" class="nav-link p-0 text-white">Kondisi dan Ketentuan</a>
                    </nav>
                </section>
                <section class="col-md-2">
                    <h3 class="h6 fw-bold">Pencari Kerja</h3>
                    <nav class="nav flex-column fs-6">
                        <a href="../pelamar/daftarpekerja.php" class="nav-link p-0 text-white">Registrasi Pencari Kerja</a>
                        <a href="../pelamar/cari-loker.php" class="nav-link p-0 text-white">Cari Lowongan Kerja</a>
                        <a href="../artikel.html" class="nav-link p-0 text-white">Tips Loker</a>
                    </nav>
                </section>
                <section class="col-md-3">
                    <h3 class="h6 fw-bold">Perusahaan</h3>
                    <nav class="nav flex-column fs-6">
                        <a href="masukperusahaan.php" class="nav-link p-0 text-white">Registrasi Perusahaan</a>
                        <a href="pasang-loker.php" class="nav-link p-0 text-white">Pasang Loker</a>
                    </nav>
                </section>
            </div>
            <div class="text-center mt-4 small">
                <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
        const isLoggedIn = <?= json_encode($isLoggedIn) ?>;
        const jobId = <?= json_encode($id) ?>;

        function cekLogin(action = 'bookmark') {
            if (!isLoggedIn) {
                const modal = new bootstrap.Modal(document.getElementById('loginModal'));
                modal.show();
            } else {
                if (action === 'bookmark') {
                    saveBookmark(jobId);
                } else if (action === 'apply') {
                    applyJob(jobId);
                }
            }
        }

        function saveBookmark(jobId) {
            fetch('../pelamar/simpan_bookmark.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `job_id=${jobId}`
            })
            .then(response => {
                if (!response.ok) throw new Error(response.statusText);
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    const btn = document.querySelector('button.btn-sm');
                    if (btn) {
                        btn.classList.remove('btn-outline-secondary');
                        btn.classList.add('btn-secondary');
                        btn.innerHTML = '<i class="bi bi-bookmark-fill"></i>';
                        alert('Lowongan berhasil disimpan!');
                    }
                } else {
                    alert('Gagal menyimpan lowongan: ' . data.message);
                }
            })
            .catch(error => alert('Terjadi kesalahan: ' . error.message));
        }

        function applyJob(jobId) {
    console.log('Mengirim lamaran untuk jobId:', jobId);
    fetch('../pelamar/simpan_lamaran.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `job_id=${jobId}`
    })
    .then(response => {
        console.log('Status HTTP:', response.status);
        console.log('Content-Type:', response.headers.get('Content-Type'));
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.text();
    })
    .then(text => {
        console.log('Respons mentah:', text);
        let data;
        try {
            data = JSON.parse(text);
        } catch (e) {
            console.error('Gagal parsing JSON:', e);
            alert('Terjadi kesalahan: Respons server tidak valid. Cek konsol untuk detail.');
            return;
        }
        console.log('Respons data:', data);
        if (data.success) {
            alert('Lamaran berhasil dikirim!');
            window.location.href = "../pelamar/dashboard-pelamar.php";
        } else {
            alert('Gagal melamar: ' + (data.message || 'Pesan error tidak tersedia'));
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat melamar: ' + error.message);
    });
}
    </script>
</body>
</html>