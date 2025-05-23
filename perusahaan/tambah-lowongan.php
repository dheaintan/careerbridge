<?php
$show_success = isset($_GET['status']) && $_GET['status'] === 'berhasil';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Lowongan</title>
    <link rel="icon" type="image/x-icon" href="../logo%20careerbridge.png" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="../assets/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-decoration-none">
                <img src="../logo%20careerbridge.png" alt="CareerBridge" height="40" class="d-inline-block align-top" />
            </a>

            <div class="container my-4">
                <h3>Buat Lowongan Kerja</h3>
            </div>
        </div>
    </nav>

    <div class="container py-1 mb-5">
        <div class="card shadow rounded">
            <div class="card-body">
                <form method="POST" action="tambah-lowongan_proses.php" id="formLowongan">
                    <div class="mb-3">
                        <label for="posisi" class="form-label">Posisi</label>
                        <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Contoh: Frontend Developer" required style="border: 1px solid black;" />
                    </div>

                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi Kerja</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Contoh: Surabaya" required style="border: 1px solid black;" />
                    </div>

                    <div class="mb-3">
                        <label for="tipe_pekerjaan" class="form-label">Tipe Pekerjaan</label>
                        <select class="form-select" id="tipe_pekerjaan" name="tipe_pekerjaan" required style="border: 1px solid black;">
                            <option value="" disabled selected>Pilih tipe pekerjaan</option>
                            <option value="Fulltime">Full Time</option>
                            <option value="Parttime">Part Time</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jenjang_pendidikan" class="form-label">Pendidikan Terakhir</label>
                        <select class="form-select" id="jenjang_pendidikan" name="jenjang_pendidikan" required style="border: 1px solid black;">
                            <option value="" disabled selected>Pilih pendidikan terakhir</option>
                            <option value="SMA/SMK">SMA/SMK</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="level_pekerjaan" class="form-label">Level Pekerjaan</label>
                        <select class="form-select" id="level_pekerjaan" name="level_pekerjaan" required style="border: 1px solid black;">
                            <option value="" disabled selected>Pilih level</option>
                            <option value="Entry Level">Entry Level</option>
                            <option value="Junior">Junior</option>
                            <option value="Mid">Mid</option>
                            <option value="Senior">Senior</option>
                            <option value="Manager">Manager</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Rentang Gaji (Rp)</label>
                        <div class="row">
                            <div class="col">
                                <input type="number" class="form-control" name="gaji_min" placeholder="Minimal (Contoh penulisan: 3000000)" required style="border: 1px solid black;" />
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" name="gaji_max" placeholder="Maksimal (Contoh penulisan: 3000000)" required style="border: 1px solid black;" />
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi_loker" class="form-label">Deskripsi Pekerjaan</label>
                        <textarea class="form-control" id="deskripsi_loker" name="deskripsi_loker" rows="4" placeholder="Masukkan deskripsi pekerjaan, tanggung jawab pekerjaan, keahlian, jam kerja, dan lain-lain." required style="border: 1px solid black;"></textarea>
                    </div>

                    <button type="submit" class="btn text-dark" style="background-color: #E7F1A8;">Simpan Lowongan</button>
                </form>
            </div>
        </div>
    </div>

    <div class="text-center mb-3 text-dark small">
        <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
    </div>

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
        <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    Lowongan berhasil ditambahkan! Mengalihkan ke dashboard...
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <?php if ($show_success): ?>
    <script>
        window.onload = function () {
            const toastEl = document.getElementById('successToast');
            const toast = new bootstrap.Toast(toastEl);
            toast.show();

            setTimeout(() => {
                window.location.href = 'dashboard-perusahaan.php';
            }, 3000);
        };
    </script>
    <?php endif; ?>
</body>
</html>