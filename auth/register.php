<?php
header("Content-Type: application/json; charset=UTF-8");
require_once __DIR__ . "/../config/koneksi.php";

$username = trim($_POST['username'] ?? '');
$email    = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');
$no_hp    = trim($_POST['no_hp'] ?? '');

if ($username === '' || $email === '' || $password === '' || $no_hp === '') {
    echo json_encode([
        "status" => false,
        "message" => "Data tidak lengkap"
    ]);
    exit;
}

$cek = mysqli_query(
    $conn,
    "SELECT id_admin FROM admin WHERE username='$username' LIMIT 1"
);

if (mysqli_num_rows($cek) > 0) {
    echo json_encode([
        "status" => false,
        "message" => "Username sudah terdaftar"
    ]);
    exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);

$insert = mysqli_query(
    $conn,
    "INSERT INTO admin (username,email,password,no_hp)
     VALUES ('$username','$email','$hash','$no_hp')"
);

if ($insert) {
    echo json_encode([
        "status" => true,
        "message" => "Registrasi berhasil"
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Registrasi gagal"
    ]);
}
