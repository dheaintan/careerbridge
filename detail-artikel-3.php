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
      <p>Beranda > Tips Loker > Menemukan Passion dalam Karier: Panduan untuk Membangun Karier yang Bermakna</p>
    </div>

    <div class="container py-5">
        <div class="row">
          <div class="col-lg-8 mb-4">
            <h4 class="fw-bold">Menemukan Passion dalam Karier: Panduan untuk Membangun Karier yang Bermakna</h4>
            <div class="text-muted mb-3"><i class="bi bi-clock"></i> 3 jam yang lalu</div>
  
            <p>Di tengah kesibukan dunia kerja, banyak orang merasa terjebak dalam rutinitas yang tidak memenuhi hasrat atau tujuan pribadi mereka. Menemukan passion dalam karier bukan hanya tentang kebahagiaan, tetapi juga tentang menciptakan makna dan dampak dalam pekerjaan yang kamu lakukan.
                Artikel ini akan membahas cara menemukan passionmu di dunia kerja, tanpa fokus pada aspek digital atau IT, melainkan pada eksplorasi diri dan langkah praktis untuk karier yang lebih memuaskan.</p><br>
            
            <h5 class="fw-bold">1. Kenali Diri dan Nilai Intimu</h5>
            <p>Langkah pertama untuk menemukan passion adalah memahami apa yang benar-benar penting bagimu. Apa yang membuatmu bersemangat? Apa nilai yang kamu junjung tinggi, seperti membantu orang lain, kreativitas, atau kebebasan?</p>
            <ul>
              <li><strong>Langkah Praktis:</strong> Luangkan waktu untuk menulis jurnal. Tulis momen dalam hidupmu ketika kamu merasa paling hidup atau bangga dengan pekerjaanmu.
              Apakah itu saat mengajar seseorang, menciptakan sesuatu dengan tangan, atau memecahkan masalah kompleks?</li>
              <li><strong>Contoh:</strong> Jika kamu merasa bahagia saat membantu orang lain, karier di bidang pendidikan, konseling, atau pelayanan sosial mungkin cocok untukmu.</li>
            </ul><br>

            <h5 class="fw-bold">2. Eksplorasi Beragam Bidang Karier</h5>
            <p>Jangan takut untuk mencoba hal baru di luar zona nyamanmu. Banyak orang menemukan passion mereka melalui pengalaman langsung, bukan hanya perenungan.
                Bidang seperti seni, kerajinan, pendidikan, atau pelayanan masyarakat menawarkan peluang untuk mengeksplorasi kreativitas dan dampak sosial.</p>
            <ul>
              <li><strong>Langkah Praktis:</strong> Ikuti workshop, magang, atau kegiatan sukarela di bidang yang menarik minatmu. Misalnya, jika kamu suka memasak, coba ikut kelas kuliner atau magang di restoran lokal.</li>
              <li><strong>Contoh:</strong> Seorang akuntan yang merasa jenuh mungkin menemukan passion di bidang tata boga setelah mengikuti kelas membuat roti akhir pekan.</li>
            </ul><br>
  
            <h5 class="fw-bold">3. Bangun Jaringan dengan Orang-orang Inspiratif</h5>
            <p>Berinteraksi dengan orang-orang yang sudah menjalani karier yang kamu minati bisa membuka wawasan.
                Mereka bisa berbagi pengalaman, tantangan, dan apa yang membuat pekerjaan mereka bermakna.</p>
            <ul>
              <li><strong>Langkah Praktis:</strong> Hadiri acara komunitas, pameran karier, atau diskusi lokal yang relevan dengan minatmu. Misalnya, jika kamu tertarik pada pertanian organik, kunjungi pasar petani lokal dan ajak ngobrol para petani.</li>
              <li><strong>Contoh:</strong> Berbincang dengan seorang pengrajin kayu bisa menginspirasimu untuk mengejar karier di bidang kerajinan tangan atau desain furnitur.</li>
            </ul><br>

            <h5 class="fw-bold">4. Fokus pada Dampak, Bukan Hanya Gaji</h5>
            <p>Passion sering kali ditemukan ketika kamu merasa pekerjaanmu memberikan dampak positif, baik untuk komunitas, lingkungan, atau individu lain. Karier di bidang seperti pendidikan anak usia dini, pelestarian lingkungan, atau pekerjaan sosial sering kali memberikan kepuasan batin yang mendalam.</p>
            <ul>
              <li><strong>Langkah Praktis:</strong> Tanyakan pada diri sendiri, “Apa yang ingin saya ubah di dunia ini?” lalu cari pekerjaan yang selaras dengan visi tersebut. Misalnya, jika kamu peduli pada lingkungan, pertimbangkan karier di organisasi konservasi atau pengelolaan taman kota.</li>
              <li><strong>Contoh:</strong> Seorang guru yang mengajar anak-anak di daerah terpencil mungkin menemukan makna dalam melihat perkembangan murid-muridnya.</li>
            </ul><br>
  
            <h5 class="fw-bold">5. Mulai dari Langkah Kecil</h5>
            <p>Tidak perlu langsung mengubah karier secara drastis. Mulailah dengan proyek sampingan atau hobi yang selaras dengan minatmu. Seiring waktu, ini bisa berkembang menjadi karier penuh.</p>
            <ul>
              <li><strong>Langkah Praktis:</strong> Dedikasikan akhir pekan untuk mengejar hobi yang bisa jadi karier, seperti berkebun, membuat keramik, atau menjadi pemandu wisata lokal. Uji apakah aktivitas ini memberi kepuasan jangka panjang.</li>
              <li><strong>Contoh:</strong> Seseorang yang suka berkebun bisa mulai menjual tanaman hias di pasar lokal sebelum beralih menjadi wirausaha di bidang hortikultura.</li>
            </ul><br>

            <h5 class="fw-bold">Penutup</h5>
            <p>Menemukan passion dalam karier adalah perjalanan, bukan tujuan instan. Dengan mengenali nilai dirimu, mengeksplorasi bidang baru, terhubung dengan orang-orang inspiratif, dan fokus pada dampak, kamu bisa membangun karier yang tidak hanya memenuhi kebutuhan finansial, tetapi juga memberikan kebahagiaan dan makna. Mulailah dengan satu langkah kecil hari ini, dan biarkan passionmu memandu jalanmu menuju karier yang lebih bermakna.</p>
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