<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Lowongan</title>
    <link rel="icon" type="image/x-icon" href="../logo%20careerbridge.png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../logo%20careerbridge.png" alt="CareerBridge" height="40">
            </a>
            <div class="container my-4">
                <h3>Daftar Lowongan</h3>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="d-flex justify-content-end align-items-center mb-4">
            <a href="tambah-lowongan.php" class="btn btn-primary">+ Tambah Lowongan</a>
        </div>
        <div class="container card shadow rounded pt-3 px-3">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Posisi</th>
                            <th>Lokasi</th>
                            <th>Tanggal Posting</th>
                            <th>Pelamar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>UI/UX Designer</td>
                            <td>Surabaya</td>
                            <td>01 April 2025</td>
                            <td>25</td>
                            <td>
                                <a href="lihat-pelamar.html" class="btn btn-sm btn-info">Lihat Lowongan</a>
                                <a href="edit-lowongan.php" class="btn btn-sm btn-warning">Edit Lowongan</a>
                            </td>
                        </tr>
                        <!-- Kamu bisa tambahkan baris lain di sini -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="text-center mt-4 text-white small">
        <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
