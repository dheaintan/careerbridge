<?php
session_start();
include '../koneksi.php';

$tipe_pekerjaan    = $_GET['tipe_pekerjaan'] ?? '';
$jenjang_pendidikan = $_GET['jenjang_pendidikan'] ?? '';
$posisi            = $_GET['posisi'] ?? '';
$lokasi            = $_GET['lokasi'] ?? '';

$perPage = 9;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $perPage;

try {
    $where = " WHERE l.status_lowongan = 1";
    $params = [];

    if ($tipe_pekerjaan === 'Full Time' || $tipe_pekerjaan === 'Part Time') {
        $where .= " AND l.tipe_pekerjaan = :tipe_pekerjaan";
        $params['tipe_pekerjaan'] = $tipe_pekerjaan;
    }

    if ($jenjang_pendidikan !== '') {
        $where .= " AND l.jenjang_pendidikan = :jenjang_pendidikan";
        $params['jenjang_pendidikan'] = $jenjang_pendidikan;
    }

    if ($posisi !== '') {
        $where .= " AND l.posisi LIKE :posisi";
        $params['posisi'] = '%' . $posisi . '%';
    }

    if ($lokasi !== '') {
        $where .= " AND l.lokasi LIKE :lokasi";
        $params['lokasi'] = '%' . $lokasi . '%';
    }

    $countQuery = "SELECT COUNT(*) FROM posting_job l JOIN perusahaan p ON l.ID_Perusahaan = p.ID_Perusahaan" . $where;
    $countStmt = $pdo->prepare($countQuery);
    $countStmt->execute($params);
    $totalData = $countStmt->fetchColumn();
    $totalPages = ceil($totalData / $perPage);

    $dataQuery = "
        SELECT 
            l.ID_job, 
            p.nama_perusahaan, 
            l.posisi, 
            l.lokasi, 
            l.tipe_pekerjaan, 
            l.jenjang_pendidikan, 
            l.level_pekerjaan, 
            l.gaji_min, 
            l.gaji_max, 
            l.tanggal_posting, 
            p.logo_url
        FROM posting_job l
        JOIN perusahaan p ON l.ID_Perusahaan = p.ID_Perusahaan
        " . $where . "
        ORDER BY l.ID_job DESC
        LIMIT :perPage OFFSET :offset
    ";

    $stmt = $pdo->prepare($dataQuery);

    foreach ($params as $key => $value) {
        $stmt->bindValue(':' . $key, $value);
    }
    $stmt->bindValue(':perPage', (int) $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);

    $stmt->execute();
    $lowongan = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Error: " . htmlspecialchars($e->getMessage()));
}

