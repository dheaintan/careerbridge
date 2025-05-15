<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Saya</title>
    <link rel="icon" type="image/x-icon" href="../logo%20careerbridge.png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-decoration-none">
                <img src="../logo%20careerbridge.png" alt="CareerBridge" height="40" class="d-inline-block align-top">
            </a>

            <div class="container my-4">
                <h3>Profil Saya</h3>
            </div>
        </div>
    </nav>

    <div class="container card shadow rounded pt-3 px-3">
      <form action="#" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" required style="border: 1px solid black;">
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Alamat Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email aktif" required style="border: 1px solid black;">
        </div>

        <div class="mb-3">
          <label for="telepon" class="form-label">No. Telepon</label>
          <input type="text" class="form-control" id="telepon" name="telepon" placeholder="08xxxxxxxxxx" required style="border: 1px solid black;">
        </div>

        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea class="form-control" id="alamat" name="alamat" rows="2" placeholder="Masukkan alamat lengkap" required style="border: 1px solid black;"></textarea>
        </div>

        <div class="mb-3">
          <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
          <select class="form-select" id="pendidikan" name="pendidikan" required style="border: 1px solid black;">
            <option value="" disabled selected>Pilih pendidikan terakhir</option>
            <option value="SMA/SMK">SMA/SMK</option>
            <option value="D3">D3</option>
            <option value="S1">S1</option>
            <option value="S2">S2</option>
            <option value="S3">S3</option>
          </select>
        </div>

          <div class="mb-3">
              <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
              <select class="form-select" id="pendidikan" name="pendidikan" required style="border: 1px solid black;">
              <option value="" disabled selected>Pilih pendidikan terakhir</option>
              <option value="SMA/SMK">SMA/SMK</option>
              <option value="D3">D3</option>
              <option value="S1">S1</option>
              <option value="S2">S2</option>
              <option value="S3">S3</option>
              </select>
          </div>

          <div class="mb-3">
              <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
              <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required style="border: 1px solid black;">
                  <option value="" disabled selected>Pilih jenis kelamin</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
              </select>
          </div>

          <div class="mb-3">
              <label for="cv" class="form-label">Upload CV</label>
              <input class="form-control" type="file" id="cv" name="cv" accept=".pdf,.doc,.docx" style="border: 1px solid black;">
          </div>

        <button type="submit" class="btn btn-success mb-3">Simpan Perubahan</button>
      </form>
    </div>

  <div class="text-center mt-4 mb-4 text-muted small">
    <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
  </div>

</body>
</html>
