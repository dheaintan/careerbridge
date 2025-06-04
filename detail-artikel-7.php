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
      <p>Beranda > Tips Loker > Menemukan Kebahagiaan di Balik Kesederhanaan Kerja</p>
    </div>

    <div class="container py-5">
        <div class="row">
          <div class="col-lg-8 mb-4">
            <h4 class="fw-bold">Menyeimbangkan Peran: Kisah Wanita Indonesia yang Merangkap Ibu dan Pekerja</h4>
            <div class="text-muted mb-3"><i class="bi bi-clock"></i> 10 menit yang lalu</div>
  
            <p>Di tengah hiruk-pikuk dunia kerja yang sering kali menuntut ambisi besar dan prestasi gemilang, ada keindahan yang tersembunyi dalam pekerjaan sederhana yang dilakukan dengan hati. Di Indonesia, jutaan orang menjalani profesi yang mungkin tidak glamor di mata dunia—seperti petani, pedagang pasar, atau pengrajin—namun penuh makna bagi mereka dan komunitas di sekitarnya. Artikel ini menjelajahi bagaimana kebahagiaan dapat ditemukan dalam kesederhanaan kerja, dengan fokus pada profesi non-digital seperti pertanian, kerajinan tangan, dan kuliner tradisional, serta kisah-kisah inspiratif dari Indonesia.</p><br>
            
            <h5 class="fw-bold">Makna dalam Kerja Sehari-hari</h5>
            <p>Bagi banyak orang, kebahagiaan di tempat kerja tidak datang dari gaji besar atau pengakuan luas, melainkan dari rasa pencapaian kecil yang terasa nyata. Bayangkan seorang petani di Jawa Tengah, seperti Pak Made, yang bangun setiap pagi untuk merawat sawahnya. Baginya, melihat padi tumbuh subur setelah berbulan-bulan bekerja di bawah matahari adalah sumber kebanggaan yang tak ternilai. “Saya tidak punya banyak harta, tapi setiap panen adalah bukti bahwa kerja keras saya berarti,” katanya. Pekerjaan sederhana ini, meski melelahkan, memberi dampak langsung: memberi makan keluarga dan komunitas.</p>
            <br>

            <h5 class="fw-bold">Koneksi dengan Komunitas</h5>
            <p>Pekerjaan sederhana sering kali membangun ikatan yang kuat dengan orang-orang di sekitar. Misalnya, Ibu Siti, seorang penjual soto di pasar tradisional Surabaya, tidak hanya menjual makanan, tetapi juga menciptakan ruang untuk obrolan hangat dengan pelanggan. Warung kecilnya menjadi tempat bertukar cerita, dari kabar keluarga hingga guyonan sehari-hari. “Saya suka melihat pelanggan tersenyum setelah makan soto buatan saya,” ujarnya. Interaksi ini, meski sederhana, membuat pekerjaannya terasa lebih dari sekadar mencari nafkah—ia menjadi bagian dari kehidupan komunitas.</p>
            <br>
  
            <h5 class="fw-bold">Kreativitas dalam Kerajinan Tangan</h5>
            <p>Di banyak daerah di Indonesia, kerajinan tangan seperti tenun, ukir kayu, atau pembuatan batik menjadi sumber kebahagiaan bagi para pengrajin. Ambil contoh Mbak Ayu, seorang pengrajin batik di Solo. Baginya, setiap goresan canting di kain adalah bentuk meditasi. “Saat membatik, saya lupa semua masalah. Saya hanya fokus pada pola dan warna,” katanya. Proses kreatif ini tidak hanya menghasilkan karya seni, tetapi juga memberikan rasa damai dan kepuasan batin. Ketika karya batiknya dibeli atau dipuji, kebahagiaan itu berlipat ganda, bukan karena uang, tetapi karena karya tangannya dihargai.</p>
            <br>

            <h5 class="fw-bold">Menghargai Proses, Bukan Hanya Hasil</h5>
            <p>Salah satu pelajaran terbesar dari pekerjaan sederhana adalah pentingnya menikmati proses. Seorang tukang kayu di Bali, seperti Pak Wayan, mungkin menghabiskan berminggu-minggu untuk mengukir pintu kuil. Prosesnya panjang dan penuh ketelitian, tetapi ia menemukan kegembiraan dalam setiap serpihan kayu yang terbentuk. “Saya merasa hidup saat tangan saya bekerja,” ujarnya. Sikap ini mengajarkan kita bahwa kebahagiaan tidak selalu terletak pada hasil akhir, tetapi pada perjalanan menuju ke sana—setiap langkah kecil adalah kemenangan.</p>
            <br>
  
            <h5 class="fw-bold">Tantangan dan Ketangguhan</h5>
            <p>Tentu saja, pekerjaan sederhana tidak selalu mudah. Cuaca buruk bisa mengganggu panen petani, persaingan di pasar menantang pedagang, dan permintaan untuk kerajinan tangan kadang tidak menentu. Namun, justru di tengah tantangan ini, banyak pekerja menemukan kekuatan batin. Mereka belajar untuk bersyukur atas apa yang ada, beradaptasi dengan keterbatasan, dan menemukan solusi kreatif. Misalnya, saat musim hujan mengganggu penjualan, Ibu Siti mulai menawarkan soto dalam kemasan untuk dibawa pulang, sebuah langkah kecil yang menjaga pendapatannya tetap stabil.</p>
            <br>

            <h5 class="fw-bold">Penutup</h5>
            <p>Kebahagiaan dalam kerja tidak selalu ditemukan di gedung-gedung tinggi atau karier bergengsi. Di sawah, pasar, atau bengkel kecil, para pekerja sederhana di Indonesia menunjukkan bahwa makna sejati datang dari hati yang tulus, koneksi dengan komunitas, dan kebanggaan atas usaha mereka. Kisah mereka mengingatkan kita untuk menghargai setiap tetes keringat, setiap senyuman pelanggan, dan setiap karya yang tercipta dari tangan sendiri. Dalam kesederhanaan, ada kebahagiaan yang mendalam—dan itu adalah pelajaran yang bisa kita bawa, apa pun pekerjaan kita.</p>
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