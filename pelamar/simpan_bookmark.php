<?php
session_start();

if (!isset($_SESSION['ID_user'])) {
    echo "User tidak login!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ID_job = $_POST['ID_job'];
    $ID_user = $_POST['ID_user'];

    if (empty($ID_job) || empty($ID_user)) {
        echo "Data tidak valid!";
        exit;
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "careerbridge";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO simpan_loker (ID_user, ID_job) VALUES ('$ID_user', '$ID_job')";
    if ($conn->query($sql) === TRUE) {
        echo "Pekerjaan berhasil disimpan!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $cek = $conn->prepare("SELECT * FROM simpan_loker WHERE ID_user = ? AND ID_job = ?");
    $cek->bind_param("ii", $ID_user, $ID_job);
    $cek->execute();
    $cek_result = $cek->get_result();

    if ($cek_result->num_rows > 0) {
        echo "Lowongan sudah pernah disimpan!";
        exit;
    }

    $conn->close();
}
?>
