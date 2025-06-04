<?php
session_start();
include 'koneksi.php';

$role = strtolower($_SESSION['role'] ?? '');
$username = $_SESSION['username'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tips Loker</title>
  <link rel="icon" type="image/x-icon" href="logo careerbridge.png">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@700&display=swap" rel="stylesheet">
  <link href="./assets/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <nav class="navbar navbar-expand-lg bg-light">

    <div class="container-fluid">
      <a class="navbar-brand text-decoration-none">
        <img src="logo careerbridge.png" alt="CareerBridge" height="40" class="d-inline-block align-top">
      </a>
    
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"  data-bs-target="#navbarTogglerDemo02"aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
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
            <a class="nav-link active border-bottom border-dark" style="font-family: 'Inter', sans-serif;">Tips Loker</a>
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
                <li><a class="dropdown-item" href="./pelamar/dashboard-pelamar.php">Dashboard Pelamar</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="./pelamar/logout-pelamar.php">Logout</a></li>
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
                <li><a class="dropdown-item" href="./perusahaan/dashboard-perusahaan.php">Dashboard Perusahaan</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="./perusahaan/logout-perusahaan.php">Logout</a></li>
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
                    <li><a class="dropdown-item" href="./pelamar/masukpekerja.php">Masuk sebagai Pencari Kerja</a></li>
                    <li><a class="dropdown-item" href="./perusahaan/masukperusahaan.php">Masuk sebagai Perusahaan</a></li>
                  </ul>
            <?php endif; ?>
          </div>
        </form>
      </div>
    </div>
  </nav>

  <div class="position-relative" style="height: 250px; font-family: 'Inter', sans-serif;">
    <div style="background-image: url('koran.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;">
    </div>
    
    <div class="container text-dark position-relative" style="z-index: 2; padding-top: 80px;">
      <h3 class="fw-bold">Tips Loker</h3>
      <p>Jangan Ketinggalan! Update seputar dunia kerja ada di sini!</p>
    </div>
  </div>

  <div class="container text-dark position-relative" style="z-index: 2; padding-top: 20px; font-size: smaller;">
    <p>Beranda > Tips Loker</p>
  </div>

  <div class="container py-4">
    <div class="row g-3 justify-content-center">
    
      <div class="col-md-4 col-sm-6 col-12 d-flex justify-content-center">
        <a href="detail-artikel-1.php" class="text-decoration-none">
          <div class="card bg-dark text-white border-0 rounded-4 overflow-hidden" style="width: 410px; height: 205px;">
            <div class="position-relative h-100 w-100">
              <img src="./picture/detail-artikel1.jpg" class="w-100 h-100 object-fit-cover" alt="Tips Sukses">
              <div class="card-img-overlay d-flex flex-column justify-content-end p-3" style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                <h5 class="card-title fw-bold mb-1">5 Tips Sukses Menghadapi Dunia Kerja di Era Digital</h5>
                <small class="text-white-50">3 menit yang lalu</small>
            </div>
            </div>
          </div>
        </a>
      </div>
    
      <div class="col-md-4 col-sm-6 col-12 d-flex justify-content-center">
        <a href="detail-artikel-2.php" class="text-decoration-none">
          <div class="card bg-dark text-white border-0 rounded-4 overflow-hidden" style="width: 410px; height: 205px;">
            <div class="position-relative h-100 w-100">
              <img src="./picture/detail-artikel2.jpg" class="w-100 h-100 object-fit-cover" alt="Tren Dunia Kerja">
              <div class="card-img-overlay d-flex flex-column justify-content-end p-3" style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                <h5 class="card-title fw-bold mb-1">Tren Dunia Kerja 2025: Siap Menyambut Masa Depan?</h5>
                <small class="text-white-50">1 jam yang lalu</small>
              </div>
            </div>
          </div>
        </a>
      </div>
    
      <div class="col-md-4 col-sm-6 col-12 d-flex justify-content-center">
        <a href="detail-artikel-3.php" class="text-decoration-none">
          <div class="card bg-dark text-white border-0 rounded-4 overflow-hidden" style="width: 410px; height: 205px;">
            <div class="position-relative h-100 w-100">
              <img src="./picture/detail-artikel3.jpg" class="w-100 h-100 object-fit-cover" alt="Menemukan Passion">
              <div class="card-img-overlay d-flex flex-column justify-content-end p-3" style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                <h5 class="card-title fw-bold mb-1">Menemukan Passion: Kunci Karier yang Bermakna</h5>
                <small class="text-white-50">3 jam yang lalu</small>
              </div>
            </div>
          </div>
        </a>
      </div>
    
    </div>
  </div>

  <div class="container py-4">
    <h5 class="fw-bold mb-4">Tips Terbaru</h5>
    
    <a href="detail-artikel-4.php" class="text-decoration-none text-dark">
      <div class="d-flex mb-4 gap-3 align-items-start">
        <img src="./picture/detail-artikel4.jpg" alt="Merajut Makna" class="rounded-4 object-fit-cover" style="width: 300px; height: 150px;">
        <div>
          <small class="text-muted">1 menit yang lalu</small>
          <h6 class="fw-bold mt-1">Merajut Makna dalam Karier</h6>
        </div>
      </div>
    </a>
    
    <a href="detail-artikel-5.php" class="text-decoration-none text-dark">
      <div class="d-flex mb-4 gap-3 align-items-start">
        <img src="./picture/detail-artikel5.jpg" alt="Harapan atau Ilusi?" class="rounded-4 object-fit-cover" style="width: 300px; height: 150px;">
        <div>
          <small class="text-muted">5 menit yang lalu</small>
          <h6 class="fw-bold mt-1">19 Juta Lowongan Kerja: Harapan atau Ilusi?</h6>
        </div>
      </div>
    </a>
    
    <a href="detail-artikel-6.php" class="text-decoration-none text-dark">
      <div class="d-flex mb-4 gap-3 align-items-start">
        <img src="./picture/detail-artikel6.jpg" alt="Ibu Pekerja" class="rounded-4 object-fit-cover" style="width: 300px; height: 150px;">
        <div>
          <small class="text-muted">10 menit yang lalu</small>
          <h6 class="fw-bold mt-1">Ibu Pekerja: Menyeimbangkan Cinta dan Karier</h6>
        </div>
      </div>
    </a>
    
    <a href="detail-artikel-7.php" class="text-decoration-none text-dark">
      <div class="d-flex mb-4 gap-3 align-items-start">
        <img src="./picture/detail-artikel7.jpg" alt="Kesederhanaan Kerja" class="rounded-4 object-fit-cover" style="width: 300px; height: 150px;">
        <div>
          <small class="text-muted">15 menit yang lalu</small>
          <h6 class="fw-bold mt-1">Kebahagiaan dalam Kesederhanaan Kerja</h6>
        </div>
      </div>
    </a>
  </div>
      
  <footer class="text-dark py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="d-flex align-items-start mb-3">
            <img src="logo careerbridge.png" alt="CareerBridge" height="100" class="d-inline-block align-top">
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
            <a href="artikel.html" class="text-muted text-decoration-none mb-1">Tips Loker</a>
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