<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Pencari Kerja</title>
    <link rel="icon" type="image/x-icon" href="../logo%20careerbridge.png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@700&display=swap" rel="stylesheet">
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
    <script>
        function submitLoginForm() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "masukpekerja_proses.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function() {
                if (xhr.status == 200) {
                    alert("Login berhasil");
                    // Tindak lanjut jika login berhasil
                } else {
                    alert("Login gagal");
                }
            };
            xhr.send("username=" + username + "&password=" + password);
        }
    </script>
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
                    <a class="nav-link active" aria-current="page" href="cari-loker.php" style="font-family: 'Inter', sans-serif;">Cari Lowongan Kerja</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../perusahaan/pasang-loker.php" style="font-family: 'Inter', sans-serif;">Pasang Lowongan</a>
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
        <!-- Gambar latar belakang -->
        <div style="background-image: url('../header.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0.4; z-index: 1;">
        </div>
      
        <!-- Teks di atas gambar -->
        <div class="container text-dark position-relative" style="z-index: 2; padding-top: 80px;">
          <h3 class="fw-bold">Masuk</h3>
          <p>Beranda > Masuk > Buat Akun Baru</p>
        </div>
    </div>

    <div class="container mt-5 mb-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h4 class="text-center fw-bold mb-4">Daftar sebagai Pencari Kerja</h4>

          <form action="daftarpekerja_proses.php" method="POST" novalidate>
            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email" required autocomplete="email" placeholder="Masukkan email" style="border: 1px solid black;" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password" placeholder="Masukkan kata sandi" style="border: 1px solid black;">
            </div>

            <div class="mb-3">
                <label for="passwordVerify" class="form-label">Konfirmasi Kata Sandi <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="passwordVerify" name="passwordVerify" required autocomplete="new-password" placeholder="Ulangi kata sandi" style="border: 1px solid black;">
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="showPassword" onclick="togglePasswordVisibility()">
                <label class="form-check-label" for="showPassword">Tampilkan Kata Sandi</label>
            </div>

            <div class="text-center">
                <button type="submit" class="btn text-dark" style="background-color: #E7F1A8;">Daftar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <footer class="text-white py-5" style="background-color: #364c84;">
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
                <a href="daftarpekerja.php" class="text-white text-decoration-none mb-1">Registrasi Pencari Kerja</a>
                <a href="cari-loker.php" class="text-white text-decoration-none mb-1">Cari Lowongan Kerja</a>
                <a href="../artikel.html" class="text-white text-decoration-none mb-1">Tips Loker</a>
              </div>
            </div>
      
            <!-- Perusahaan -->
            <div class="col-md-3">
              <h6 class="fw-bold">Perusahaan</h6>
              <div class="d-flex flex-column">
                <a href="../perusahaan/masukperusahaan.php" class="text-white text-decoration-none mb-1">Registrasi Perusahaan</a>
                <a href="../perusahaan/pasang-loker.php" class="text-white text-decoration-none mb-1">Pasang Loker</a>
              </div>
            </div>
          </div>
      
          <!-- Copyright -->
          <div class="text-center mt-4 text-white small">
            <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
          </div>
        </div>
    </footer>

    <script>
      function togglePasswordVisibility() {
      var passwordInput = document.getElementById("password");
      var passwordVerifyInput = document.getElementById("passwordVerify");
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        passwordVerifyInput.type = "text";
      } else {
        passwordInput.type = "password";
        passwordVerifyInput.type = "password";
      }
      }
    </script>
    
</body>
</html>
