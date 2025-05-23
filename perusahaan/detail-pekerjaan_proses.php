<?php
require '../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM posting_job WHERE ID_job = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        if ($data) {
            echo "<h1>" . htmlspecialchars($data['posisi']) . "</h1>";
            echo "<p>Perusahaan: " . htmlspecialchars($data['nama_perusahaan']) . "</p>";
            echo "<p>Lokasi: " . htmlspecialchars($data['lokasi']) . "</p>";
            echo "<p>Gaji: Rp" . number_format($data['gaji_min'], 0, ',', '.') . " - Rp" . number_format($data['gaji_max'], 0, ',', '.') . "</p>";
        } else {
            echo "Pekerjaan tidak ditemukan.";
        }
    } catch (PDOException $e) {
        echo "Terjadi kesalahan: " . $e->getMessage();
    }
} else {
    echo "ID pekerjaan tidak tersedia.";
}
?>