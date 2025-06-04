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
      <p>Beranda > Tips Loker > HRD Jangan Suka Burnout, Ketahui 4 Penyebabnya!</p>
    </div>

    <div class="container py-5">
        <div class="row">
          <div class="col-lg-8 mb-4">
            <h4 class="fw-bold">HRD Jangan Suka Burnout, Ketahui 4 Penyebabnya!</h4>
            <div class="text-muted mb-3"><i class="bi bi-clock"></i> 3 hari yang lalu</div>
  
            <p>Peran Human Resource Development (HRD) di Indonesia, terutama di sektor non-digital seperti kuliner, ritel, pendidikan, atau kerajinan, sering kali penuh tekanan. Dari mengelola konflik karyawan hingga memastikan kesejahteraan tim, HRD menjadi tulang punggung perusahaan dalam menciptakan lingkungan kerja yang harmonis. Namun, beban kerja yang berat dan ekspektasi tinggi membuat banyak profesional HRD rentan mengalami burnout. Artikel ini mengupas empat penyebab utama burnout di kalangan HRD dan cara mengatasinya, dengan fokus pada sektor non-digital dan konteks lokal Indonesia.</p><br>
            
            <h5 class="fw-bold">1. Beban Kerja yang Berlebihan</h5>
            <p>HRD sering kali menangani banyak tugas sekaligus: rekrutmen, pelatihan, mediasi konflik, hingga administrasi seperti penggajian. Di sebuah koperasi kerajinan di Bali, misalnya, seorang staf HRD bernama Wayan harus merangkap sebagai perekrut, pelatih tenun untuk karyawan baru, dan penyelesai sengketa antar pekerja, semua dalam waktu yang terbatas. “Kadang saya sampai lupa makan karena saking sibuknya,” katanya. Beban kerja yang berlebihan ini, terutama di UMKM dengan tim HRD kecil, membuat staf merasa kewalahan.</p>
            <p><strong>Cara Mengatasi:</strong> Prioritaskan tugas menggunakan metode sederhana seperti daftar “penting dan mendesak”. Delegasikan tugas administratif, seperti mencatat absensi, ke asisten atau alat sederhana seperti buku catatan terstruktur. Luangkan waktu 5-10 menit setiap hari untuk istirahat singkat agar tetap fokus.</p>
            <br>

            <h5 class="fw-bold">2. Tekanan Emosional dari Konflik Karyawan</h5>
            <p>HRD sering menjadi penutup lubang ketika ada konflik di tempat kerja, seperti perselisihan antar karyawan atau keluhan pelanggan. Di sebuah rumah makan di Surabaya, HRD bernama Sari sering menghadapi ketegangan antara koki dan pelayan karena perbedaan jadwal. “Saya harus dengar dua sisi, tetap netral, tapi kadang ikut stres,” ujarnya. Menangani emosi orang lain setiap hari dapat menguras energi mental, memicu <i>burnout</i>.</p>
            <p><strong>Cara Mengatasi:</strong> Latih keterampilan mediasi dengan pendekatan empati, seperti mendengarkan aktif tanpa menghakimi. Sisihkan waktu untuk refleksi pribadi, seperti menulis jurnal atau berbincang dengan rekan HRD lain di luar perusahaan untuk berbagi pengalaman. Jika memungkinkan, ikuti pelatihan manajemen stres yang disediakan komunitas lokal atau asosiasi HR.</p>
            <br>
  
            <h5 class="fw-bold">3. Kurangnya Dukungan dari Manajemen</h5>
            <p>Di banyak perusahaan kecil, seperti toko ritel atau bimbingan belajar, HRD sering bekerja tanpa arahan jelas dari manajemen atau anggaran yang memutz. Di sebuah sekolah swasta di Bandung, HRD bernama Rina kesulitan mengadakan pelatihan karyawan karena anggaran terbatas dan pemilik sekolah tidak memprioritaskan pengembangan tim. “Saya merasa sendirian, padahal ingin bikin tim lebih solid,” katanya. Kurangnya dukungan ini membuat HRD merasa tidak dihargai, mempercepat <i>burnout</i>.</p>
            <p><strong>Cara Mengatasi:</strong> Bangun komunikasi terbuka dengan manajemen, misalnya dengan mengusulkan rencana sederhana yang menunjukkan manfaat investasi pada karyawan, seperti pelatihan murah di komunitas lokal. Cari dukungan dari jaringan HRD, seperti grup diskusi di komunitas lokal atau asosiasi seperti Forum HRD Indonesia, untuk mendapatkan ide dan motivasi.</p>
            <br>

            <h5 class="fw-bold">4. Keseimbangan Kerja-Hidup yang Buruk</h5>
            <p>HRD sering kali bekerja di luar jam kantor, terutama saat menangani urusan mendesak seperti PHK atau keluhan karyawan. Di sebuah pasar tradisional di Jakarta, seorang staf HRD bernama Budi sering dipanggil malam hari untuk menyelesaikan masalah jadwal pedagang. “Kadang saya nggak punya waktu untuk keluarga,” keluhnya. Ketidakseimbangan ini membuat HRD kehilangan energi dan semangat.</p>
            <p><strong>Cara Mengatasi:</strong> Tetapkan batasan jelas, seperti tidak menjawab telepon kerja setelah jam tertentu kecuali darurat. Luangkan waktu untuk aktivitas yang menyegarkan, seperti berkebun atau memasak bersama keluarga, yang populer di kalangan pekerja Indonesia. Jika memungkinkan, ajukan usulan jam kerja fleksibel kepada manajemen untuk mendukung kesejahteraan tim HRD.</p>
            <br>

            <h5 class="fw-bold">Penutup</h5>
            <p>Peran HRD di sektor non-digital seperti kuliner, ritel, atau kerajinan memang penuh tantangan, tetapi burnout bukanlah akhir dari perjalanan. Dengan memahami penyebabnya—beban kerja berlebihan, tekanan emosional, kurangnya dukungan, dan keseimbangan kerja-hidup yang buruk—HRD bisa mengambil langkah kecil untuk melindungi kesehatan mental dan fisik mereka. Mulailah dengan mengatur prioritas, mencari dukungan komunitas, dan menjaga batasan pribadi. Dengan begitu, HRD tidak hanya bisa bertahan, tetapi juga berkembang sebagai pilar utama yang membangun lingkungan kerja yang harmonis dan produktif.</p>
        </div>
      
        <div class="col-lg-4">
            <div class="border border-black p-3 rounded-3 shadow-sm">
                <h6 class="fw-bold mb-3">Artikel Terkait</h6>
                <div style="width: 80%; height: 1px; background-color: black; margin-left:10%;"></div>

                    <div class="d-flex mb-3 mt-4">
                        <img src="./picture/detail-artikel1.jpg" alt="Anak Magang Berpengalaman?" class="me-2 rounded" style="width: 60px; height: 50px;">
                        <div>
                            <a href="detail-artikel-1.php" class="text-dark text-decoration-none">
                                <p class="mb-1 fw-medium">5 Tips Sukses Menghadapi Dunia Kerja di Era Digital</p>
                                <small class="text-muted">3 menit yang lalu</small>
                            </a>
                        </div>
                    </div>

                    <div class="d-flex mb-3">
                        <img src="./picture/detail-artikel2.jpg" alt="Thumbnail" class="me-2 rounded" style="width: 60px; height: 50px;">
                        <div>
                            <a href="detail-artikel-2.php" class="text-dark text-decoration-none">
                                <p class="mb-1 fw-medium">Tren Dunia Kerja 2025: Menavigasi Perubahan di Era Digital</p>
                                <small class="text-muted">1 jam yang lalu</small>
                            </a>
                        </div>
                    </div>

                    <div class="d-flex mb-3">
                        <img src="./picture/detail-artikel3.jpg" alt="Thumbnail" class="me-2 rounded" style="width: 60px; height: 50px;">
                        <div>
                            <a href="detail-artikel-3.php" class="text-dark text-decoration-none">
                                <p class="mb-1 fw-medium">Menemukan Passion dalam Karier: Panduan untuk Membangun Karier yang Bermakna</p>
                                <small class="text-muted">3 jam yang lalu</small>
                            </a>
                        </div>
                    </div>

                    <div class="d-flex mb-3">
                        <img src="./picture/detail-artikel4.jpg" alt="Thumbnail" class="me-2 rounded" style="width: 60px; height: 50px;">
                        <div>
                            <a href="detail-artikel-4.php" class="text-dark text-decoration-none">
                                <p class="mb-1 fw-medium">Merajut Makna dalam Karier</p>
                                <small class="text-muted">1 menit yang lalu</small>
                            </a>
                        </div>
                    </div>

                    <div class="d-flex mb-3">
                        <img src="./picture/detail-artikel5.jpg" alt="Thumbnail" class="me-2 rounded" style="width: 60px; height: 50px;">
                        <div>
                            <a href="detail-artikel-5.php" class="text-dark text-decoration-none">
                                <p class="mb-1 fw-medium">19 Juta Lowongan Kerja: Harapan atau Ilusi?</p>
                                <small class="text-muted">5 menit yang lalu</small>
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