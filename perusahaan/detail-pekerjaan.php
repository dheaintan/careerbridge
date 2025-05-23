<?php
require '../koneksi.php';

if (!isset($_GET['id'])) {
  echo "ID tidak ditemukan!";
  exit;
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM posting_job WHERE ID_job = ?");
$stmt->execute([$id]);
$loker = $stmt->fetch();

if (!$loker) {
  echo "Data lowongan tidak ditemukan.";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lowongan Kerja</title>
  <link rel="icon" type="image/x-icon" href="../logo%20careerbridge.png">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand text-decoration-none">
            <img src="../logo%20careerbridge.png" alt="CareerBridge" height="40" class="d-inline-block align-top">
          </a>
        
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"  data-bs-target="#navbarTogglerDemo02"aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../pelamar/cari-loker.php" style="font-family: 'Inter', sans-serif;">Cari Lowongan Kerja</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="pasang-loker.php" style="font-family: 'Inter', sans-serif;">Pasang Lowongan</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../artikel.html" style="font-family: 'Inter', sans-serif;">Tips Loker</a>
              </li>
            </ul>
            
            <form class="d-flex align-items-center mx-1">
              <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #e7f1a8; color: black; font-size: 0.90rem">
                  Masuk
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="../pelamar/masukpekerja.php">Masuk sebagai Pencari Kerja</a></li>
                  <li><a class="dropdown-item" href="masukperusahaan.php">Masuk sebagai Perusahaan</a></li>
                </ul>
              </div>
            </form>
          </div>
        </div>
    </nav>

    <div style="width: 100%; height: 2px; background-color: black;"></div>

    <div class="container my-5">
      <div class="row">
        <div class="col-lg-8">
          <div class="border rounded-4 p-4 bg-white mb-4 shadow-sm">
            <div class="d-flex justify-content-between align-items-start flex-wrap">
              <div>
                <h4 class="fw-bold"><?= htmlspecialchars($loker['posisi'])?></h4>
                <div class="fw-semibold" style="color: #364c84;"><?= htmlspecialchars($loker['nama_perusahaan']) ?></div>
              </div>
              <div class="d-flex gap-2 mt-2">
                <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-4 p-3">
                      <div class="modal-header border-0">
                        <h5 class="modal-title fw-bold" id="loginModalLabel">Tertarik dengan loker ini?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                      </div>

                      <div class="modal-body text-start bg-light">
                        <p class="mb-4">Kamu harus login dulu agar bisa menyimpan atau melamar lowongan pekerjaan yang kamu idamkan</p>
                        <div class="d-flex gap-3">
                          <button type="button" class="btn btn-light flex-fill" data-bs-dismiss="modal" style="background-color: #CAC5C5;">Kembali</button>
                          <a href="../pelamar/masukpekerja.php" class="btn btn-primary flex-fill" style="background-color: #364C84;">Login</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <button class="btn btn-outline-secondary btn-sm" onclick="cekLogin()"><i class="bi bi-bookmark"></i></button>

                <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-4 p-3">
                      <div class="modal-header border-0">
                        <h5 class="modal-title fw-bold" id="loginModalLabel">Tertarik dengan loker ini?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                      </div>

                      <div class="modal-body text-start bg-light">
                        <p class="mb-4">Kamu harus login dulu agar bisa menyimpan atau melamar lowongan pekerjaan yang kamu idamkan</p>
                        <div class="d-flex gap-3">
                          <button type="button" class="btn btn-light flex-fill" data-bs-dismiss="modal" style="background-color: #CAC5C5;">Kembali</button>
                          <a href="../pelamar/masukpekerja.php" class="btn btn-primary flex-fill" style="background-color: #364C84;">Login</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn text-white" style="background-color: #364C84;" onclick="cekLogin()">Lamar Sekarang</button>

                <script>
                  const isLoggedIn = false;

                  function cekLogin() {
                    if (!isLoggedIn) {
                      const modal = new bootstrap.Modal(document.getElementById('loginModal'));
                      modal.show();
                    } else {
                      window.location.href = "/lamar-pekerjaan";
                    }
                  }
                </script>

              </div>
            </div>
    
            <div class="row text-muted mt-4">
              <div class="col-md-4">
                <div class="d-flex align-items-start">
                  <i class="bi bi-geo-alt" style="color: #364c84; margin-right: 8px;"></i>
                  <div>
                    <div class="fw-bold text-dark">Lokasi</div>
                    <p style="color: #364c84;"><?= htmlspecialchars($loker['lokasi']) ?></p>
                  </div>
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="d-flex align-items-start">
                  <i class="bi bi-briefcase" style="color: #364c84; margin-right: 8px;"></i>
                  <div>
                    <div class="fw-bold text-dark">Tipe Pekerjaan</div>
                    <p style="color: #364c84;"><?= htmlspecialchars($loker['tipe_pekerjaan']) ?></p>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="d-flex align-items-start">
                  <i class="bi bi-bar-chart" style="color: #364c84; margin-right: 8px;"></i>
                  <div>
                    <div class="fw-bold text-dark">Level Pekerjaan</div>
                    <p style="color: #364c84;"><?= htmlspecialchars($loker['level_pekerjaan']) ?></p>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="d-flex align-items-start">
                  <i class="bi bi-tags" style="color: #364c84; margin-right: 8px;"></i>
                  <div>
                    <div class="fw-bold text-dark">Fungsi</div>
                    <p style="color: #364c84; font-family: 'M PLUS Rounded 1c', sans-serif;"><?= htmlspecialchars($loker['posisi'])?></p>
                  </div>
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="d-flex align-items-start">
                  <i class="bi bi-mortarboard" style="color: #364c84; margin-right: 8px;"></i>
                  <div>
                    <div class="fw-bold text-dark">Pendidikan</div>
                    <?php if (isset($loker) && isset($loker['jenjang_pendidikan'])): ?>
                      <p style="color: #364c84;"><?= htmlspecialchars($loker['jenjang_pendidikan']); ?></p>
                      <?php else: ?>
                      <p style="color: #364c84;">Data tidak tersedia</p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="d-flex align-items-start">
                  <i class="bi bi-cash-coin me-1" style="color: #364c84; margin-right: 8px;"></i>
                  <div>
                    <div class="fw-bold text-dark">Gaji</div>
                      <?php if (isset($loker) && isset($loker['gaji_min']) && isset($loker['gaji_max'])): ?>
                        <p style="color: #364c84;">
                          Rp<?= number_format($loker['gaji_min'], 0, ',', '.'); ?> - Rp<?= number_format($loker['gaji_max'], 0, ',', '.'); ?>
                        </p>
                        <?php else: ?>
                          <p style="color: #364c84;">Gaji tidak tersedia</p>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <br>
          <p><?= htmlspecialchars($loker['nama_perusahaan']) ?> sedang membuka lowongan pekerjaan sebagai <?= htmlspecialchars($loker['posisi'])?></p>
          <br>

          <h4 class="fw-bold">Tanggung Jawab Pekerjaan :</h4>
          <ul><?= htmlspecialchars($loker['deskripsi_loker'])?></ul>
        </div>

        <div class="col-lg-4">
          <div class="card mb-4 shadow-sm">
            <div class="card-body text-center">
              <div class="rounded-circle bg-secondary mx-auto mb-3" style="width: 60px; height: 60px;"></div>
              <h6 class="fw-bold">PT. PANCA BUANA ABADI</h6>
              <p class="text-muted small mb-1"><i class="bi bi-geo-alt"></i> Bandung Barat</p>
              <p class="text-muted small mb-1"><i class="bi bi-building"></i> Manufaktur Umum</p>
              <p class="text-muted small mb-2"><i class="bi bi-people"></i> 51 - 200 Karyawan</p>
              <p class="small">PT. PANCA BUANA ABADI adalah perusahaan yang bergerak di bidang pembuatan kemasan plastik.</p>
            </div>
          </div>

          <div class="card shadow-sm">
            <div class="card-body">
              <h6 class="fw-bold mb-3">Loker Serupa</h6>

              <a href="detail-pekerjaan.php" class="text-decoration-none text-dark">
                <div class="d-flex mb-3">
                  <div class="rounded-circle bg-secondary me-3" style="width: 75px; height: 75px;"></div>
                  <div class="flex-grow-1">
                    <div style="font-size: 0.9rem; color: #95B1EE;">NAMA PERUSAHAAN</div>
                    <div class="fw-bold" style="font-size: 1rem; font-family: 'M PLUS Rounded 1c', sans-serif;">PEKERJAAN</div>                
                    <div class="d-flex mt-2 text-muted" style="font-size: 0.9rem;">
                      <div class="me-3 d-flex align-items-center" style="color: #CAC5C5;">
                        <i class="bi bi-geo-alt"></i> LOKASI
                      </div>
                      <div class="d-flex align-items-center" style="color: #CAC5C5;">
                        <i class="bi bi-cash-coin me-1"></i> GAJI
                      </div>
                    </div>
                  </div>
                </div>

                <div class="d-flex mb-3">
                  <div class="rounded-circle bg-secondary me-3" style="width: 75px; height: 75px;"></div>
                  <div class="flex-grow-1">
                    <div style="font-size: 0.9rem; color: #95B1EE;">NAMA PERUSAHAAN</div>
                    <div class="fw-bold" style="font-size: 1rem; font-family: 'M PLUS Rounded 1c', sans-serif;">PEKERJAAN</div>               
                    <div class="d-flex mt-2 text-muted" style="font-size: 0.9rem;">
                      <div class="me-3 d-flex align-items-center" style="color: #CAC5C5;">
                        <i class="bi bi-geo-alt"></i> LOKASI
                      </div>
                      <div class="d-flex align-items-center" style="color: #CAC5C5;">
                        <i class="bi bi-cash-coin me-1"></i> GAJI
                      </div>
                    </div>
                  </div>
                </div>

                <div class="d-flex mb-3">
                  <div class="rounded-circle bg-secondary me-3" style="width: 75px; height: 75px;"></div>
                  <div class="flex-grow-1">
                    <div style="font-size: 0.9rem; color: #95B1EE;">NAMA PERUSAHAAN</div>
                    <div class="fw-bold" style="font-size: 1rem; font-family: 'M PLUS Rounded 1c', sans-serif;">PEKERJAAN</div>               
                    <div class="d-flex mt-2 text-muted" style="font-size: 0.9rem;">
                      <div class="me-3 d-flex align-items-center" style="color: #CAC5C5;">
                        <i class="bi bi-geo-alt"></i> LOKASI
                      </div>
                      <div class="d-flex align-items-center" style="color: #CAC5C5;">
                        <i class="bi bi-cash-coin me-1"></i> GAJI
                      </div>
                    </div>
                  </div>
                </div>

                <div class="d-flex mb-3">
                  <div class="rounded-circle bg-secondary me-3" style="width: 75px; height: 75px;"></div>
                  <div class="flex-grow-1">
                    <div style="font-size: 0.9rem; color: #95B1EE;">NAMA PERUSAHAAN</div>
                    <div class="fw-bold" style="font-size: 1rem; font-family: 'M PLUS Rounded 1c', sans-serif;">PEKERJAAN</div>
                    <div class="d-flex mt-2 text-muted" style="font-size: 0.9rem;">
                      <div class="me-3 d-flex align-items-center" style="color: #CAC5C5;">
                        <i class="bi bi-geo-alt"></i> LOKASI
                      </div>
                      <div class="d-flex align-items-center" style="color: #CAC5C5;">
                        <i class="bi bi-cash-coin me-1"></i> GAJI
                      </div>
                    </div>
                  </div>
                </div>

                <div class="d-flex mb-3">
                  <div class="rounded-circle bg-secondary me-3" style="width: 75px; height: 75px;"></div>
                  <div class="flex-grow-1">
                    <div style="font-size: 0.9rem; color: #95B1EE;">NAMA PERUSAHAAN</div>
                    <div class="fw-bold" style="font-size: 1rem; font-family: 'M PLUS Rounded 1c', sans-serif;">PEKERJAAN</div>
                    <div class="d-flex mt-2 text-muted" style="font-size: 0.9rem;">
                      <div class="me-3 d-flex align-items-center" style="color: #CAC5C5;">
                        <i class="bi bi-geo-alt"></i> LOKASI
                      </div>
                      <div class="d-flex align-items-center" style="color: #CAC5C5;">
                        <i class="bi bi-cash-coin me-1"></i> GAJI
                      </div>
                    </div>
                  </div>
                </div>
              </a>
    
            </div>
          </div>
        </div>

      </div>
    </div>

    <footer class="text-white py-5" style="background-color: #364c84">
      <div class="container text-white">
        <div class="row">
          <!-- Logo dan Deskripsi -->
          <div class="col-md-5">
            <div class="d-flex align-items-start mb-3">
              <img src="../logo%20careerbridge.png" alt="CareerBridge" height="100" class="d-inline-block align-top">
            </div>
            <p style="max-width: 500px;">
              CareerBridge adalah platform yang membantu pencari kerja menemukan pekerjaan yang tepat dan memudahkan perusahaan dalam merekrut karyawan. Dengan sistem yang mudah digunakan, CareerBridge membuat proses mencari kerja dan perekrutan menjadi lebih cepat dan efisien.
            </p>
          </div>
    
          <!-- Tentang Kami -->
          <div class="col-md-2">
            <h6 class="fw-bold">Tentang Kami</h6>
            <div class="d-flex flex-column">
              <a href="../pusatbantuan.html" class="text-white text-decoration-none mb-1">Pusat Bantuan</a>
              <a href="../kebijakanprivasi.html" class="text-white text-decoration-none mb-1">Kebijakan Privasi</a>
              <a href="../snk.html" class="text-white text-decoration-none mb-1">Kondisi dan Ketentuan</a>
            </div>
          </div>
    
          <!-- Pencari Kerja -->
          <div class="col-md-2">
            <h6 class="fw-bold">Pencari Kerja</h6>
            <div class="d-flex flex-column">
              <a href="../pelamar/daftarpekerja.php" class="text-white text-decoration-none mb-1">Registrasi Pencari Kerja</a>
              <a href="../pelamar/cari-loker.php" class="text-white text-decoration-none mb-1">Cari Lowongan Kerja</a>
              <a href="../artikel.html" class="text-white text-decoration-none mb-1">Tips Loker</a>
            </div>
          </div>
    
          <!-- Perusahaan -->
          <div class="col-md-3">
            <h6 class="fw-bold">Perusahaan</h6>
            <div class="d-flex flex-column">
              <a href="masukperusahaan.php" class="text-white text-decoration-none mb-1">Registrasi Perusahaan</a>
              <a href="pasang-loker.php" class="text-white text-decoration-none mb-1">Pasang Loker</a>
            </div>
          </div>
        </div>
    
        <!-- Copyright -->
        <div class="text-center mt-4 text-white small">
          <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
        </div>
      </div>
    </footer>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>