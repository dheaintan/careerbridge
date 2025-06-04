<?php
include 'koneksi.php';

if (!isset($pdo) || is_null($pdo)) {
    echo json_encode(['error' => 'Koneksi database gagal']);
    exit;
}

$term = isset($_GET['term']) ? trim($_GET['term']) : '';

if (empty($term)) {
    echo json_encode([]);
    exit;
}

try {
    $query = "
        SELECT DISTINCT posisi 
        FROM posting_job 
        WHERE posisi LIKE :term 
        AND status_lowongan = 'buka'
        LIMIT 10
    ";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['term' => "%$term%"]);
    $results = $stmt->fetchAll(PDO::FETCH_COLUMN);

    echo json_encode($results);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Query gagal: ' . $e->getMessage()]);
}