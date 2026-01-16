<?php
include "../config/koneksi.php";

$id = $_POST['id_penyakit'];

$query = "DELETE FROM penyakit WHERE id_penyakit='$id'";

if (mysqli_query($conn, $query)) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error"]);
}
?>
