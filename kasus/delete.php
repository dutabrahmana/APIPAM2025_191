<?php
include "../config/koneksi.php";

$id_kasus = $_POST['id_kasus'];

$query = mysqli_query($conn, "
    DELETE FROM kasus WHERE id_kasus = '$id_kasus'
");

if ($query) {
    echo json_encode([
        "status" => "success",
        "message" => "Data kasus berhasil dihapus"
    ]);
} else {
    echo json_encode([
        "status" => "failed",
        "message" => "Gagal menghapus data kasus"
    ]);
}
?>
