<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Perusahaan</title>
    <link rel="icon" type="image/x-icon" href="../logo%20careerbridge.png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@700&display=swap" rel="stylesheet">
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-decoration-none">
                <img src="../logo%20careerbridge.png" alt="CareerBridge" height="40" class="d-inline-block align-top">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo02"aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
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
            </div>
        </div>
    </nav>

    <div style="width: 100%; height: 2px; background-color: black;"></div>

    <div class="position-relative" style="height: 250px;">
        <div style="background-image: url('../header.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0.4; z-index: 1;">
        </div>

        <div class="container text-dark position-relative" style="z-index: 2; padding-top: 80px;">
          <h3 class="fw-bold">Masuk</h3>
          <p>Beranda > Masuk > Buat Akun Baru Perusahaan</p>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h4 class="text-center fw-bold mb-4">Daftar sebagai Perusahaan</h4>

                <form action="daftarperusahaan-proses.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" required style="border: 1px solid black;" placeholder="Masukkan email">
                    </div>
                
                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" required style="border: 1px solid black;" placeholder="Masukkan kata sandi">
                    </div>

                    <div class="mb-3">
                        <label for="passwordVerify" class="form-label">Konfirmasi Kata Sandi <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="passwordVerify" name="passwordVerify" required style="border: 1px solid black;" placeholder="Ulangi kata sandi">
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="showPassword">
                        <label class="form-check-label" for="showPassword">Tampilkan Kata Sandi</label>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn text-dark" style="background-color: #E7F1A8;">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="text-dark py-5" style="background-color: #364c84;">
        <div class="container">
          <div class="row">
            <!-- Logo dan Deskripsi -->
            <div class="col-md-5">
              <div class="d-flex align-items-start mb-3">
                <img src="../logo%20careerbridge.png" alt="CareerBridge" height="100" class="d-inline-block align-top">
              </div>
              <p class="text-white" style="max-width: 500px;">
                CareerBridge adalah platform yang membantu pencari kerja menemukan pekerjaan yang tepat dan memudahkan perusahaan dalam merekrut karyawan. Dengan sistem yang mudah digunakan, CareerBridge membuat proses mencari kerja dan perekrutan menjadi lebih cepat dan efisien.
              </p>
            </div>
      
            <!-- Tentang Kami -->
            <div class="col-md-2">
              <h6 class="fw-bold text-white">Tentang Kami</h6>
              <div class="d-flex flex-column">
                <a href="../pusatbantuan.html" class="text-white text-decoration-none mb-1">Pusat Bantuan</a>
                <a href="../kebijakanprivasi.html" class="text-white text-decoration-none mb-1">Kebijakan Privasi</a>
                <a href="../snk.html" class="text-white text-decoration-none mb-1">Kondisi dan Ketentuan</a>
              </div>
            </div>
      
            <!-- Pencari Kerja -->
            <div class="col-md-2">
              <h6 class="fw-bold text-white">Pencari Kerja</h6>
              <div class="d-flex flex-column">
                <a href="../pelamar/daftarpekerja.php" class="text-white text-decoration-none mb-1">Registrasi Pencari Kerja</a>
                <a href="../pelamar/cari-loker.php" class="text-white text-decoration-none mb-1">Cari Lowongan Kerja</a>
                <a href="../artikel.html" class="text-white text-decoration-none mb-1">Tips Loker</a>
              </div>
            </div>
      
            <!-- Perusahaan -->
            <div class="col-md-3">
              <h6 class="fw-bold text-white">Perusahaan</h6>
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

    <script>document.getElementById('showPassword').addEventListener('change', function () {
      const pw = document.getElementById('password');
      const pwVerify = document.getElementById('passwordVerify');
      const type = this.checked ? 'text' : 'password';pw.type = type; pwVerify.type = type;});
    </script>
</body>
</html>
    
