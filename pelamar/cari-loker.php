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
    $countQuery = "
        SELECT COUNT(*) FROM posting_job l
        JOIN perusahaan p ON l.ID_Perusahaan = p.ID_Perusahaan
        WHERE l.status_lowongan = 1
    ";
    if ($tipe_pekerjaan === 'Full Time') {
        $countQuery .= " AND l.tipe_pekerjaan = 'Full Time'";
    } elseif ($tipe_pekerjaan === 'Part Time') {
        $countQuery .= " AND l.tipe_pekerjaan = 'Part Time'";
    }
    if ($jenjang_pendidikan !== '') {
        $countQuery .= " AND l.jenjang_pendidikan = :jenjang_pendidikan";
    }
    if ($posisi !== '') {
        $countQuery .= " AND l.posisi LIKE :posisi";
    }
    if ($lokasi !== '') {
        $countQuery .= " AND l.lokasi LIKE :lokasi";
    }

    $countStmt = $pdo->prepare($countQuery);
    if ($jenjang_pendidikan !== '') {
        $countStmt->bindValue(':jenjang_pendidikan', $jenjang_pendidikan);
    }
    if ($posisi !== '') {
        $countStmt->bindValue(':posisi', '%' . $posisi . '%');
    }
    if ($lokasi !== '') {
        $countStmt->bindValue(':lokasi', '%' . $lokasi . '%');
    }
    $countStmt->execute();
    $totalData = $countStmt->fetchColumn();
    $totalPages = ceil($totalData / $perPage);

    $dataQuery = "
        SELECT 
            l.ID_job, p.nama_perusahaan, l.posisi, l.lokasi, l.tipe_pekerjaan, 
            l.jenjang_pendidikan, l.level_pekerjaan, l.gaji_min, l.gaji_max
        FROM posting_job l
        JOIN perusahaan p ON l.ID_Perusahaan = p.ID_Perusahaan
        WHERE l.status_lowongan = 1
    ";
    if ($tipe_pekerjaan === 'Full Time') {
        $dataQuery .= " AND l.tipe_pekerjaan = 'Full Time'";
    } elseif ($tipe_pekerjaan === 'Part Time') {
        $dataQuery .= " AND l.tipe_pekerjaan = 'Part Time'";
    }
    if ($jenjang_pendidikan !== '') {
        $dataQuery .= " AND l.jenjang_pendidikan = :jenjang_pendidikan";
    }
    if ($posisi !== '') {
        $dataQuery .= " AND l.posisi LIKE :posisi";
    }
    if ($lokasi !== '') {
        $dataQuery .= " AND l.lokasi LIKE :lokasi";
    }
    $dataQuery .= " ORDER BY l.ID_job DESC LIMIT :offset, :perPage";

    $stmt = $pdo->prepare($dataQuery);

    if ($jenjang_pendidikan !== '') {
        $stmt->bindValue(':jenjang_pendidikan', $jenjang_pendidikan);
    }
    if ($posisi !== '') {
        $stmt->bindValue(':posisi', '%' . $posisi . '%');
    }
    if ($lokasi !== '') {
        $stmt->bindValue(':lokasi', '%' . $lokasi . '%');
    }
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindValue(':perPage', $perPage, PDO::PARAM_INT);

    $stmt->execute();
    $lowongan = $stmt->fetchAll();

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
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
      <a class="navbar-brand text-decoration-none">
        <img src="../logo%20careerbridge.png" alt="CareerBridge" height="40" class="d-inline-block align-top">
      </a>
    
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"  data-bs-target="#navbarTogglerDemo02"aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active border-bottom border-dark" style="font-family: 'Inter', sans-serif;">Cari Lowongan Kerja</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../perusahaan/pasang-loker.php" style="font-family: 'Inter', sans-serif;">Pasang Lowongan</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../artikel.html" style="font-family: 'Inter', sans-serif;">Tips Loker</a>
          </li>
        </ul>
        
        <form class="d-flex align-items-center mx-1">
          <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #e7f1a8; color: black; font-size: 0.90rem">
              Masuk
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="../masukpekerja.php">Masuk sebagai Pencari Kerja</a></li>
              <li><a class="dropdown-item" href="./perusahaan/masukperusahaan.php">Masuk sebagai Perusahaan</a></li>
            </ul>
          </div>
        </form>
      </div>
    </div>
  </nav>
    
  <div class="py-4 px-2" style="background-color: #364C84;">
    <div class="container">
      <form method="GET" action="">
        <div class="p-2 bg-light rounded d-flex flex-wrap gap-2 justify-content-center justify-content-md-between">

          <div class="flex-grow-1 bg-light" style="min-width: 200px;">
            <input type="text" name="posisi" class="form-control w-100" style="border: 1px solid black;" placeholder="Masukkan posisi pekerjaan" value="<?= htmlspecialchars($_GET['posisi'] ?? '') ?>">
          </div>

          <div class="d-flex flex-grow-1 bg-light" style="min-width: 150px;">
            <div class="input-group w-100">
              <span class="input-group-text border-black border-end-0">
                <i class="bi bi-geo-alt"></i>
              </span>
              <input type="text" name="lokasi" class="form-control border-black border-start-0" placeholder="Masukkan lokasi" value="<?= htmlspecialchars($_GET['lokasi'] ?? '') ?>" autocomplete="on">
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


  <div class="row row-cols-1 row-cols-md-3 g-4 mx-auto bg-light">
    <?php if (!empty($lowongan)): ?>
      <?php foreach ($lowongan as $row): ?>
      <div class="col">
        <a href="../perusahaan/detail-pekerjaan.php?id=<?= $row['ID_job']; ?>" class="text-decoration-none text-dark">
          <div class="card h-100 border rounded-4 bg-white shadow-sm" style="cursor: pointer">
            <div class="card-body d-flex">
              <img src="..." alt="Logo Perusahaan" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
              <div class="d-flex flex-column justify-content-center">
                <h6 class="card-title mb-1" style="font-family: 'Inter', sans-serif; color: #95B1EE;">
                  <?= htmlspecialchars($row['nama_perusahaan']); ?>
                </h6>
                <p class="fs-6 mb-1" style="font-family: 'M PLUS Rounded 1c', sans-serif;">
                  <?= htmlspecialchars($row['posisi']); ?>
                </p>
                <p class="fs-6 mb-0" style="font-family: 'Inter', sans-serif;">
                  <i class="bi bi-geo-alt"></i> <?= htmlspecialchars($row['lokasi']); ?>
                </p>
              </div>
            </div>
            <div class="d-flex flex-wrap gap-2 ps-4">
              <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">
                <?= htmlspecialchars($row['jenjang_pendidikan']); ?>
              </span>
              <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">
                <?= htmlspecialchars($row['level_pekerjaan']); ?>
              </span>
              <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">
                <?= htmlspecialchars($row['tipe_pekerjaan']); ?>
              </span>
            </div>
            <div class="w-85 my-3 mx-5" style="height: 1px; background-color: #CAC5C5;"></div>
            <div class="d-flex justify-content-between align-items-center px-3">
              <p class="mb-3 fs-6" style="font-family: 'Inter', sans-serif;">
                <i class="bi bi-cash-coin"></i>
                Rp<?= number_format($row['gaji_min'], 0, ',', '.'); ?> - Rp<?= number_format($row['gaji_max'], 0, ',', '.'); ?>
              </p>
            </div>
          </div>
        </a>
      </div>

      <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12 text-center py-5">
          <p class="text-muted">Tidak ada lowongan yang sesuai.</p>
        </div>
      <?php endif; ?>
  </div>

  <nav aria-label="Page navigation" class="mt-4">
    <ul class="pagination justify-content-center">
      <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
        <a class="page-link" href="?<?= http_build_query(array_merge($_GET, ['page' => $page - 1])) ?>" aria-label="Previous">&laquo;</a>
      </li>
        <?php for ($i=1; $i <= $totalPages; $i++): ?>
          <li class="page-item <?= $page == $i ? 'active' : '' ?>">
            <a class="page-link" href="?<?= http_build_query(array_merge($_GET, ['page' => $i])) ?>"><?= $i ?></a>
          </li>
        <?php endfor; ?>
        <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
          <a class="page-link" href="?<?= http_build_query(array_merge($_GET, ['page' => $page + 1])) ?>" aria-label="Next">&raquo;</a>
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