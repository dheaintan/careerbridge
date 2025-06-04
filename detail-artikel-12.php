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
      <p>Beranda > Tips Loker > Benarkah HR Sering Jadi Kambing Hitam Manajemen?</p>
    </div>

    <div class="container py-5">
        <div class="row">
          <div class="col-lg-8 mb-4">
            <h4 class="fw-bold">Benarkah HR Sering Jadi Kambing Hitam Manajemen?</h4>
            <div class="text-muted mb-3"><i class="bi bi-clock"></i> 5 hari yang lalu</div>
  
            <p>Di dunia kerja Indonesia, terutama di sektor non-digital seperti kuliner, ritel, pendidikan, atau kerajinan, Human Resource (HR) sering kali berada di posisi yang serba salah. Mereka menjadi jembatan antara manajemen dan karyawan, tetapi tak jarang dianggap sebagai “kambing hitam” ketika kebijakan perusahaan menuai kontroversi. Dari tuduhan sebagai “pelaksana perintah” hingga penutup lubang atas kegagalan komunikasi, peran HR kerap disalahpahami. Artikel ini mengupas fakta di balik persepsi ini, tantangan yang dihadapi HR, dan bagaimana mereka bisa mengelola situasi ini dengan lebih baik, dengan fokus pada konteks lokal Indonesia.</p><br>
            
            <h5 class="fw-bold">Mengapa HR Sering Dianggap Kambing Hitam?</h5>
            <p>Persepsi bahwa HR adalah kambing hitam manajemen bukanlah tanpa alasan. HR sering kali menjadi wajah yang menyampaikan kabar buruk, seperti pemotongan gaji, perubahan jadwal, atau bahkan PHK. Di sebuah rumah makan di Medan, misalnya, HR bernama Rina harus mengumumkan pengurangan jam kerja kepada pelayan karena penurunan omset. “Karyawan marah ke saya, padahal keputusan itu dari pemilik,” katanya. Karena HR adalah pihak yang berkomunikasi langsung dengan karyawan, mereka sering dianggap sebagai otak di balik kebijakan, meskipun mereka hanya menjalankan arahan manajemen. Budaya kerja di Indonesia, yang menekankan harmoni dan hubungan personal, memperkuat persepsi ini, karena karyawan cenderung menyalahkan orang yang mereka temui langsung.</p>
            <br>

            <h5 class="fw-bold">Tantangan HR dalam Posisi Serba Salah</h5>
            <p>HR menghadapi tekanan ganda: memenuhi ekspektasi manajemen sambil menjaga kepercayaan karyawan. Di sebuah toko kerajinan di Yogyakarta, HR bernama Budi sering kesulitan menjelaskan kebijakan baru, seperti pengurangan bonus, karena manajemen tidak memberikan alasan yang jelas. “Saya yang disuruh jelasin, tapi manajer nggak kasih detail, jadi karyawan pikir saya yang bikin aturan,” keluhnya. Selain itu, di sektor non-digital seperti pasar tradisional atau bimbingan belajar, HR sering bekerja dengan sumber daya terbatas, tanpa pelatihan komunikasi yang memadai atau dukungan dari atasan. Hal ini membuat mereka rentan disalahkan ketika kebijakan tidak populer atau komunikasi gagal.</p>
            <br>
  
            <h5 class="fw-bold">Fakta: HR Bukan Pembuat Keputusan Utama</h5>
            <p>Fakta penting yang sering terlewat adalah bahwa HR jarang memiliki kuasa penuh atas keputusan strategis. Di banyak UMKM, seperti warung makan atau koperasi, keputusan besar seperti PHK, kenaikan gaji, atau perubahan operasional biasanya dibuat oleh pemilik atau manajer senior. HR bertugas mengeksekusi dan mengkomunikasikan keputusan tersebut. Misalnya, di sebuah sekolah swasta di Surabaya, HR bernama Ani harus mengelola PHK beberapa guru karena anggaran dipotong, meskipun ia tidak terlibat dalam keputusan tersebut. “Saya cuma bisa jelaskan sesuai fakta, tapi tetap saja ada yang marah,” katanya. Persepsi bahwa HR adalah “kambing hitam” sering muncul dari kurangnya transparansi manajemen, yang membuat HR terlihat sebagai pihak yang bertanggung jawab.</p>
            <br>

            <h5 class="fw-bold">Dampak pada HR dan Lingkungan Kerja</h5>
            <p>Menjadi kambing hitam tidak hanya memengaruhi kesehatan mental HR, tetapi juga dinamika tim. Ketika karyawan kehilangan kepercayaan pada HR, komunikasi menjadi sulit, dan suasana kerja bisa memburuk. Di sebuah pasar tradisional di Jakarta, HR bernama Sari kehilangan kepercayaan pedagang setelah menyampaikan aturan baru tentang jam operasional. “Mereka pikir saya yang bikin aturan, padahal itu dari pengelola pasar,” ujarnya. Situasi ini bisa memicu stres bagi HR dan menghambat upaya mereka untuk membangun budaya kerja yang positif. Di sisi lain, manajemen yang tidak mendukung dengan komunikasi yang jelas memperparah masalah ini.</p>
            <br>

            <h5 class="fw-bold">Cara HR Mengelola Persepsi dan Tekanan</h5>
            <p>Meski berada di posisi sulit, HR bisa mengambil langkah untuk mengurangi persepsi sebagai kambing hitam. Pertama, bangun komunikasi yang transparan. Jelaskan batasan peran HR, misalnya dengan mengatakan, “Keputusan ini dari manajemen, dan saya bertugas menyampaikan serta memastikan prosesnya adil.” Kedua, ajak manajemen untuk terlibat langsung dalam komunikasi kebijakan sensitif, seperti melalui rapat terbuka. Ketiga, perkuat hubungan dengan karyawan melalui kegiatan sederhana, seperti makan bersama atau ngobrol santai, untuk membangun kepercayaan. Terakhir, jaga kesehatan mental dengan mencari dukungan dari komunitas HR lokal atau melakukan aktivitas relaksasi, seperti berkebun atau jalan sore, yang populer di Indonesia.</p>

            <h5 class="fw-bold">Penutup</h5>
            <p>Benarkah HR sering jadi kambing hitam manajemen? Faktanya, ya—terutama karena mereka menjadi penyampai keputusan yang tidak populer tanpa selalu memiliki kuasa untuk mengubahnya. Di sektor non-digital seperti kuliner, ritel, atau kerajinan, HR di Indonesia menghadapi tantangan ekstra karena budaya komunitas yang kuat dan sumber daya terbatas. Namun, dengan komunikasi yang transparan, dukungan dari manajemen, dan pendekatan yang empatik, HR bisa mengurangi persepsi negatif ini dan tetap menjadi jembatan yang kuat antara perusahaan dan karyawan. Ingat, menjadi HR bukan hanya soal menjalankan tugas, tetapi juga menjaga kemanusiaan di tengah dinamika kerja.</p>
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