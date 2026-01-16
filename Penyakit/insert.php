<?php
include "../config/koneksi.php";

$nama        = $_POST['nama_penyakit'];
$kategori    = $_POST['kategori'];
$gejala      = $_POST['gejala'];
$penularan   = $_POST['cara_penularan'];
$keparahan   = $_POST['tingkat_keparahan'];
$deskripsi   = $_POST['deskripsi'];

$query = "INSERT INTO penyakit 
(nama_penyakit, kategori, gejala, cara_penularan, tingkat_keparahan, deskripsi)
VALUES
('$nama', '$kategori', '$gejala', '$penularan', '$keparahan', '$deskripsi')";

if (mysqli_query($conn, $query)) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => mysqli_error($conn)
    ]);
}
?>
