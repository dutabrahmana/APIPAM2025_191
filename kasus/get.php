<?php
include "../config/koneksi.php";

$query = mysqli_query($conn, "
    SELECT 
        k.*, 
        p.nama_penyakit
    FROM kasus k
    JOIN penyakit p ON k.id_penyakit = p.id_penyakit
    ORDER BY k.id_kasus DESC
");

$data = [];
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}

echo json_encode([
    "status" => "success",
    "data" => $data
]);
?>