$role = strtolower($_SESSION['role'] ?? '');
$username = $_SESSION['username'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cari Lowongan Kerja</title>
        <link rel="icon" type="image/x-icon" href="../logo%20careerbridge.png">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="../assets/bootstrap.min.css" rel="stylesheet">
    </head>

    <body class="bg-light">
        <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../logo%20careerbridge.png" alt="CareerBridge" height="40" />
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="font-family: 'Inter', sans-serif;">
                    <li class="nav-item">
                        <a class="nav-link active border-bottom border-dark" aria-current="page" href="#">Cari Lowongan Kerja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../perusahaan/pasang-loker.php">Pasang Lowongan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../artikel.html">Tips Loker</a>
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
                                style="background-color: #e7f1a8; color: black; font-size: 0.90rem;">
                                <i class="bi bi-person-circle me-2" style="font-size: 1.2rem;"></i> 
                                <?= htmlspecialchars($username ?: 'Profil Pelamar') ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="../pelamar/dashboard-pelamar.php">Dashboard Pelamar</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../pelamar/logout-pelamar.php">Logout</a></li>
                            </ul>

                            <?php elseif ($role === 'perusahaan'): ?>
                            <button
                                class="btn dropdown-toggle d-flex align-items-center"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                                style="background-color: #e7f1a8; color: black; font-size: 0.90rem;">
                                <i class="bi bi-building me-2" style="font-size: 1.2rem;"></i> 
                                <?= htmlspecialchars($username ?: 'Profil Perusahaan') ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="../perusahaan/dashboard-perusahaan.php">Dashboard Perusahaan</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../perusahaan/logout-perusahaan.php">Logout</a></li>
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
    
    <div class="py-4 px-2" style="background-color: #364C84;">
        <div class="container">
            <form method="GET" action="">
                <div class="p-2 bg-light rounded d-flex flex-wrap gap-2 justify-content-center justify-content-md-between">
                  <div class="flex-grow-1" style="min-width: 200px;">
                    <input type="text" name="posisi" class="form-control w-100 bg-light" style="border: 1px solid black;" placeholder="Masukkan posisi pekerjaan" value="<?= htmlspecialchars($_GET['posisi'] ?? '') ?>">
                  </div>

                  <div class="d-flex flex-grow-1 bg-light" style="min-width: 150px;">
                      <div class="input-group w-100">
                          <span class="input-group-text border-black border-end-0">
                              <i class="bi bi-geo-alt"></i>
                          </span>
                          <input type="text" name="lokasi" class="form-control border-black border-start-0 bg-light" placeholder="Masukkan lokasi" value="<?= htmlspecialchars($_GET['lokasi'] ?? '') ?>" autocomplete="on">
                      </div>
                  </div>

                    <div>
                        <button type="submit" class="btn rounded px-3" style="background-color: #95B1EE;">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container mt-3 bg-light">
        <small>Beranda > Cari Lowongan Kerja</small>
    </div>

    <div class="container py-4 bg-light">
        <div class="row align-items-center justify-content-between">
            <div class="col-md-auto mb-2 mb-md-0">
                <h4 class="fw-bold">Cari Lowongan Kerja</h4>
            </div>

            <div class="col-md d-flex justify-content-md-end">
                <form method="GET" action="" class="d-flex gap-2 align-items-center">
                    <select name="tipe_pekerjaan" class="form-select w-auto bg-light" style="border: 1px solid black;" onchange="this.form.submit();">
                        <option value="" <?= empty($_GET['tipe_pekerjaan']) ? 'selected' : '' ?>>Semua Jenis Loker</option>
                        <option value="Full Time" <?= (isset($_GET['tipe_pekerjaan']) && $_GET['tipe_pekerjaan'] == 'Full Time') ? 'selected' : '' ?>>Full Time</option>
                        <option value="Part Time" <?= (isset($_GET['tipe_pekerjaan']) && $_GET['tipe_pekerjaan'] == 'Part Time') ? 'selected' : '' ?>>Part Time</option>
                    </select>

                    <select name="jenjang_pendidikan" class="form-select w-auto" style="border: 1px solid black;" onchange="this.form.submit();">
                        <option value="" <?= empty($_GET['jenjang_pendidikan']) ? 'selected' : '' ?>>Semua Pendidikan</option>
                        <option value="SMA/SMK" <?= (isset($_GET['jenjang_pendidikan']) && $_GET['jenjang_pendidikan'] == 'SMA/SMK') ? 'selected' : '' ?>>SMA/SMK</option>
                        <option value="D3" <?= (isset($_GET['jenjang_pendidikan']) && $_GET['jenjang_pendidikan'] == 'D3') ? 'selected' : '' ?>>D3</option>
                        <option value="S1" <?= (isset($_GET['jenjang_pendidikan']) && $_GET['jenjang_pendidikan'] == 'S1') ? 'selected' : '' ?>>S1</option>
                        <option value="S2" <?= (isset($_GET['jenjang_pendidikan']) && $_GET['jenjang_pendidikan'] == 'S2') ? 'selected' : '' ?>>S2</option>
                        <option value="S3" <?= (isset($_GET['jenjang_pendidikan']) && $_GET['jenjang_pendidikan'] == 'S3') ? 'selected' : '' ?>>S3</option>
                    </select>
                </form>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row g-4">
            <?php if (!empty($lowongan)): ?>
                <?php foreach ($lowongan as $row): ?>
                    <?php
                    $id_job = htmlspecialchars($row['ID_job']);
                    $posisi = htmlspecialchars($row['posisi']);
                    $nama_perusahaan = htmlspecialchars($row['nama_perusahaan']);
                    $lokasi = htmlspecialchars($row['lokasi']);
                    $tipe_pekerjaan = htmlspecialchars($row['tipe_pekerjaan']);
                    $jenjang_pendidikan = htmlspecialchars($row['jenjang_pendidikan'] ?? 'Tidak tersedia');
                    $level_pekerjaan = htmlspecialchars($row['level_pekerjaan']);
                    $gaji_min = number_format($row['gaji_min'], 0, ',', '.');
                    $gaji_max = number_format($row['gaji_max'], 0, ',', '.');
                    $tanggal_posting = date("d F Y", strtotime($row['tanggal_posting']));
                    $logo_url = !empty($row['logo_url']) ? "../uploads/logos/" . htmlspecialchars($row['logo_url']) : "../logo%20careerbridge.png";
                    ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3" style="font-family: 'Inter', sans-serif;">
                                    <img src="<?php echo $logo_url; ?>" alt="Logo <?php echo $nama_perusahaan; ?>" style="width: 50px; height: 50px; object-fit: contain; margin-right: 10px;">
                                    <div>
                                        <h5 class="card-title mb-0"><?php echo $posisi; ?></h5>
                                        <p class="card-text small" style="font-family: 'Inter', sans-serif;">
                                            <span style="color: #95B1EE"><?php echo $nama_perusahaan; ?></span> • <?php echo $lokasi; ?>
                                        </p>
                                    </div>
                                </div>
                                <p class="text-muted small mb-1">
                                    <i class="bi bi-briefcase"></i> <?php echo $tipe_pekerjaan; ?>
                                </p>
                                <p class="text-muted small mb-1">
                                    <i class="bi bi-bar-chart"></i> <?php echo $level_pekerjaan; ?>
                                </p>
                                <p class="text-muted small mb-1">
                                    <i class="bi bi-mortarboard"></i> <?php echo $jenjang_pendidikan; ?>
                                </p>
                                <p class="text-muted small mb-1">
                                    <i class="bi bi-cash-coin"></i> Rp<?php echo $gaji_min; ?> - Rp<?php echo $gaji_max; ?>
                                </p>
                                <p class="text-muted small mb-1">Diposting pada: <?php echo $tanggal_posting; ?></p>
                                <a href="../perusahaan/detail-pekerjaan.php?id=<?php echo $id_job; ?>" class="btn btn-primary btn-sm">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Tidak ada lowongan yang sesuai.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <nav aria-label="Page navigation" class="mt-4">
        <ul class="pagination justify-content-center">
            <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="?<?= http_build_query(array_merge($_GET, ['page' => $page - 1])) ?>" aria-label="Previous">«</a>
            </li>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                    <a class="page-link" href="?<?= http_build_query(array_merge($_GET, ['page' => $i])) ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
            <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
                <a class="page-link" href="?<?= http_build_query(array_merge($_GET, ['page' => $page + 1])) ?>" aria-label="Next">»</a>
            </li>
        </ul>
    </nav>

    <footer class="text-white py-5" style="background-color: #364c84">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="d-flex align-items-start mb-3">
                        <img src="../logo%20careerbridge.png" alt="CareerBridge" height="100" class="d-inline-block align-top">
                    </div>
                    <p class="text-white" style="max-width: 500px;">
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
  
            <div class="text-center mt-4 text-white small">
              <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
            </div>
        </div>
    </footer>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>