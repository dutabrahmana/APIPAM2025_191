<?php
header("Content-Type: application/json");
require "../config/koneksi.php";

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username == '' || $password == '') {
    echo json_encode([
        "status" => false,
        "message" => "Username dan password wajib diisi"
    ]);
    exit;
}

$query = mysqli_query(
    $conn,
    "SELECT * FROM admin WHERE username='$username' LIMIT 1"
);

if (mysqli_num_rows($query) == 0) {
    echo json_encode([
        "status" => false,
        "message" => "Username tidak terdaftar"
    ]);
    exit;
}

$data = mysqli_fetch_assoc($query);

// 🔐 CEK PASSWORD HASH
if (!password_verify($password, $data['password'])) {
    echo json_encode([
        "status" => false,
        "message" => "Password salah"
    ]);
    exit;
}

// ✅ LOGIN BERHASIL
echo json_encode([
    "status" => true,
    "message" => "Login berhasil",
    "data" => [
        "id_admin" => $data['id_admin'],
        "username" => $data['username'],
        "email" => $data['email']
    ]
]);
