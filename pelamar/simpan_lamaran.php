<?php
session_start();
require '../koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'pelamar') {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Hanya pelamar yang dapat mengajukan lamaran.']);
    exit;
}

header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

error_log('simpan_lamaran.php dijalankan');

error_log('Sesi saat ini: ' . json_encode($_SESSION));

if (!isset($_SESSION['ID_user'])) {
    $response['message'] = 'Anda harus login terlebih dahulu.';
    error_log('Sesi ID_user tidak ada: ' . json_encode($_SESSION));
    echo json_encode($response);
    exit;
}

$ID_user = $_SESSION['ID_user'];
$job_id = isset($_POST['job_id']) ? intval($_POST['job_id']) : 0;

error_log('Data POST diterima: job_id=' . $job_id);

if ($job_id <= 0) {
    $response['message'] = 'ID lowongan tidak valid.';
    error_log('ID lowongan tidak valid: job_id=' . $job_id);
    echo json_encode($response);
    exit;
}

try {
    $query = "SELECT ID_job FROM posting_job WHERE ID_job = :id_job";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id_job' => $job_id]);
    if ($stmt->rowCount() === 0) {
        $response['message'] = 'Lowongan tidak ditemukan.';
        error_log('Lowongan tidak ditemukan: ID_job=' . $job_id);
        echo json_encode($response);
        exit;
    }

    $query = "SELECT * FROM apply_job WHERE ID_user = :id_user AND ID_job = :id_job";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id_user' => $ID_user, 'id_job' => $job_id]);

    if ($stmt->rowCount() > 0) {
        $response['message'] = 'Anda sudah melamar lowongan ini.';
        error_log('Pengguna sudah melamar: ID_user=' . $ID_user . ', ID_job=' . $job_id);
        echo json_encode($response);
        exit;
    }

    $query = "INSERT INTO apply_job (ID_user, ID_job, status_lamaran) VALUES (:id_user, :id_job, 'pending')";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id_user' => $ID_user, 'id_job' => $job_id]);

    $response['success'] = true;
    $response['message'] = 'Lamaran berhasil dikirim.';
    error_log('Lamaran berhasil disimpan: ID_user=' . $ID_user . ', ID_job=' . $job_id);
} catch (PDOException $e) {
    $response['message'] = 'Gagal menyimpan lamaran: ' . $e->getMessage();
    error_log('Apply Error: ' . $e->getMessage());
}

echo json_encode($response);
?>