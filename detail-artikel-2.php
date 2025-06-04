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
      <p>Beranda > Tips Loker > Tren Dunia Kerja 2025: Menavigasi Perubahan di Era Digital</p>
    </div>

    <div class="container py-5">
        <div class="row">
          <div class="col-lg-8 mb-4">
            <h4 class="fw-bold">Tren Dunia Kerja 2025: Menavigasi Perubahan di Era Digital</h4>
            <div class="text-muted mb-3"><i class="bi bi-clock"></i> 1 jam yang lalu</div>
  
            <p>Dunia kerja terus bertransformasi seiring kemajuan teknologi, perubahan budaya, dan dinamika global. Di tahun 2025, beberapa tren baru mendominasi cara kita bekerja, berkolaborasi, dan membangun karier.
                Artikel ini akan membahas tren utama di dunia kerja, dampaknya, dan bagaimana kamu bisa beradaptasi untuk tetap relevan dan sukses.</p><br>
            
            <h5 class="fw-bold">1. Dominasi Kerja Hybrid dan Fleksibel</h5>
            <p>Kerja hybrid—kombinasi bekerja dari kantor dan rumah—menjadi standar di banyak industri. Perusahaan kini fokus pada fleksibilitas untuk meningkatkan kepuasan karyawan dan menarik talenta terbaik.</p>
            <ul>
              <li><strong>Dampak:</strong> Karyawan memiliki kebebasan mengatur jadwal, tetapi harus lebih disiplin dalam manajemen waktu dan komunikasi.</li>
              <li><strong>Cara Beradaptasi:</strong> Kuasai alat kolaborasi digital seperti Zoom, Microsoft Teams, atau Notion. Pastikan kamu memiliki ruang kerja ergonomis di rumah untuk mendukung produktivitas.</li>
            </ul><br>

            <h5 class="fw-bold">2. Otomatisasi dan AI Mengubah Peran Pekerjaan</h5>
            <p>Kecerdasan buatan (AI) dan otomatisasi semakin terintegrasi dalam dunia kerja, dari analisis data hingga otomatisasi tugas administratif.
                Namun, ini juga menciptakan peluang baru di bidang seperti pengembangan AI, etika teknologi, dan manajemen data.</p>
            <ul>
              <li><strong>Dampak:</strong> Pekerjaan rutin seperti input data atau laporan sederhana digantikan AI, sementara keterampilan kreatif dan strategis semakin dihargai.</li>
              <li><strong>Cara Beradaptasi:</strong> Pelajari dasar-dasar AI atau analitik data melalui platform seperti Coursera atau DataCamp. Fokus pada keterampilan “human-centric” seperti pemecahan masalah dan empati, yang sulit digantikan mesin.</li>
            </ul><br>
  
            <h5 class="fw-bold">3. Fokus pada Kesejahteraan Karyawan</h5>
            <p>Perusahaan semakin menyadari pentingnya kesehatan mental dan keseimbangan kerja-hidup. Banyak organisasi menawarkan program seperti konseling gratis, hari libur kesehatan mental, atau fleksibilitas jam kerja.</p>
            <ul>
              <li><strong>Dampak:</strong> Karyawan merasa lebih dihargai, tetapi ada ekspektasi untuk tetap produktif di tengah fleksibilitas ini.</li>
              <li><strong>Cara Beradaptasi:</strong> Manfaatkan program kesejahteraan yang ditawarkan perusahaan, seperti kelas yoga atau webinar manajemen stres. Jangan ragu untuk mengkomunikasikan kebutuhanmu kepada atasan.</li>
            </ul><br>

            <h5 class="fw-bold">4. Kebangkitan Gig Economy dan Freelancing</h5>
            <p>Gig economy terus berkembang, dengan lebih banyak orang memilih pekerjaan lepas atau proyek jangka pendek. Platform seperti Upwork, Fiverr, dan LinkedIn memudahkan pekerja untuk menemukan peluang global.</p>
            <ul>
              <li><strong>Dampak:</strong> Fleksibilitas finansial meningkat, tetapi persaingan juga lebih ketat, terutama di pasar global.</li>
              <li><strong>Cara Beradaptasi:</strong> Bangun portofolio online yang kuat di platform seperti Behance atau LinkedIn. Jaringan (networking) secara aktif dan pelajari cara menetapkan tarif kompetitif untuk jasamu.</li>
            </ul><br>
  
            <h5 class="fw-bold">5. Budaya Inklusif dan Keberagaman</h5>
            <p>Keberagaman, kesetaraan, dan inklusi (DEI) menjadi prioritas utama perusahaan. Banyak organisasi berinvestasi dalam pelatihan DEI dan menciptakan lingkungan kerja yang mendukung berbagai latar belakang.</p>
            <ul>
              <li><strong>Dampak:</strong> Tim yang beragam meningkatkan inovasi, tetapi membutuhkan kemampuan komunikasi lintas budaya yang lebih baik.</li>
              <li><strong>Cara Beradaptasi:</strong> Tingkatkan keterampilan komunikasi lintas budaya dan ikuti pelatihan DEI jika tersedia. Hormati perbedaan dan pelajari cara berkolaborasi dengan tim yang beragam.</li>
            </ul><br>

            <h5 class="fw-bold">Penutup</h5>
            <p>Tren dunia kerja di 2025 menawarkan peluang sekaligus tantangan. Dengan memahami perubahan seperti kerja hybrid, otomatisasi, dan fokus pada kesejahteraan, kamu bisa mempersiapkan diri untuk tetap relevan. Kuncinya adalah fleksibilitas, pembelajaran berkelanjutan, dan kemampuan untuk beradaptasi dengan cepat.
                Apa pun peranmu, dunia kerja yang dinamis ini adalah kesempatan untuk membangun karier yang lebih bermakna.</p>
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