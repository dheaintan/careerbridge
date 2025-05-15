<?php
// koneksi.php
$host = 'localhost';
$db   = 'careerbridge';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // aktifin exception biar errornya gampang nangkep
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // biar default fetch pake assoc array
        PDO::ATTR_EMULATE_PREPARES => false, // biar prepared statement asli (bukan emulate)
    ]);
} catch (PDOException $e) {
    // Kalau koneksi gagal, langsung stop dan kasih info error yang jelas
    die("Koneksi database gagal: " . $e->getMessage());
}
