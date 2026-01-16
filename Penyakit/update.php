<?php
include "../config/koneksi.php";

$id          = $_POST['id_penyakit'];
$nama        = $_POST['nama_penyakit'];
$kategori    = $_POST['kategori'];
$gejala      = $_POST['gejala'];
$penularan   = $_POST['cara_penularan'];
$keparahan   = $_POST['tingkat_keparahan'];
$deskripsi   = $_POST['deskripsi'];

$query = "UPDATE penyakit SET
    nama_penyakit='$nama',
    kategori='$kategori',
    gejala='$gejala',
    cara_penularan='$penularan',
    tingkat_keparahan='$keparahan',
    deskripsi='$deskripsi',
    updated_at=NOW()
WHERE id_penyakit='$id'";

if (mysqli_query($conn, $query)) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error"]);
}
?>
