<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Pasang Iklan Lowongan Kerja - CareerBridge</title>
  <link rel="icon" href="../logo%20careerbridge.png" type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    :root {
      --brand-color: #364C84;
    }
    .bg-brand {
      background-color: var(--brand-color) !important;
    }
    .text-brand {
      color: var(--brand-color) !important;
    }
    .btn-brand {
      background-color: var(--brand-color);
      border: none;
      color: white;
      transition: background-color 0.3s ease;
    }
    .btn-brand:hover {
      background-color: #2b3a63;
      color: white;
    }
    .nav-link.active {
      color: var(--brand-color) !important;
      font-weight: 600;
      border-bottom: 3px solid var(--brand-color);
    }
    footer a:hover {
      color: var(--brand-color);
      text-decoration: none;
    }
  </style>
</head>
<body class="bg-light">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-brand navbar-dark shadow-sm sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="../logo%20careerbridge.png" alt="CareerBridge" height="40" />
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-6">
          <li class="nav-item">
            <a class="nav-link" href="./pelamar/cari-loker.php">Cari Lowongan Kerja</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Pasang Lowongan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../artikel.html">Tips Loker</a>
          </li>
        </ul>
        <div class="d-flex align-items-center">
          <div class="dropdown">
            <button
              class="btn btn-light dropdown-toggle text-brand"
              type="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Masuk
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="../pelamar/masukpekerja.php">Masuk sebagai Pencari Kerja</a></li>
              <li><a class="dropdown-item" href="masukperusahaan.php">Masuk sebagai Perusahaan</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero -->
  <section class="bg-brand text-white text-center py-5 mb-5 rounded-bottom">
    <div class="container">
      <h1 class="display-5 fw-bold fst-italic">Pasang Iklan Lowongan Kerja</h1>
      <p class="lead">Temukan Kandidat Terbaik, Rekrut dengan Mudah!</p>
    </div>
  </section>

  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb" class="container mb-4">
    <ol class="breadcrumb bg-transparent p-0 mb-0">
      <li class="breadcrumb-item"><a href="./pelamar/cari-loker.php" class="text-decoration-none text-muted">Beranda</a></li>
      <li class="breadcrumb-item active" aria-current="page">Pasang Lowongan</li>
    </ol>
  </nav>

  <!-- Main Content -->
  <main class="container mb-5">
    <div class="row align-items-center gy-4">
      <div class="col-md-6 text-center">
        <img
          src="https://blush.design/api/download?shareUri=vK7buK3J0r3Kgf6N&c=Hair_0%7Ed5d5d5-0.7%7E372310-0.8%7Ed5d5d5_Skin_0%7Ec3986a-0.7%7E673a18-0.8%7Ec3986a&w=800&h=800&fm=png"
          alt="Ilustrasi Rekrutmen"
          class="img-fluid rounded shadow-sm"
          loading="lazy"
        />
      </div>
      <div class="col-md-6">
        <h3 class="fw-semibold mb-3">Ucapkan Selamat Tinggal pada Perekrutan Ribet! <span>🚀</span></h3>
        <p>
          Lelah dengan email penuh lamaran kerja yang bikin server ngelag?  
          Atau kesulitan menyaring kandidat hingga justru yang terpilih bukan yang terbaik?
        </p>
        <p>
          Kini saatnya beralih ke metode perekrutan yang <strong>praktis</strong>, 
          <strong>efisien</strong>, dan <strong>tepat sasaran</strong>.  
          Dengan <strong>CareerBridge</strong>, Anda bisa menemukan kandidat terbaik untuk setiap posisi  
          dengan lebih cepat, lebih mudah, dan tanpa ribet!
        </p>
        <p class="fw-semibold text-white fs-5">🔍 Pasang iklan loker sekarang dan dapatkan talenta terbaik!</p>
        <a href="./masukperusahaan.php" class="btn btn-light btn-lg text-brand fw-semibold">Pasang Loker Sekarang!</a>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-light text-muted pt-5 pb-4 border-top">
    <div class="container">
      <div class="row gy-4">
        <div class="col-md-5">
          <img src="../logo%20careerbridge.png" alt="CareerBridge" height="80" class="mb-3" />
          <p class="small">
            CareerBridge adalah platform yang membantu pencari kerja menemukan pekerjaan yang tepat dan memudahkan perusahaan dalam merekrut karyawan. Dengan sistem yang mudah digunakan, CareerBridge membuat proses mencari kerja dan perekrutan menjadi lebih cepat dan efisien.
          </p>
        </div>
        <div class="col-md-2">
          <h6 class="fw-semibold">Tentang Kami</h6>
          <ul class="list-unstyled small">
            <li><a href="../pusatbantuan.html">Pusat Bantuan</a></li>
            <li><a href="../kebijakanprivasi.html">Kebijakan Privasi</a></li>
            <li><a href="../snk.html">Kondisi dan Ketentuan</a></li>
          </ul>
        </div>
        <div class="col-md-2">
          <h6 class="fw-semibold">Pencari Kerja</h6>
          <ul class="list-unstyled small">
            <li><a href="../pelamar/daftarpekerja.php">Registrasi Pencari Kerja</a></li>
            <li><a href="../pelamar/cari-loker.php">Cari Lowongan Kerja</a></li>
            <li><a href="../artikel.html">Tips Loker</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6 class="fw-semibold">Perusahaan</h6>
          <ul class="list-unstyled small">
            <li><a href="masukperusahaan.php">Registrasi Perusahaan</a></li>
            <li><a href="pasang-loker.php">Pasang Loker</a></li>
          </ul>
        </div>
      </div>
      <hr />
      <p class="text-center small mb-0">&copy; 2025 CareerBridge - Semua Hak Dilindungi</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>