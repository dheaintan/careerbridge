<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['ID_perusahaan'])) {
    header('Location: masukperusahaan.php');
    exit;
}

$id_perusahaan = $_SESSION['ID_perusahaan'];
$logo_filename = null;
$error_message = '';
$success_message = '';

try {
    $stmt = $pdo->prepare("SELECT nama_perusahaan, deskripsi_perusahaan, email, lokasi, logo_url FROM perusahaan WHERE ID_perusahaan = ?");
    $stmt->execute([$id_perusahaan]);
    $data = $stmt->fetch();

    if (!$data) {
        die("Data perusahaan tidak ditemukan.");
    }

    $nama = $data['nama_perusahaan'];
    $deskripsi = $data['deskripsi_perusahaan'];
    $email = $data['email'];
    $lokasi = $data['lokasi'];
    $logo_filename = $data['logo_url'];
} catch (PDOException $e) {
    die("Query gagal: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = htmlspecialchars(trim($_POST['nama_perusahaan']));
    $deskripsi = htmlspecialchars(trim($_POST['deskripsi_perusahaan']));
    $email = htmlspecialchars(trim($_POST['email_perusahaan']));
    $lokasi = htmlspecialchars(trim($_POST['lokasi_perusahaan']));

    // Validasi input
    if (empty($nama) || empty($deskripsi) || empty($email) || empty($lokasi)) {
        $error_message = "Semua field harus diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Format email tidak valid.";
    } else {
        // Penanganan upload logo
        $new_logo_filename = $logo_filename; // Default: gunakan logo lama
        if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
            $target_dir = "../uploads/logos/";
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0755, true);
            }

            // Validasi file
            $max_file_size = 2 * 1024 * 1024; // 2MB
            $allowed_types = ["jpg", "jpeg", "png", "gif"];
            $imageFileType = strtolower(pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION));

            // Verifikasi ukuran file
            if ($_FILES["logo"]["size"] > $max_file_size) {
                $error_message = "Ukuran file terlalu besar. Maksimal 2MB.";
            }
            // Verifikasi tipe file
            elseif (!in_array($imageFileType, $allowed_types)) {
                $error_message = "Hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.";
            }
            // Verifikasi bahwa file adalah gambar
            else {
                $check = getimagesize($_FILES["logo"]["tmp_name"]);
                if ($check === false) {
                    $error_message = "File yang diunggah bukan gambar.";
                }
            }

            if (empty($error_message)) {
                // Buat nama file unik menggunakan timestamp untuk menghindari konflik
                $new_logo_filename = "logo_" . $id_perusahaan . "_" . time() . "." . $imageFileType;
                $target_file = $target_dir . $new_logo_filename;

                // Hapus logo lama jika ada
                if ($logo_filename && file_exists($target_dir . $logo_filename)) {
                    unlink($target_dir . $logo_filename);
                }

                // Pindahkan file baru
                if (!move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
                    $error_message = "Terjadi kesalahan saat mengunggah logo.";
                }
            }
        }

        // Jika tidak ada error, update data di database
        if (empty($error_message)) {
            try {
                $query = "UPDATE perusahaan 
                          SET nama_perusahaan = :nama, deskripsi_perusahaan = :deskripsi, email = :email, lokasi = :lokasi";

                if ($new_logo_filename && $new_logo_filename !== $logo_filename) {
                    $query .= ", logo_url = :logo";
                }

                $query .= " WHERE ID_perusahaan = :id";

                $stmt = $pdo->prepare($query);
                $stmt->bindValue(':nama', $nama);
                $stmt->bindValue(':deskripsi', $deskripsi);
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':lokasi', $lokasi);
                if ($new_logo_filename && $new_logo_filename !== $logo_filename) {
                    $stmt->bindValue(':logo', $new_logo_filename);
                }
                $stmt->bindValue(':id', $id_perusahaan, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    // Update nama perusahaan di posting_job
                    $updateJob = $pdo->prepare("UPDATE posting_job SET nama_perusahaan = :nama WHERE ID_perusahaan = :id");
                    $updateJob->bindValue(':nama', $nama);
                    $updateJob->bindValue(':id', $id_perusahaan, PDO::PARAM_INT);
                    $updateJob->execute();

                    $success_message = "Profil perusahaan berhasil diperbarui.";
                    // Redirect setelah 2 detik untuk memberikan waktu melihat pesan sukses
                    header("Refresh: 2; URL=dashboard-perusahaan.php?status=sukses");
                } else {
                    $error_message = "Gagal update profil perusahaan.";
                }
            } catch (PDOException $e) {
                $error_message = "Error saat update: " . $e->getMessage();
            }
        }
    }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="../assets/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-decoration-none" href="#">
                <img src="../logo%20careerbridge.png" alt="CareerBridge" height="40" />
            </a>
            <div class="navbar-nav">
                <a class="nav-link" href="dashboard-perusahaan.php">Kembali ke Dashboard</a>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <h3 class="mb-4">Profil Perusahaan</h3>

        <?php if (!empty($error_message)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($success_message)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success_message; ?>
                <br>Mengalihkan ke dashboard dalam 2 detik...
            </div>
        <?php endif; ?>

        <div class="card shadow rounded p-4">
            <form action="editprofil-perusahaan.php" method="POST" enctype="multipart/form-data">
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

                <div class="mb-3">
                    <label for="logo" class="form-label">Upload Logo Perusahaan</label>
                    <input
                        class="form-control"
                        type="file"
                        id="logo"
                        name="logo"
                        accept=".jpg,.jpeg,.png,.gif"
                        style="border: 1px solid black;"
                    />
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti logo. Maksimal 2MB.</small>

                    <?php if ($logo_filename): ?>
                        <p class="mt-2">Logo saat ini: 
                        <a href="../uploads/logos/<?php echo htmlspecialchars($logo_filename); ?>" target="_blank">
                            <img src="../uploads/logos/<?php echo htmlspecialchars($logo_filename); ?>" alt="Logo Perusahaan" style="max-width: 100px;">
                        </a>
                        </p>
                    <?php else: ?>
                        <p class="mt-2 text-muted">Belum ada logo yang diupload.</p>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-success mb-3">Simpan Perubahan</button>
            </form>
        </div>
    </div>

    <div class="text-center mt-4 text-muted small">
        <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>