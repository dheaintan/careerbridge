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
      <p>Beranda > Tips Loker > Menyeimbangkan Peran: Kisah Wanita Indonesia yang Merangkap Ibu dan Pekerja</p>
    </div>

    <div class="container py-5">
        <div class="row">
          <div class="col-lg-8 mb-4">
            <h4 class="fw-bold">Menyeimbangkan Peran: Kisah Wanita Indonesia yang Merangkap Ibu dan Pekerja</h4>
            <div class="text-muted mb-3"><i class="bi bi-clock"></i> 10 menit yang lalu</div>
  
            <p>Di Indonesia, jutaan wanita menjalani peran ganda sebagai ibu sekaligus pekerja, menghadapi tantangan unik dalam menyeimbangkan tanggung jawab keluarga dan karier. Dengan budaya yang kental akan nilai keluarga, ditambah tekanan ekonomi dan ekspektasi sosial, perjalanan mereka penuh inspirasi sekaligus rintangan. Artikel ini menjelajahi pengalaman para ibu pekerja di Indonesia, tantangan yang mereka hadapi, dan bagaimana mereka menemukan keseimbangan serta makna dalam peran gandanya, dengan fokus pada sektor non-digital seperti pendidikan, perdagangan, dan pelayanan.</p><br>
            
            <h5 class="fw-bold">Menjalani Peran Ganda di Tengah Dinamika Indonesia</h5>
            <p>Bagi banyak wanita di Indonesia, menjadi ibu sekaligus pekerja bukanlah pilihan, melainkan kebutuhan. Data dari Badan Pusat Statistik (BPS) 2023 menunjukkan bahwa sekitar 50% tenaga kerja wanita di Indonesia bekerja di sektor informal, seperti pedagang pasar, pengrajin, atau pekerja jasa, sementara banyak lainnya berprofesi sebagai guru, perawat, atau wiraswasta. Mereka bangun sebelum fajar untuk menyiapkan kebutuhan keluarga, lalu bergegas ke pasar, sekolah, atau toko, hanya untuk kembali ke rumah dan mengurus anak-anak hingga larut malam. Kisah seorang ibu seperti Sari, seorang guru SD di Yogyakarta yang juga mengelola warung kecil, mencerminkan realitas ini. “Saya ingin anak-anak saya punya masa depan lebih baik, jadi saya bekerja keras sambil memastikan mereka tetap terurus,” katanya.</p>
            <br>

            <h5 class="fw-bold">Tantangan yang Dihadapi</h5>
            <p>Menjalani peran ganda tidak pernah mudah. Salah satu tantangan terbesar adalah manajemen waktu. Banyak ibu pekerja, seperti Fatimah, seorang penjahit di Jakarta, harus membagi waktu antara menjahit pesanan pelanggan dan mengasuh anak balitanya. “Kadang saya menjahit sampai tengah malam setelah anak-anak tidur,” ungkapnya. Tekanan sosial juga menjadi beban: sebagian masyarakat masih memandang bahwa tugas utama wanita adalah di rumah, membuat ibu pekerja sering merasa bersalah karena “mengabaikan” keluarga. Selain itu, fasilitas pendukung seperti tempat penitipan anak yang terjangkau masih langka, terutama di daerah pedesaan. Kurangnya dukungan dari tempat kerja, seperti cuti melahirkan yang memadai atau jam kerja fleksibel, juga memperumit situasi, terutama di sektor informal.</p>
            <br>
  
            <h5 class="fw-bold">Menemukan Keseimbangan dan Dukungan</h5>
            <p>Meski penuh tantangan, banyak ibu pekerja menemukan cara untuk menyeimbangkan peran mereka. Komunikasi dengan keluarga menjadi kunci. Misalnya, Ani, seorang pedagang pasar di Surabaya, melibatkan suami dan anak-anaknya dalam tugas rumah tangga sederhana, seperti menyiapkan dagangan atau membersihkan rumah. “Kami bekerja sebagai tim,” ujarnya. Komunitas lokal juga berperan besar. Di banyak daerah, ibu-ibu membentuk kelompok dukungan, seperti arisan atau kelompok pengrajin, untuk saling berbagi pengalaman dan solusi. Beberapa ibu, seperti Wulan, seorang perawat di Bandung, memanfaatkan waktu istirahat untuk melakukan hobi seperti berkebun, yang membantunya menjaga kesehatan mental di tengah jadwal padat.</p>
            <br>
            <p>Pemerintah dan organisasi masyarakat juga mulai mendukung. Program seperti Kartu Prakerja memberikan pelatihan keterampilan bagi ibu pekerja di sektor informal, seperti membuat kue atau menjahit, untuk meningkatkan pendapatan. Inisiatif lokal, seperti koperasi wanita di Bali yang memproduksi kerajinan tangan, juga memberi ibu pekerja peluang untuk bekerja dari rumah sambil tetap mengurus keluarga. Meski demikian, masih diperlukan kebijakan yang lebih inklusif, seperti subsidi penitipan anak atau pelatihan kewirausahaan yang menjangkau daerah terpencil.</p>
            <br>
  
            <h5 class="fw-bold">Merajut Makna dari Peran Ganda</h5>
            <p>Bagi banyak ibu pekerja, bekerja bukan hanya soal penghasilan, tetapi juga identitas dan kebanggaan. Menjadi guru, pedagang, atau perawat memungkinkan mereka berkontribusi pada masyarakat sambil menjadi teladan bagi anak-anak mereka. “Saya ingin anak saya melihat bahwa ibunya kuat dan bisa melakukan banyak hal,” kata Sari. Kepuasan ini sering kali muncul dari dampak kecil yang mereka ciptakan—seperti melihat murid berhasil membaca, pelanggan tersenyum, atau anak-anak tumbuh dengan nilai kerja keras. Meski lelah, momen-momen ini menjadi bahan bakar yang membuat mereka terus melangkah.</p>
            <br>

            <h5 class="fw-bold">Penutup</h5>
            <p>Perjuangan ibu pekerja di Indonesia adalah cerminan ketangguhan dan dedikasi. Mereka merajut keseimbangan antara keluarga dan karier dengan kreativitas, dukungan komunitas, dan semangat pantang menyerah. Meski tantangan seperti waktu, tekanan sosial, dan keterbatasan fasilitas masih ada, kisah mereka menginspirasi kita untuk menghargai peran ganda mereka dan mendorong kebijakan yang lebih mendukung. Untuk para ibu pekerja, setiap hari adalah bukti bahwa mereka tidak hanya bertahan, tetapi juga membangun masa depan yang lebih cerah bagi keluarga dan masyarakat.</p>
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