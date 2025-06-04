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
      <p>Beranda > Tips Loker > PHK adalah Jobdesk Tersulit Buat HRD, Cek Faktanya!</p>
    </div>

    <div class="container py-5">
        <div class="row">
          <div class="col-lg-8 mb-4">
            <h4 class="fw-bold">PHK adalah Jobdesk Tersulit Buat HRD, Cek Faktanya!</h4>
            <div class="text-muted mb-3"><i class="bi bi-clock"></i> 4 hari yang lalu</div>
  
            <p>Pemutusan Hubungan Kerja (PHK) sering dianggap sebagai tugas paling berat bagi profesional Human Resource Development (HRD), terutama di sektor non-digital seperti kuliner, ritel, pendidikan, atau kerajinan di Indonesia. Bukan hanya soal prosedur, tetapi juga beban emosional dan tanggung jawab untuk menjaga hubungan baik antara perusahaan dan karyawan. Artikel ini mengupas fakta mengapa PHK menjadi jobdesk tersulit bagi HRD, tantangan yang dihadapi, dan cara mereka menangani proses ini dengan empati dan profesionalisme, dengan fokus pada konteks lokal Indonesia</p><br>
            
            <h5 class="fw-bold">Fakta 1: PHK Bukan Sekadar Prosedur Administratif</h5>
            <p>PHK bukan hanya soal mengeluarkan surat pemberhentian atau menghitung pesangon. Di Indonesia, HRD harus mematuhi regulasi ketenagakerjaan yang ketat, seperti Undang-Undang Cipta Kerja No. 11/2020, yang mengatur alasan PHK, hak karyawan, dan proses mediasi. Misalnya, di sebuah toko ritel di Surabaya, HRD bernama Budi harus memastikan semua dokumen PHK lengkap sambil menjelaskan hak pesangon kepada karyawan yang terdampak. “Saya harus baca ulang aturan biar tidak salah, tapi tetap saja rasanya berat,” katanya. Proses ini memakan waktu dan energi, terutama di UMKM dengan sumber daya terbatas, di mana HRD sering merangkap peran lain.</p>
            <br>

            <h5 class="fw-bold">Fakta 2: Beban Emosional yang Berat</h5>
            <p>HRD sering menjadi “penutup lubang” saat menyampaikan kabar PHK, yang bisa memicu reaksi emosional dari karyawan, mulai dari kemarahan hingga kesedihan. Di sebuah rumah makan di Jakarta, HRD bernama Sari pernah menghadapi situasi sulit saat harus memberhentikan seorang pelayan yang sudah bekerja selama lima tahun karena penurunan omset. “Dia menangis di depan saya, dan saya ikut terbawa suasana,” ungkapnya. HRD harus tetap profesional sambil menahan emosi pribadi, yang membuat tugas ini sangat menguras mental. Beban ini diperparah oleh budaya Indonesia yang menjunjung kebersamaan, membuat HRD merasa seperti “penutup cerita buruk” dalam komunitas kerja.</p>
            <br>
  
            <h5 class="fw-bold">Fakta 3: Tekanan dari Manajemen dan Karyawan</h5>
            <p>HRD sering terjepit antara kebijakan manajemen dan kepentingan karyawan. Manajemen mungkin menekan untuk mempercepat PHK demi efisiensi, sementara karyawan menuntut kejelasan dan keadilan. Di sebuah bengkel kerajinan kayu di Bali, HRD bernama Wayan menghadapi dilema saat pemilik meminta PHK massal karena pesanan menurun, tetapi karyawan memohon keringanan. “Saya harus jadi penutup di tengah-tengah, menjelaskan ke karyawan tanpa membuat mereka benci perusahaan,” katanya. Tekanan ini membuat HRD rentan stres, terutama jika komunikasi dengan manajemen kurang terbuka.</p>
            <br>

            <h5 class="fw-bold">Fakta 4: Dampak Sosial dan Reputasi Perusahaan</h5>
            <p>Di Indonesia, PHK tidak hanya berdampak pada karyawan, tetapi juga pada komunitas lokal dan reputasi perusahaan. Di sektor non-digital seperti pasar tradisional atau pendidikan, kabar PHK bisa menyebar cepat dan memengaruhi citra perusahaan. Misalnya, sebuah sekolah swasta di Bandung mendapat kritik dari wali murid setelah PHK beberapa guru tanpa komunikasi yang jelas. HRD bernama Rina mengaku harus bekerja ekstra untuk menjelaskan alasan PHK kepada komunitas sekolah. “Kalau salah langkah, orang bisa pikir perusahaan tidak manusiawi,” katanya. HRD harus memastikan proses PHK transparan dan sesuai etika untuk menjaga kepercayaan publik.</p>
            <br>

            <h5 class="fw-bold">Cara HRD Menangani PHK dengan Lebih Baik</h5>
            <p>Meski sulit, ada cara untuk membuat proses PHK lebih manusiawi. Pertama, komunikasikan keputusan dengan empati dan transparansi. Jelaskan alasan PHK dengan jujur, seperti penurunan pendapatan atau perubahan strategi, tanpa menyalahkan karyawan. Kedua, tawarkan dukungan, seperti surat rekomendasi atau informasi tentang peluang kerja lain di komunitas lokal, seperti pasar atau koperasi. Ketiga, libatkan mediasi jika ada konflik, seperti melalui serikat pekerja atau dinas ketenagakerjaan setempat. Terakhir, jaga kesehatan mental HRD sendiri dengan berbagi pengalaman di komunitas HR atau meluangkan waktu untuk relaksasi, seperti berjalan di taman atau ngobrol dengan keluarga.</p>

            <h5 class="fw-bold">Penutup</h5>
            <p>PHK memang jobdesk tersulit bagi HRD, dengan tantangan mulai dari prosedur rumit, beban emosional, tekanan dari berbagai pihak, hingga dampak sosial. Di sektor non-digital seperti kuliner, ritel, atau kerajinan, HRD di Indonesia menghadapi dinamika tambahan karena budaya komunitas yang kuat. Namun, dengan pendekatan yang empatik, komunikasi yang jelas, dan dukungan yang tepat, HRD bisa menjalani tugas ini dengan lebih ringan. Ingat, di balik setiap PHK, ada kesempatan untuk tetap menunjukkan kemanusiaan dan profesionalisme, baik untuk karyawan maupun perusahaan.</p>
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