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
      <p>Beranda > Tips Loker > 19 Juta Lowongan Pekerjaan di Indonesia: Janji yang Belum Terealisasi</p>
    </div>

    <div class="container py-5">
        <div class="row">
          <div class="col-lg-8 mb-4">
            <h4 class="fw-bold">19 Juta Lowongan Pekerjaan di Indonesia: Janji yang Belum Terealisasi</h4>
            <div class="text-muted mb-3"><i class="bi bi-clock"></i> 5 menit yang lalu</div>
  
            <p>Indonesia, sebagai salah satu negara dengan populasi terbesar di dunia, menghadapi tantangan besar dalam menciptakan lapangan kerja yang cukup untuk tenaga kerja yang terus bertambah. Janji politik untuk menyediakan 19 juta lowongan pekerjaan baru, yang digaungkan selama kampanye pemilihan presiden, menjadi sorotan publik karena hingga kini belum sepenuhnya terwujud. Artikel ini akan membahas konteks janji tersebut, tantangan yang dihadapi, dan langkah yang bisa diambil untuk mendekati target ambisius ini, dengan fokus pada sektor non-digital seperti pertanian, manufaktur, dan pariwisata.</p><br>
            
            <h5 class="fw-bold">Konteks Janji 19 Juta Lowongan Pekerjaan</h5>
            <p>Beberapa faktor menghambat realisasi 19 juta lowongan pekerjaan. Pertama, sektor padat karya seperti manufaktur dan tekstil mengalami tekanan, dengan laporan penutupan pabrik dan pemutusan hubungan kerja (PHK) di berbagai daerah. Penurunan harga komoditas seperti batubara juga memengaruhi sektor pertambangan, yang mengurangi peluang kerja. Kedua, sektor informal, yang mencakup 55-65% tenaga kerja Indonesia, masih mendominasi, terutama di pedesaan. Pekerja informal sering kali menghadapi pendapatan tidak stabil dan kurangnya akses ke perlindungan sosial, yang memperburuk ketimpangan. Ketiga, urbanisasi yang cepat meningkatkan kebutuhan akan lapangan kerja di kota, tetapi investasi di sektor-sektor seperti konstruksi dan pariwisata belum cukup untuk menyerap tenaga kerja dalam jumlah besar.</p>
            <br>

            <h5 class="fw-bold">Tantangan dalam Mewujudkan Janji</h5>
            <p>Terkadang, makna tersembunyi di luar zona nyaman kita. Cobalah menjelajahi bidang yang mungkin belum pernah kamu pertimbangkan sebelumnya. Misalnya, jika kamu selalu penasaran dengan dunia kuliner, ikuti kelas membuat roti atau kunjungi pasar lokal untuk belajar dari pedagang makanan. Jika kamu tertarik pada pelestarian budaya, sukarela di museum atau acara seni tradisional. Pengalaman baru ini tidak harus langsung mengubah kariermu, tetapi bisa membuka pintu menuju passion yang selama ini terpendam. Seorang pegawai kantor yang mencoba berkebun di akhir pekan, misalnya, mungkin menemukan bahwa merawat tanaman membawa ketenangan yang tidak ditemukan di meja kerjanya.</p>
            <br>
            <p>Selain itu, kesenjangan keterampilan (skills mismatch) menjadi masalah serius. Banyak lulusan baru tidak memiliki keterampilan yang sesuai dengan kebutuhan industri, terutama di sektor manufaktur dan jasa. Meskipun pemerintah telah memperkenalkan Peraturan Presiden No. 57 tahun 2023 tentang pelaporan wajib lowongan kerja untuk menciptakan sistem informasi ketenagakerjaan yang terpusat, implementasinya masih terbatas, dan banyak perusahaan belum mematuhi kewajiban pelaporan ini. Sentimen publik di media sosial juga mencerminkan kekecewaan, dengan banyaknya keluhan tentang PHK massal, persaingan ketat di bursa kerja, dan janji politik yang dianggap “ilusi”.</p>
            <br>

            <h5 class="fw-bold">Peluang di Sektor Non-Digital</h5>
            <p>Meskipun tantangan besar, ada peluang untuk menciptakan lapangan kerja di sektor non-digital yang dapat membantu mendekati target 19 juta lowongan. Sektor pertanian, meskipun masih besar, perlu di modernisasi dengan fokus pada agribisnis dan pengolahan hasil pertanian untuk meningkatkan nilai tambah dan menciptakan pekerjaan baru, seperti di bidang pengemasan atau distribusi produk organik. Sektor manufaktur, yang menyumbang sekitar 14% tenaga kerja pada 2023, bisa diperkuat melalui investasi di industri makanan, tekstil, dan furnitur, yang bersifat padat karya. Pariwisata, salah satu sektor unggulan Indonesia, juga memiliki potensi besar. Dengan promosi destinasi lokal dan pelatihan untuk pekerja di bidang perhotelan, kuliner, dan pemandu wisata, sektor ini bisa menyerap banyak tenaga kerja, terutama di daerah seperti Bali, Yogyakarta, dan Lombok.</p>
            <br>

            <h5 class="fw-bold">Langkah Menuju Solusi</h5>
            <p>Untuk mendekati target 19 juta lowongan kerja, pemerintah dan pemangku kepentingan perlu mengambil langkah strategis. Pertama, dorong investasi di sektor padat karya melalui insentif pajak dan kemudahan perizinan, seperti yang telah dilakukan melalui Omnibus Law, meskipun implementasinya perlu dievaluasi. Kedua, perkuat pendidikan dan pelatihan vokasi untuk menyesuaikan keterampilan tenaga kerja dengan kebutuhan industri. Program pelatihan di bidang pengolahan makanan, kerajinan, atau pariwisata lokal bisa menjadi solusi. Ketiga, tingkatkan promosi sistem informasi ketenagakerjaan yang terpusat agar lowongan kerja lebih mudah diakses oleh pencari kerja. Terakhir, libatkan komunitas lokal dan UMKM untuk menciptakan lapangan kerja skala kecil, seperti melalui koperasi atau pasar kerajinan, yang dapat memberikan dampak langsung di daerah.</p>
            <br>

            <h5 class="fw-bold">Penutup</h5>
            <p>Janji 19 juta lowongan pekerjaan adalah target ambisius yang mencerminkan harapan besar rakyat Indonesia akan masa depan ekonomi yang lebih baik. Namun, realitas menunjukkan bahwa tantangan seperti PHK, kesenjangan keterampilan, dan dominasi sektor informal masih menjadi hambatan. Dengan fokus pada sektor non-digital seperti pertanian, manufaktur, dan pariwisata, serta langkah strategis seperti investasi dan pelatihan, Indonesia bisa perlahan mendekati target ini. Meski perjalanan masih panjang, setiap langkah kecil menuju penciptaan lapangan kerja yang bermakna adalah investasi untuk masa depan bangsa.</p>
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