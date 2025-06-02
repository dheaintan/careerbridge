<?php
session_start();
include 'koneksi.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CareerBridge</title>
    <link rel="icon" type="image/x-icon" href="logo%20careerbridge.png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="./assets/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-decoration-none">
                <img src="logo%20careerbridge.png" alt="CareerBridge" height="40" class="d-inline-block align-top">
            </a>
      
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./pelamar/cari-loker.php" style="font-family: 'Inter', sans-serif;">Cari Lowongan Kerja</a>
                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./perusahaan/pasang-loker.php" style="font-family: 'Inter', sans-serif;">Pasang Lowongan</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="artikel.html" style="font-family: 'Inter', sans-serif;">Tips Loker</a>
                    </li>
                </ul>
              
                <form class="d-flex align-items-center mx-1">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #e7f1a8; color: black; font-size: 0.90rem">
                            Masuk
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="./pelamar/masukpekerja.php">Masuk sebagai Pencari Kerja</a></li>
                            <li><a class="dropdown-item" href="./perusahaan/masukperusahaan.php">Masuk sebagai Perusahaan</a></li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row d-flex align-items-center p-5" style="background-color: #364c84;">
            <div class="col-md-6" style="background-color: #364c84;">
                <div class="row">
                    <div class="col text-white text-start p-4">
                        <h1 style="font-family: 'Lilita One', cursive; font-size: 50px; color: white;">Langkah Pertama<br>Menuju Karir Impian</h1>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <div class="card p-4 bg-light" style="border-radius: 10px; border: 1px solid #ddd; width: 600px; max-width: 100%">
                            <div class="d-flex align-items-center mb-3">
                                <input type="search" id="search-job" name="q" placeholder="Masukkan kata kunci" class="form-control" style="max-width: 500px; border: 1px solid black;">
                                <button type="submit" class="btn" style="background-color: #e7f1a8; color: black; border: none; margin-left: 10px;">
                                    <i class="bi bi-search"></i>
                                </button>        
                            </div>

                            <form action="#" method="GET" class="d-flex gap-3">
                                <input type="search" id="search-location" name="location" placeholder="Cari lokasi" class="form-control" style="max-width: 300px; border: 1px solid black;">  
                                <input type="search" id="search-category" name="category" placeholder="Cari kategori" class="form-control" style="max-width: 300px; border: 1px solid black;">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 text-center pe-5" style="background-color: #364c84;">
                <img src="https://blush.design/api/download?shareUri=_waKYDlYMlll1jCS&c=Hair_0%7Eee4e2f-0.1%7E110b05-0.2%7E110b05_Skin_0%7Effc280-0.1%7Ea15122-0.2%7Edb8c5c&w=800&h=800&fm=png"
                class="img-fluid" style="width: 350px; height: auto;">
            </div>
        </div>
    </div>

    <div class="col text-white p-4 bg-light">
      <h1 class="ms-5" style="font-family: 'Lilita One', cursive; font-size: 30px; color: #364c84;">
        Lowongan Kerja Terpopuler
      </h1>
    </div>

    <!-- Card -->
    <div class="container my-1">
        <div class="row g-4">
            <?php
            try {
                $query = "
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
                    WHERE l.status_lowongan = 1
                    ORDER BY l.ID_job DESC LIMIT 9
                ";

                $stmt = $pdo->prepare($query);
                $stmt->execute();

                $lowongan = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (empty($lowongan)) {
                    echo "<div class='col-12 text-center py-5'><p class='text-muted'>Tidak ada lowongan kerja terpopuler saat ini.</p></div>";
                } else {
                    foreach ($lowongan as $row) {
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
                        $logo_url = !empty($row['logo_url']) ? "./uploads/logos/" . htmlspecialchars($row['logo_url']) : "logo%20careerbridge.png";
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
                                    <a href="./perusahaan/detail-pekerjaan.php?id=<?php echo $id_job; ?>" class="btn btn-primary btn-sm">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            } catch (PDOException $e) {
                echo "<div class='col-12 text-center py-5'><p class='text-danger'>Terjadi kesalahan: " . htmlspecialchars($e->getMessage()) . "</p></div>";
            }
            ?>
        </div>
    </div>

    <div class="text-center mt-4 bg-light">
        <a href="./pelamar/cari-loker.php" class="btn border-0 border-bottom border-secondary text-dark fw-medium bg-transparent">Lihat Lebih Banyak</a>
    </div>
    
    <footer class="text-dark py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="d-flex align-items-start mb-3">
                        <img src="logo%20careerbridge.png" alt="CareerBridge" height="100" class="d-inline-block align-top">
                    </div>
                    <p class="text-muted" style="max-width: 500px;">
                        CareerBridge adalah platform yang membantu pencari kerja menemukan pekerjaan yang tepat dan memudahkan perusahaan dalam merekrut karyawan. Dengan sistem yang mudah digunakan, CareerBridge membuat proses mencari kerja dan perekrutan menjadi lebih cepat dan efisien.
                    </p>
                </div>

                <div class="col-md-2">
                    <h6 class="fw-bold">Tentang Kami</h6>
                    <div class="d-flex flex-column">
                        <a href="pusatbantuan.html" class="text-muted text-decoration-none mb-1">Pusat Bantuan</a>
                        <a href="kebijakanprivasi.html" class="text-muted text-decoration-none mb-1">Kebijakan Privasi</a>
                        <a href="snk.html" class="text-muted text-decoration-none mb-1">Kondisi dan Ketentuan</a>
                    </div>
                </div>

                <div class="col-md-2">
                    <h6 class="fw-bold">Pencari Kerja</h6>
                    <div class="d-flex flex-column">
                        <a href="./pelamar/daftarpekerja.php" class="text-muted text-decoration-none mb-1">Registrasi Pencari Kerja</a>
                        <a href="./pelamar/cari-loker.php" class="text-muted text-decoration-none mb-1">Cari Lowongan Kerja</a>
                        <a href="./artikel.html" class="text-muted text-decoration-none mb-1">Tips Loker</a>
                    </div>
                </div>

                <div class="col-md-3">
                    <h6 class="fw-bold">Perusahaan</h6>
                    <div class="d-flex flex-column">
                        <a href="./perusahaan/masukperusahaan.php" class="text-muted text-decoration-none mb-1">Registrasi Perusahaan</a>
                        <a href="./perusahaan/pasang-loker.php" class="text-muted text-decoration-none mb-1">Pasang Loker</a>
                    </div>
                </div>
            </div>
  
            <div class="text-center mt-4 text-muted small">
              <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>