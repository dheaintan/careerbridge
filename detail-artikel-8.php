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
      <p>Beranda > Tips Loker > Anak Magang Berpengalaman? 5 Tips Kekinian untuk Menonjol di Dunia Kerja!</p>
    </div>

    <div class="container py-5">
        <div class="row">
          <div class="col-lg-8 mb-4">
            <h4 class="fw-bold">Anak Magang Berpengalaman? 5 Tips Kekinian untuk Menonjol di Dunia Kerja!</h4>
            <div class="text-muted mb-3"><i class="bi bi-clock"></i> 1 hari yang lalu</div>
  
            <p>Menjadi anak magang bukan lagi sekadar “numpang lewat” di dunia kerja. Di Indonesia, perusahaan dari skala UMKM hingga korporasi besar semakin menghargai anak magang yang membawa energi baru, keterampilan, dan ide-ide segar. Namun, untuk menjadi anak magang yang benar-benar berpengalaman dan dikenang, ada beberapa “request kekinian” yang perlu kamu penuhi.
                Berikut adalah lima tips praktis untuk menonjol sebagai anak magang di sektor non-digital seperti kuliner, kerajinan, pendidikan, atau ritel, dengan cerita inspiratif dari kehidupan nyata.</p><br>
            
            <h5 class="fw-bold">1. Tunjukkan Semangat Belajar yang Membara</h5>
            <p>Perusahaan menyukai anak magang yang haus pengetahuan dan tidak takut memulai dari bawah. Di sebuah warung bakso di Semarang, misalnya, seorang anak magang bernama Ardi awalnya hanya bertugas mencuci mangkuk. Namun, karena rasa penasarannya, ia sering bertanya tentang resep bakso dan cara melayani pelanggan. Dalam dua bulan, ia dipercaya mengelola pesanan dan bahkan membantu membuat bakso. “Saya cuma ingin tahu lebih banyak, eh malah dikasih tanggung jawab lebih,” katanya. Tipsnya: tanyakan hal-hal kecil, catat pelajaran baru, dan tunjukkan bahwa kamu siap belajar dari setiap tugas, sekecil apa pun.</p>
            <br>

            <h5 class="fw-bold">2. Bawa Ide Kreatif yang Menyegarkan</h5>
            <p>Anak magang yang berpengalaman tahu cara memberikan nilai tambah dengan ide-ide kreatif. Di sebuah toko keramik di Bali, seorang anak magang bernama Putri mengusulkan membuat kemasan ramah lingkungan dari anyaman bambu untuk produk keramik. Ide ini tidak hanya menarik wisatawan, tetapi juga meningkatkan citra toko sebagai bisnis berkelanjutan. “Saya cuma coba kasih saran dari sudut pandang anak muda,” ujarnya. Tipsnya: amati kebutuhan perusahaan, lalu tawarkan ide sederhana seperti cara menata produk, menyapa pelanggan dengan gaya baru, atau membuat promosi musiman. Pastikan idemu sopan dan sesuai dengan visi tempat magangmu.</p>
            <br>
  
            <h5 class="fw-bold">3. Beradaptasi dengan Budaya dan Komunitas Lokal</h5>
            <p>Di sektor non-digital seperti pasar tradisional atau bengkel kerajinan, kemampuan beradaptasi dengan lingkungan lokal sangat penting. Seorang anak magang bernama Rina, yang magang di sebuah sanggar seni di Yogyakarta, belajar menggunakan bahasa Jawa halus saat berbicara dengan pelanggan lokal. Ia juga membantu membuat pamflet promosi dengan elemen budaya Jawa, seperti motif batik. “Awalnya grogi, tapi lama-lama saya merasa seperti bagian dari komunitas,” katanya. Tipsnya: pelajari kebiasaan lokal, seperti cara menyapa atau tradisi kerja, dan tunjukkan respek terhadap budaya setempat untuk membangun kepercayaan.</p>
            <br>

            <h5 class="fw-bold">4. Ambil Inisiatif dengan Etos Kerja Kuat</h5>
            <p>Inisiatif adalah cara ampuh untuk menunjukkan bahwa kamu bukan sekadar “pengikut”. Di sebuah toko roti di Surabaya, anak magang bernama Fajar melihat antrean pelanggan sering kacau. Ia mengusulkan sistem nomor antrean sederhana menggunakan kertas dan membantu merapikan display roti agar lebih menarik. “Saya cuma ingin bantu supaya pelanggan nyaman,” katanya. Hasilnya, pemilik toko memujinya dan bahkan menawarkan pekerjaan paruh waktu. Tipsnya: cari peluang untuk memperbaiki sesuatu, seperti merapikan dokumen, membantu rekan kerja, atau menyelesaikan tugas tanpa diminta. Datang tepat waktu dan tunjukkan sikap proaktif.</p>
            <br>
  
            <h5 class="fw-bold">5. Kuasai Komunikasi yang Ramah dan Jelas</h5>
            <p>Komunikasi yang baik adalah kunci untuk diterima di tempat magang, terutama di sektor yang melibatkan interaksi langsung seperti pendidikan atau ritel. Di sebuah bimbingan belajar di Bandung, anak magang bernama Nia berhasil membuat siswa SD lebih antusias belajar dengan menjelaskan pelajaran melalui cerita dan permainan. “Saya coba bikin mereka ketawa, jadi mereka nggak takut belajar,” ujarnya. Tipsnya: latih cara berbicara yang sopan namun santai, dengarkan dengan penuh perhatian, dan gunakan bahasa yang mudah dipahami oleh pelanggan, rekan kerja, atau anak-anak, tergantung tempat magangmu.</p>
            <br>

            <h5 class="fw-bold">Penutup</h5>
            <p>Menjadi anak magang yang berpengalaman bukan hanya tentang menyelesaikan tugas, tetapi juga tentang membawa semangat, kreativitas, dan keterlibatan yang membuatmu berbeda. Di sektor non-digital seperti kuliner, kerajinan, atau pendidikan, lima tips ini—semangat belajar, ide kreatif, adaptasi lokal, inisiatif, dan komunikasi—akan membantu kamu meninggalkan kesan positif. Jadilah anak magang yang tidak hanya belajar, tetapi juga menginspirasi. Mulailah dengan langkah kecil, seperti menyapa pelanggan dengan tulus atau mencatat ide baru, dan buktikan bahwa kamu adalah aset berharga di tempat kerjamu!</p>
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