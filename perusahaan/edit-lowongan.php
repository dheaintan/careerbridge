<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['ID_perusahaan'])) {
    echo "Silakan login terlebih dahulu.";
    exit;
}

$id_perusahaan = $_SESSION['ID_perusahaan'];

if (!isset($_GET['ID_job'])) {
    echo "ID lowongan tidak ditemukan.";
    exit;
}

$id_job = $_GET['ID_job'];

try {
    $stmt = $pdo->prepare("SELECT * FROM posting_job WHERE ID_job = ? AND ID_perusahaan = ?");
    $stmt->execute([$id_job, $id_perusahaan]);
    $lowongan = $stmt->fetch();

    if (!$lowongan) {
        echo "Lowongan tidak ditemukan.";
        exit;
    }
} catch (PDOException $e) {
    die("Query gagal: " . $e->getMessage());
}
?>

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
                <img src="../logo%20careerbridge.png" alt="CareerBridge" height="40" class="d-inline-block align-top" />
            </a>
            <div class="container my-4">
                <h3>Edit Lowongan</h3>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <div class="card shadow rounded p-4">
            <form action="edit-lowongan_proses.php" method="POST">
                <input type="hidden" name="id_job" value="<?= htmlspecialchars($lowongan['ID_job']); ?>">

                <div class="mb-3">
                    <label for="posisi" class="form-label">Posisi</label>
                    <input type="text" class="form-control" id="posisi" name="posisi"
                        value="<?= htmlspecialchars($lowongan['posisi']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi Kerja</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi"
                        value="<?= htmlspecialchars($lowongan['lokasi']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="tipe_pekerjaan" class="form-label">Tipe Pekerjaan</label>
                    <select class="form-select" id="tipe_pekerjaan" name="tipe_pekerjaan" required>
                        <option disabled value="">Pilih tipe pekerjaan</option>
                        <option value="Fulltime" <?= $lowongan['tipe_pekerjaan'] == 'Fulltime' ? 'selected' : ''; ?>>Full Time</option>
                        <option value="Parttime" <?= $lowongan['tipe_pekerjaan'] == 'Parttime' ? 'selected' : ''; ?>>Part Time</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jenjang_pendidikan" class="form-label">Pendidikan Terakhir</label>
                    <select class="form-select" id="jenjang_pendidikan" name="jenjang_pendidikan" required>
                        <option disabled value="">Pilih pendidikan terakhir</option>
                        <?php
                        $jenjang = ['SMA/SMK', 'D3', 'S1', 'S2', 'S3'];
                        foreach ($jenjang as $j) {
                            $selected = $lowongan['jenjang_pendidikan'] == $j ? 'selected' : '';
                            echo "<option value='$j' $selected>$j</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="level_pekerjaan" class="form-label">Level Pekerjaan</label>
                    <select class="form-select" id="level_pekerjaan" name="level_pekerjaan" required>
                        <option disabled value="">Pilih level</option>
                        <?php
                        $level = ['Entry Level', 'Junior', 'Mid', 'Senior', 'Manager'];
                        foreach ($level as $l) {
                            $selected = $lowongan['level_pekerjaan'] == $l ? 'selected' : '';
                            echo "<option value='$l' $selected>$l</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Rentang Gaji (Rp)</label>
                    <div class="row">
                        <div class="col">
                            <input type="number" class="form-control" name="gaji_min"
                                value="<?= htmlspecialchars($lowongan['gaji_min']); ?>" placeholder="Minimal" required>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="gaji_max"
                                value="<?= htmlspecialchars($lowongan['gaji_max']); ?>" placeholder="Maksimal" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="deskripsi_loker" class="form-label">Deskripsi Pekerjaan</label>
                    <textarea class="form-control" id="deskripsi_loker" name="deskripsi_loker" rows="4" required><?= htmlspecialchars($lowongan['deskripsi_loker']); ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="tanggal_posting" class="form-label">Tanggal Posting</label>
                    <input type="date" class="form-control" id="tanggal_posting" name="tanggal_posting"
                        value="<?= htmlspecialchars(date('Y-m-d', strtotime($lowongan['tanggal_posting']))); ?>" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            </form>
            <?php if (isset($success) && $success): ?>
                <script>
                    alert("Lowongan berhasil diperbarui!");
                </script>
            <?php endif; ?>
        </div>
    </div>

    <div class="text-center mb-3 text-dark small">
        <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>