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
      <p>Beranda > Tips Loker > Bagaimana Perusahaan Dapat Menciptakan Lingkungan Kerja yang Menarik?</p>
    </div>

    <div class="container py-5">
        <div class="row">
          <div class="col-lg-8 mb-4">
            <h4 class="fw-bold">Bagaimana Perusahaan Dapat Menciptakan Lingkungan Kerja yang Menarik?</h4>
            <div class="text-muted mb-3"><i class="bi bi-clock"></i> 2 hari yang lalu</div>
  
            <p>Di tengah persaingan ketat untuk menarik dan mempertahankan talenta, perusahaan di Indonesia, dari UMKM hingga korporasi besar, perlu menciptakan lingkungan kerja yang tidak hanya produktif tetapi juga menarik bagi karyawan. Lingkungan kerja yang menarik dapat meningkatkan kepuasan karyawan, mengurangi tingkat turnover, dan mendorong kreativitas. Artikel ini menjelajahi cara-cara praktis perusahaan di sektor non-digital seperti kuliner, pendidikan, ritel, atau kerajinan dapat membangun suasana kerja yang inspiratif, dengan fokus pada pendekatan yang berpusat pada manusia dan budaya lokal.</p><br>
            
            <h5 class="fw-bold">Memahami Kebutuhan Karyawan</h5>
            <p>Langkah pertama untuk menciptakan lingkungan kerja yang menarik adalah memahami apa yang diinginkan karyawan. Di Indonesia, banyak pekerja di sektor non-digital, seperti pedagang pasar atau pengrajin, menghargai rasa kebersamaan dan pengakuan atas kerja keras mereka. Misalnya, sebuah rumah makan Betawi di Jakarta rutin mengadakan makan bersama bulanan untuk karyawan, yang membuat tim merasa seperti keluarga. Pemiliknya, Ibu Ratna, berkata, “Karyawan saya lebih semangat kalau merasa dihargai, bukan cuma soal gaji.” Perusahaan bisa mulai dengan mengadakan sesi diskusi terbuka atau kuesioner sederhana untuk mengetahui apa yang membuat karyawan betah, seperti fleksibilitas jam kerja, bonus musiman, atau kegiatan tim.</p>
            <br>

            <h5 class="fw-bold">Membangun Budaya Kerja yang Inklusif</h5>
            <p>Budaya kerja yang inklusif membuat karyawan merasa diterima, terlepas dari latar belakang mereka. Di sebuah koperasi tenun di Lombok, misalnya, pemilik memastikan semua karyawan, dari penenun hingga staf pemasaran, memiliki kesempatan untuk memberikan masukan tentang desain produk. “Saya ajak mereka rapat bareng, biar semua suara didengar,” kata pemilik koperasi, Bapak Hasan. Pendekatan ini tidak hanya meningkatkan semangat kerja, tetapi juga menghasilkan produk yang lebih kreatif. Perusahaan bisa menerapkan budaya inklusif dengan mengadakan pelatihan tentang komunikasi lintas budaya, merayakan hari besar lokal seperti Idulfitri atau Galungan, dan memastikan tidak ada diskriminasi dalam promosi atau tugas.</p>
            <br>
  
            <h5 class="fw-bold">Memberikan Pengakuan dan Penghargaan</h5>
            <p>Karyawan merasa termotivasi ketika kerja keras mereka diakui. Di sektor ritel, sebuah toko furnitur di Solo memiliki tradisi “Puji Syukur Mingguan”, di mana manajer memuji karyawan yang berhasil menarik pelanggan atau menyelesaikan tugas dengan baik. “Cuma ucapan terima kasih sederhana, tapi temen-temen jadi semangat,” kata manajer toko, Mbak Sari. Pengakuan tidak harus mahal—piagam sederhana, makan siang gratis, atau bonus kecil di akhir tahun bisa membuat perbedaan besar. Perusahaan juga bisa memberikan penghargaan non-materi, seperti kesempatan untuk memimpin proyek kecil atau waktu libur tambahan.</p>
            <br>

            <h5 class="fw-bold">Menciptakan Lingkungan Fisik yang Nyaman</h5>
            <p>Lingkungan kerja yang nyaman secara fisik memengaruhi produktivitas dan kepuasan. Di sebuah bimbingan belajar di Surabaya, ruang kerja guru dilengkapi dengan meja rapi, pencahayaan alami, dan sudut kecil dengan tanaman hijau. “Kami sengaja buat ruangan yang bikin guru betah, biar mereka bisa fokus mengajar,” kata pemiliknya, Pak Budi. Perusahaan di sektor non-digital bisa memulai dengan langkah sederhana: memastikan tempat kerja bersih, menyediakan air minum gratis, atau menambahkan elemen seperti kipas angin di pasar yang panas. Jika memungkinkan, sediakan ruang istirahat kecil untuk karyawan melepas penat.</p>
            <br>
  
            <h5 class="fw-bold">Mendorong Keseimbangan Kerja dan Kehidupan Pribadi</h5>
            <p>Keseimbangan antara kerja dan kehidupan pribadi adalah kunci untuk menjaga karyawan tetap bahagia. Di sebuah pasar tradisional di Makassar, pedagang diberi jadwal bergilir agar bisa pulang lebih awal setidaknya sekali seminggu untuk bersama keluarga. “Kalau karyawan capek terus, jualan juga nggak maksimal,” kata koordinator pasar, Ibu Aisyah. Perusahaan bisa menerapkan jam kerja fleksibel, cuti untuk acara keluarga, atau kegiatan rekreasi seperti outing tahunan. Di sektor pendidikan atau kuliner, misalnya, memberikan hari libur tambahan di musim sepi bisa membantu karyawan menyegarkan kembali energi mereka.</p>
            <br>

            <h5 class="fw-bold">Penutup</h5>
            <p>Menciptakan lingkungan kerja yang menarik bukanlah tentang anggaran besar, tetapi tentang perhatian pada kebutuhan karyawan, budaya yang inklusif, dan pengakuan atas kerja keras. Di sektor non-digital seperti kuliner, kerajinan, atau ritel, langkah sederhana seperti mendengarkan karyawan, merayakan keberagaman, atau menyediakan ruang kerja yang nyaman bisa membuat perbedaan besar. Perusahaan yang berhasil membangun lingkungan seperti ini tidak hanya menarik talenta terbaik, tetapi juga menciptakan tim yang loyal dan bersemangat. Mulailah dengan satu perubahan kecil, seperti mengucapkan terima kasih atau merapikan ruang kerja, dan saksikan bagaimana suasana kerja menjadi lebih hidup.</p>
        </div>
      
        <div class="col-lg-4">
            <div class="border border-black p-3 rounded-3 shadow-sm">
                <h6 class="fw-bold mb-3">Artikel Terkait</h6>
                <div style="width: 80%; height: 1px; background-color: black; margin-left:10%;"></div>

                    <div class="d-flex mb-3 mt-4">
                        <img src=".jpg" alt="Anak Magang Berpengalaman?" class="me-2 rounded">
                        <div>
                            <a href="detail-artikel-1.php" class="text-dark text-decoration-none">
                                <p class="mb-1 fw-medium">5 Tips Sukses Menghadapi Dunia Kerja di Era Digital</p>
                                <small class="text-muted">3 menit yang lalu</small>
                            </a>
                        </div>
                    </div>

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