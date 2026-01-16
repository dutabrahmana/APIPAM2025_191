<?php
include "../config/koneksi.php";

$query = "SELECT * FROM penyakit ORDER BY id_penyakit DESC";
$result = mysqli_query($conn, $query);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode([
    "status" => "success",
    "data" => $data
]);
?>
