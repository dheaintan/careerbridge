<?php
session_start();
include '../koneksi.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CareerBridge</title>
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
                <a class="nav-link active" aria-current="page" href="../pelamar/cari-loker.php" style="font-family: 'Inter', sans-serif;">Cari Lowongan Kerja</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="daftarlowongan.php" style="font-family: 'Inter', sans-serif;">Pasang Lowongan</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../artikel.html" style="font-family: 'Inter', sans-serif;">Tips Loker</a>
              </li>
            </ul>
            
            <div class="d-flex align-items-center mx-1">
              <a href="dashboard-perusahaan.php" class="btn" style="color: black; font-size: 0.90rem;">
                <i class="bi bi-person-circle fs-3"></i>
              </a>
              <a href="../landingpage.php" class="btn btn-outline-danger ms-2" style="font-size: 0.9rem;" onclick="return confirm('Yakin ingin logout?');">
                Logout
              </a>
            </div>
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
                  <input type="search" id="search-job" name="q" placeholder="Masukkan kata kunci" 
                    class="form-control" style="max-width: 500px; border: 1px solid black;">
                  <button type="submit" class="btn" 
                    style="background-color: #e7f1a8; color: black; border: none; margin-left: 10px;">
                    <i class="bi bi-search"></i>
                  </button>        
                </div>
          
                <form action="#" method="GET" class="d-flex gap-3">
                  <input type="search" id="search-location" name="location" placeholder="Cari lokasi" 
                    class="form-control" style="max-width: 300px; border: 1px solid black;">  
                  <input type="search" id="search-category" name="category" placeholder="Cari kategori" 
                    class="form-control" style="max-width: 300px; border: 1px solid black;">
                </form>

                <div class="d-flex">
                  <div class="fw-semibold p-2 flex-shrink-0" style="white-space: nowrap; font-size: 12px;">Paling sering dicari:</div>
                  <div class="w-100">
                    <div class="d-flex flex-wrap">
                      <div class="text-decoration-underline d-inline-flex p-2" style="font-size: 12px;">Akuntan</div>
                      <div class="text-decoration-underline d-inline-flex p-2" style="font-size: 12px;">Desain Grafis</div>
                      <div class="text-decoration-underline d-inline-flex p-2" style="font-size: 12px;">Marketing</div>
                      <div class="text-decoration-underline d-inline-flex p-2" style="font-size: 12px;">Web Developer</div>
                      <div class="text-decoration-underline d-inline-flex p-2" style="font-size: 12px;">Content Creator</div>
                      <div class="text-decoration-underline d-inline-flex p-2" style="font-size: 12px;">Fullstack Developer</div>
                      <div class="text-decoration-underline d-inline-flex p-2" style="font-size: 12px;">IT Support</div>
                      <div class="text-decoration-underline d-inline-flex p-2" style="font-size: 12px;">Translator</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 text-center pe-5" style="background-color: #364c84;">
          <img src="https://blush.design/api/download?shareUri=_waKYDlYMlll1jCS&c=Hair_0%7Eee4e2f-0.1%7E110b05-0.2%7E110b05_Skin_0%7Effc280-0.1%7Ea15122-0.2%7Edb8c5c&w=800&h=800&fm=png" 
            class="img-fluid" style="width: 450px; height: auto;">
        </div>
      </div>
    </div>

    <div class="col text-white text-start p-4 bg-light">
      <h1 style="font-family: 'Lilita One', cursive; font-size: 30px; color: #364c84;">Lowongan Kerja Terpopuler</h1>
    </div>

    <!-- Card -->
    <div class="row row-cols-1 row-cols-md-3 g-4 mx-auto bg-light">
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
              l.gaji_max
          FROM posting_job l
          JOIN perusahaan p ON l.ID_Perusahaan = p.ID_Perusahaan
          WHERE l.status_lowongan = 1
          ORDER BY l.ID_job DESC LIMIT 9
        ";


        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $lowongan = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($lowongan as $row) {
      ?>
      <div class="col">
        <a href="detail-pekerjaan.php?id=<?= $row['ID_job']; ?>" class="text-decoration-none text-dark">
          <div class="card h-100 border rounded-4 bg-white shadow-sm" style="cursor: pointer">
            <button class="btn rounded-circle btn-outline-dark position-absolute top-0 end-0 m-2 z-3" onclick="event.stopPropagation(); toggleSave(this);">
              <i class="bi bi-heart"></i>
            </button>
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

    <?php
        }

    } catch (PDOException $e) {
        echo "Terjadi kesalahan: " . $e->getMessage();
    }
    ?>
    </div>

    <div class="text-center mt-4 bg-light">
      <button type="button" class="btn border-0 border-bottom border-secondary text-dark fw-medium bg-transparent">
        Lihat Lebih Banyak
      </button>
    </div>
    
    <footer class="text-dark py-5 bg-light">
      <div class="container">
        <div class="row">
          <!-- Logo dan Deskripsi -->
          <div class="col-md-5">
            <div class="d-flex align-items-start mb-3">
              <img src="../logo%20careerbridge.png" alt="CareerBridge" height="100" class="d-inline-block align-top">
            </div>
            <p class="text-muted" style="max-width: 500px;">
              CareerBridge adalah platform yang membantu pencari kerja menemukan pekerjaan yang tepat dan memudahkan perusahaan dalam merekrut karyawan. Dengan sistem yang mudah digunakan, CareerBridge membuat proses mencari kerja dan perekrutan menjadi lebih cepat dan efisien.
            </p>
          </div>
    
          <!-- Tentang Kami -->
          <div class="col-md-2">
            <h6 class="fw-bold">Tentang Kami</h6>
            <div class="d-flex flex-column">
              <a href="../pusatbantuan.html" class="text-muted text-decoration-none mb-1">Pusat Bantuan</a>
              <a href="../kebijakanprivasi.html" class="text-muted text-decoration-none mb-1">Kebijakan Privasi</a>
              <a href="../snk.html" class="text-muted text-decoration-none mb-1">Kondisi dan Ketentuan</a>
            </div>
          </div>
    
          <!-- Pencari Kerja -->
          <div class="col-md-2">
            <h6 class="fw-bold">Pencari Kerja</h6>
            <div class="d-flex flex-column">
              <a href="../pelamar/daftarpekerja.php" class="text-muted text-decoration-none mb-1">Registrasi Pencari Kerja</a>
              <a href="../pelamar/cari-loker.php" class="text-muted text-decoration-none mb-1">Cari Lowongan Kerja</a>
              <a href="../artikel.html" class="text-muted text-decoration-none mb-1">Tips Loker</a>
            </div>
          </div>
    
          <!-- Perusahaan -->
          <div class="col-md-3">
            <h6 class="fw-bold">Perusahaan</h6>
            <div class="d-flex flex-column">
              <a href="masukperusahaan.php" class="text-muted text-decoration-none mb-1">Registrasi Perusahaan</a>
              <a href="pasang-loker.php" class="text-muted text-decoration-none mb-1">Pasang Loker</a>
            </div>
          </div>
        </div>
    
        <!-- Copyright -->
        <div class="text-center mt-4 text-muted small">
          <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>