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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artikel</title>
    <link rel="icon" type="image/x-icon" href="logo careerbridge.png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@700&display=swap" rel="stylesheet">
    <link href="./assets/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg" style="background-color: #364c84;">

      <div class="container-fluid"  style="background-color: #364c84;">
        <a class="navbar-brand text-decoration-none">
          <img src="logo careerbridge.png" alt="CareerBridge" height="40" class="d-inline-block align-top">
        </a>
      
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"  data-bs-target="#navbarTogglerDemo02"aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active text-white" aria-current="page" href="./pelamar/cari-loker.php" style="font-family: 'Inter', sans-serif;">Cari Lowongan Kerja</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link active text-white" aria-current="page" href="./perusahaan/pasang-loker.php" style="font-family: 'Inter', sans-serif;">Pasang Lowongan</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active text-white" aria-current="page" href="artikel.html" style="font-family: 'Inter', sans-serif;">Tips Loker</a>
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

    <div class="container text-dark position-relative" style="z-index: 2; padding-top: 20px; font-size: smaller;">
      <p>Beranda > Tips Loker > Merajut Makna dalam Karier: Menemukan Kepuasan di Dunia Kerja</p>
    </div>

    <div class="container py-5">
        <div class="row">
          <div class="col-lg-8 mb-4">
            <h4 class="fw-bold">Merajut Makna dalam Karier: Menemukan Kepuasan di Dunia Kerja</h4>
            <div class="text-muted mb-3"><i class="bi bi-clock"></i> 1 menit yang lalu</div>
  
            <p>Dunia kerja sering kali terasa seperti perlombaan tanpa akhir: mengejar tenggat waktu, mencapai target, atau memenuhi ekspektasi. Namun, di balik hiruk-pikuk itu, ada keinginan yang lebih dalam—keinginan untuk menemukan makna dan kepuasan dalam apa yang kita lakukan setiap hari. Artikel ini menjelajahi bagaimana kita bisa merajut makna dalam karier, dengan fokus pada perjalanan batin dan langkah praktis, tanpa bergantung pada dunia digital atau teknologi.</p><br>
            
            <h5 class="fw-bold">Merenungi Tujuan Pribadi</h5>
            <p>Bayangkan bangun setiap pagi dengan perasaan bahwa pekerjaanmu bukan hanya rutinitas, tetapi panggilan yang selaras dengan nilai dan hasratmu. Untuk mencapai ini, mulailah dengan merenungi apa yang benar-benar penting bagimu. Apakah kamu merasa hidup saat menciptakan sesuatu dengan tangan, seperti mengukir kayu atau merangkai bunga? Atau mungkin kamu menemukan kebahagiaan saat berbagi pengetahuan, seperti mengajar anak-anak di komunitas lokal? Luangkan waktu untuk menulis atau merenung tentang momen-momen ketika kamu merasa paling terhubung dengan pekerjaanmu. Refleksi ini menjadi kompas untuk menemukan arah karier yang bermakna.</p>
            <br>

            <h5 class="fw-bold">Mengejar Pengalaman Baru</h5>
            <p>Terkadang, makna tersembunyi di luar zona nyaman kita. Cobalah menjelajahi bidang yang mungkin belum pernah kamu pertimbangkan sebelumnya. Misalnya, jika kamu selalu penasaran dengan dunia kuliner, ikuti kelas membuat roti atau kunjungi pasar lokal untuk belajar dari pedagang makanan. Jika kamu tertarik pada pelestarian budaya, sukarela di museum atau acara seni tradisional. Pengalaman baru ini tidak harus langsung mengubah kariermu, tetapi bisa membuka pintu menuju passion yang selama ini terpendam. Seorang pegawai kantor yang mencoba berkebun di akhir pekan, misalnya, mungkin menemukan bahwa merawat tanaman membawa ketenangan yang tidak ditemukan di meja kerjanya.</p>
            <br>
  
            <h5 class="fw-bold">Terhubung dengan Komunitas</h5>
            <p>Makna sering kali lahir dari hubungan dengan orang lain. Bertemu dengan mereka yang sudah menjalani pekerjaan yang kamu minati bisa memberikan inspirasi dan perspektif baru. Hadiri pasar kerajinan lokal, bergabung dengan kelompok pecinta seni, atau ngobrol dengan pengelola perpustakaan komunitas. Orang-orang ini bisa berbagi cerita tentang bagaimana mereka menemukan kepuasan dalam pekerjaan mereka, sekaligus memberikan saran praktis. Misalnya, seorang pengrajin tekstil mungkin menceritakan bagaimana ia belajar tenun dari komunitas lokal, yang akhirnya menjadi sumber pendapatan sekaligus kebanggaan.</p>
            <br>

            <h5 class="fw-bold">Menciptakan Dampak Nyata</h5>
            <p>Pekerjaan yang terasa bermakna sering kali terkait dengan dampak yang kita ciptakan, sekecil apa pun itu. Bayangkan seorang tukang kayu yang membuat furnitur untuk keluarga di lingkungannya, atau seorang guru les yang membantu anak-anak memahami pelajaran dengan lebih baik. Fokus pada bagaimana pekerjaanmu bisa memperbaiki kehidupan orang lain atau lingkungan sekitar. Jika kamu peduli pada isu lingkungan, misalnya, pertimbangkan untuk bekerja di taman kota atau organisasi pelestarian alam. Dampak ini tidak selalu harus besar—kadang, senyum seorang pelanggan atau terima kasih dari seseorang yang kamu bantu sudah cukup untuk membuat hari kerjamu terasa berarti.</p>
            <br>
  
            <h5 class="fw-bold">Menikmati Proses, Bukan Hanya Hasil</h5>
            <p>Kunci untuk merajut makna adalah menikmati perjalanan, bukan hanya mengejar tujuan akhir. Jangan terpaku pada gagasan bahwa kamu harus segera menemukan “karier sempurna”. Mulailah dengan langkah kecil, seperti menghabiskan akhir pekan untuk mengejar hobi yang kamu sukai, apakah itu melukis, berkebun, atau membuat kue. Seiring waktu, aktivitas ini bisa berkembang menjadi sesuatu yang lebih besar, seperti membuka toko kecil atau menjadi pelatih di bidang yang kamu kuasai. Yang terpenting, biarkan dirimu menikmati proses eksplorasi tanpa tekanan.</p>
            <br>

            <h5 class="fw-bold">Penutup</h5>
            <p>Merajut makna dalam karier adalah tentang mendengarkan hati, menjelajahi kemungkinan, dan menciptakan dampak yang selaras dengan nilai-nilaimu. Tidak ada formula instan, tetapi dengan kesabaran dan keterbukaan, kamu bisa menemukan pekerjaan yang tidak hanya menghidupi, tetapi juga menghidupkan. Mulailah dengan satu langkah kecil hari ini—mungkin sebuah percakapan, sebuah hobi, atau sebuah mimpi kecil yang selama ini kamu abaikan.</p>
          </div>
      
            <div class="col-lg-4">
              <div class="border border-black p-3 rounded-3 shadow-sm">
                <h6 class="fw-bold mb-3">Artikel Terkait</h6>
                <div style="width: 80%; height: 1px; background-color: black; margin-left:10%;"></div>
  
                    <div class="d-flex mb-3 mt-4">
                    <img src="./picture/detail-artikel8.jpg" alt="Anak Magang Berpengalaman?" class="me-2 rounded" style="width: 60px; height: 50px;">
                    <div>
                      <a href="detail-artikel-8.php" class="text-dark text-decoration-none">
                        <p class="mb-1 fw-medium">Anak Magang Berpengalaman? Request yang Kekinian!</p>
                        <small class="text-muted">1 hari yang lalu</small>
                      </a>
                    </div>
                  </div>
  
                  <div class="d-flex mb-3">
                    <img src="./picture/detail-artikel9.jpg" alt="Lingkungan Kerja yang Menarik" class="me-2 rounded" style="width: 60px; height: 50px;">
                    <div>
                      <a href="detail-artikel-9.php" class="text-dark text-decoration-none">
                        <p class="mb-1 fw-medium">Bagaimana Perusahaan dapat Menciptakan Lingkungan Kerja yang Menarik?</p>
                        <small class="text-muted">2 hari yang lalu</small>
                      </a>
                    </div>
                  </div>

                  <div class="d-flex mb-3">
                    <img src="./picture/detail-artikel10.jpg" alt="Thumbnail" class="me-2 rounded" style="width: 60px; height: 50px;">
                    <div>
                      <a href="detail-artikel-10.php" class="text-dark text-decoration-none">
                        <p class="mb-1 fw-medium">HRD Jangan Suka Burnout, Ketahui 4 Penyebabnya!</p>
                        <small class="text-muted">3 hari yang lalu</small>
                      </a>
                    </div>
                  </div>
  
                  <div class="d-flex mb-3">
                    <img src="./picture/detail-artikel11.jpg" alt="Thumbnail" class="me-2 rounded" style="width: 60px; height: 50px;">
                    <div>
                      <a href="detail-artikel-11.php" class="text-dark text-decoration-none">
                        <p class="mb-1 fw-medium">PHK adalah Jobdesk Tersulit Buat HRD, Cek Faktanya!</p>
                        <small class="text-muted">4 hari yang lalu</small>
                      </a>
                    </div>
                  </div>

                  <div class="d-flex mb-3">
                    <img src="./picture/detail-artikel12.jpg" alt="Thumbnail" class="me-2 rounded" style="width: 60px; height: 50px;">
                    <div>
                      <a href="detail-artikel-12.php" class="text-dark text-decoration-none">
                        <p class="mb-1 fw-medium">Benarkah HR Sering Jadi Kambing Hitam Manajemen?</p>
                        <small class="text-muted">5 hari yang lalu</small>
                      </a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
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
              <a href="/pelamar/daftarpekerja.php" class="text-muted text-decoration-none mb-1">Registrasi Pencari Kerja</a>
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