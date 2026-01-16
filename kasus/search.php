<?php
include "../config/koneksi.php";

$kota     = isset($_GET['kota']) ? $_GET['kota'] : '';
$tanggal  = isset($_GET['tanggal']) ? $_GET['tanggal'] : '';
$penyakit = isset($_GET['id_penyakit']) ? $_GET['id_penyakit'] : '';

$query = "
    SELECT k.*, p.nama_penyakit
    FROM kasus k
    JOIN penyakit p ON k.id_penyakit = p.id_penyakit
    WHERE 1=1
";

if ($kota != '') {
    $query .= " AND k.kota LIKE '%$kota%'";
}

if ($tanggal != '') {
    $query .= " AND k.tanggal_laporan = '$tanggal'";
}

if ($penyakit != '') {
    $query .= " AND k.id_penyakit = '$penyakit'";
}

$query .= " ORDER BY k.id_kasus DESC";

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
