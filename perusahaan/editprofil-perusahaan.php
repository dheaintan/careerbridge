<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['ID_perusahaan'])) {
    echo "Silakan login terlebih dahulu";
    exit;
}

$id_perusahaan = $_SESSION['ID_perusahaan'];

try {
    $stmt = $pdo->prepare("SELECT nama_perusahaan, deskripsi_perusahaan, email, lokasi FROM perusahaan WHERE ID_perusahaan = ?");
    $stmt->execute([$id_perusahaan]);
    $data = $stmt->fetch();

    if (!$data) {
        die("Data perusahaan tidak ditemukan.");
    }
    
    $nama = $data['nama_perusahaan'];
    $deskripsi = $data['deskripsi_perusahaan'];
    $email = $data['email'];
    $lokasi = $data['lokasi'];
} catch (PDOException $e) {
    die("Query gagal: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Profil Perusahaan</title>
    <link rel="icon" type="image/x-icon" href="../logo%20careerbridge.png" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="../assets/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-decoration-none" href="#">
                <img src="../logo%20careerbridge.png" alt="CareerBridge" height="40" />
            </a>
            <div class="container my-4">
                <h3>Profil Perusahaan</h3>
            </div>
        </div>
    </nav>

    <div class="container card shadow rounded pt-3 px-3">
        <form action="editprofil-perusahaan_proses.php" method="POST">
            <div class="mb-3">
                <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                <input
                    type="text"
                    class="form-control"
                    id="nama_perusahaan"
                    name="nama_perusahaan"
                    value="<?php echo htmlspecialchars($nama); ?>"
                    placeholder="PT. Tech Global"
                    required
                    style="border: 1px solid black;"
                />
            </div>

            <div class="mb-3">
                <label for="deskripsi_perusahaan" class="form-label">Deskripsi Perusahaan</label>
                <textarea
                    class="form-control"
                    id="deskripsi_perusahaan"
                    name="deskripsi_perusahaan"
                    rows="3"
                    placeholder="Deskripsikan perusahaan Anda secara singkat"
                    required
                    style="border: 1px solid black;"
                ><?php echo htmlspecialchars($deskripsi); ?></textarea>
            </div>

            <div class="mb-3">
                <label for="email_perusahaan" class="form-label">Email Perusahaan</label>
                <input
                    type="email"
                    class="form-control"
                    id="email_perusahaan"
                    name="email_perusahaan"
                    value="<?php echo htmlspecialchars($email); ?>"
                    placeholder="techglobal@example.com"
                    required
                    style="border: 1px solid black;"
                />
            </div>

            <div class="mb-3">
                <label for="lokasi_perusahaan" class="form-label">Lokasi Perusahaan</label>
                <textarea
                    class="form-control"
                    id="lokasi_perusahaan"
                    name="lokasi_perusahaan"
                    rows="3"
                    placeholder="Tuliskan lokasi perusahaan Anda"
                    required
                    style="border: 1px solid black;"
                ><?php echo htmlspecialchars($lokasi); ?></textarea>
            </div>

            <button type="submit" class="btn btn-success mb-3">Simpan Perubahan</button>
        </form>
    </div>

    <div class="text-center mt-4 text-muted small">
        <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>