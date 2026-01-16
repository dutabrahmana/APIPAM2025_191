<?php
include "../config/koneksi.php";

$keyword = $_GET['keyword'];

$query = "SELECT * FROM penyakit 
          WHERE nama_penyakit LIKE '%$keyword%'
          OR kategori LIKE '%$keyword%'
          ORDER BY id_penyakit DESC";

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
