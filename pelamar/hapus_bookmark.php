<?php
session_start();
require '../koneksi.php';

header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

error_log('hapus_bookmark.php dijalankan');

if (!isset($_SESSION['ID_user'])) {
    $response['message'] = 'Anda harus login terlebih dahulu.';
    error_log('Sesi ID_user tidak ada: ' . json_encode($_SESSION));
    echo json_encode($response);
    exit;
}

$ID_user = $_SESSION['ID_user'];
$id_simpan = isset($_POST['id_simpan']) ? intval($_POST['id_simpan']) : 0;

error_log('Data POST diterima: id_simpan=' . $id_simpan);

if ($id_simpan <= 0) {
    $response['message'] = 'ID bookmark tidak valid.';
    error_log('ID bookmark tidak valid: id_simpan=' . $id_simpan);
    echo json_encode($response);
    exit;
}

try {
    $query = "SELECT * FROM simpan_loker WHERE ID_simpan = :id_simpan AND ID_user = :id_user";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id_simpan' => $id_simpan, 'id_user' => $ID_user]);

    if ($stmt->rowCount() === 0) {
        $response['message'] = 'Bookmark tidak ditemukan atau bukan milik Anda.';
        error_log('Bookmark tidak ditemukan: ID_simpan=' . $id_simpan . ', ID_user=' . $ID_user);
        echo json_encode($response);
        exit;
    }

    $query = "DELETE FROM simpan_loker WHERE ID_simpan = :id_simpan";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id_simpan' => $id_simpan]);

    $response['success'] = true;
    $response['message'] = 'Bookmark berhasil dihapus.';
    error_log('Bookmark berhasil dihapus: ID_simpan=' . $id_simpan);
} catch (PDOException $e) {
    $response['message'] = 'Gagal menghapus bookmark: ' . $e->getMessage();
    error_log('Hapus Bookmark Error: ' . $e->getMessage());
}

echo json_encode($response);
?>