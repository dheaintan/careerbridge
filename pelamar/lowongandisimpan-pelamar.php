<?php
session_start();

if (!isset($_SESSION['ID_user'])) {
    header('Location: masukpekerja.php');
    exit();
}

$ID_user = $_SESSION['ID_user'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "careerbridge";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

$sql = "SELECT simpan_loker.ID_job, posting_job.posisi, posting_job.nama_perusahaan, posting_job.lokasi, posting_job.tanggal_posting
        FROM simpan_loker
        JOIN posting_job ON simpan_loker.ID_job = posting_job.ID_job
        WHERE simpan_loker.ID_user = :ID_user
        ORDER BY simpan_loker.created_at DESC";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':ID_user', $ID_user, PDO::PARAM_INT);

$stmt->execute();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lowongan Disimpan</title>
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
                <h3>Lowongan Disimpan</h3>
            </div>
        </div>
    </nav>

  <!-- Konten -->
  <div class="container my-5">
    <div class="row g-4">
      <?php
            // Menampilkan setiap lowongan yang dibookmark
            $lowongan = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($lowongan) {
                foreach ($lowongan as $row) {
                    $id_job = $row['ID_job'];
                    $posisi = $row['posisi'];
                    $nama_perusahaan = $row['nama_perusahaan'];
                    $lokasi = $row['lokasi'];
                    $tanggal_posting = date("d F Y", strtotime($row['tanggal_posting']));
                    echo "
                    <div class='col-md-6'>
                        <div class='card shadow-sm'>
                            <div class='card-body'>
                                <h5 class='card-title'>$posisi</h5>
                                <p class='card-text'>$nama_perusahaan • $lokasi</p>
                                <p class='text-muted mb-1'>Disimpan pada: $tanggal_posting</p>
                                <a href='lowongan_detail.php?id=$id_job' class='btn btn-primary btn-sm'>Lihat Lowongan</a>
                                <a href='hapus_bookmark.php?id=$id_job' class='btn btn-outline-danger btn-sm'>Hapus</a>
                            </div>
                        </div>
                    </div>";
                }
            } else {
                echo "<p class='text-center'>Tidak ada lowongan yang dibookmark.</p>";
            }
            ?>

    </div>
  </div>

  <div class="text-center mt-4 text-muted small">
    <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
  </div>
</body>
</html>
