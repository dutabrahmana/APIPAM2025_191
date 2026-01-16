<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_penyakit_menular"; // sesuaikan

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    header("Content-Type: application/json");
    echo json_encode([
        "status" => false,
        "message" => "Koneksi database gagal"
    ]);
    exit;
}
