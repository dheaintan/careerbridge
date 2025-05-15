<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Lowongan</title>
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
                <h3>Edit Lowongan</h3>
            </div>
        </div>
    </nav>

    <div class="container card shadow rounded pt-3 px-3">
        <h4 class="mb-4">Frontend Developer</h4>
        <form>
            <div class="mb-3">
                <label for="judulLowongan" class="form-label">Judul Lowongan</label>
                <input type="text" class="form-control" id="judulLowongan" style="border: 1px solid black;" value="Frontend Developer">
            </div>

            <div class="mb-3">
                <label for="deskripsiPekerjaan" class="form-label">Deskripsi Pekerjaan</label>
                <textarea class="form-control" id="deskripsiPekerjaan" rows="5" style="border: 1px solid black;">Bertanggung jawab membangun dan memelihara tampilan antarmuka aplikasi web.</textarea>
            </div>

            <div class="mb-3">
                <label for="lokasiKerja" class="form-label">Lokasi Kerja</label>
                <input type="text" class="form-control" id="lokasiKerja" style="border: 1px solid black;" value="Surabaya, Jawa Timur">
            </div>

            <div class="mb-3">
                <label for="tipePekerjaan" class="form-label">Tipe Pekerjaan</label>
                <select class="form-select" style="border: 1px solid black;" id="tipePekerjaan">
                    <option value="Full-time" selected>Full-time</option>
                    <option value="Part-time">Part-time</option>
                    <option value="Internship">Magang</option>
                    <option value="Freelance">Freelance</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Rentang Gaji (Rp)</label>
                <div class="row">
                    <div class="col">
                        <input type="number" class="form-control" name="gaji_min" placeholder="Minimal (Contoh penulisan: 3000000)" style="border: 1px solid black;">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" name="gaji_max" placeholder="Maksimal (Contoh penulisan: 3000000)" style="border: 1px solid black;">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="kualifikasi" class="form-label">Kualifikasi</label>
                <textarea class="form-control" id="kualifikasi" rows="4" style="border: 1px solid black;">Minimal 1 tahun pengalaman di bidang frontend. Menguasai HTML, CSS, dan JavaScript.</textarea>
            </div>

            <div class="d-flex justify-content-between mb-3">
                <a href="dashboard-perusahaan.php" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>

    <div class="text-center mt-4 text-white small">
        <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
