<?php
session_start();
require '../koneksi.php';

header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

if (!isset($_SESSION['ID_user'])) {
    $response['message'] = 'Anda harus login terlebih dahulu.';
    echo json_encode($response);
    exit;
}

$ID_user = $_SESSION['ID_user'];
$job_id = isset($_POST['job_id']) ? intval($_POST['job_id']) : 0;

if ($job_id <= 0) {
    $response['message'] = 'ID lowongan tidak valid.';
    echo json_encode($response);
    exit;
}

try {
    $query = "SELECT * FROM simpan_loker WHERE ID_user = :id_user AND ID_job = :id_job";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id_user' => $ID_user, 'id_job' => $job_id]);

    if ($stmt->rowCount() > 0) {
        $response['message'] = 'Lowongan ini sudah di-bookmark.';
        echo json_encode($response);
        exit;
    }

    $query = "INSERT INTO simpan_loker (ID_user, ID_job) VALUES (:id_user, :id_job)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id_user' => $ID_user, 'id_job' => $job_id]);

    $response['success'] = true;
    $response['message'] = 'Bookmark berhasil disimpan.';
} catch (PDOException $e) {
    $response['message'] = 'Gagal menyimpan bookmark: ' . $e->getMessage();
    error_log('Bookmark Error: ' . $e->getMessage());
}

echo json_encode($response);
?>