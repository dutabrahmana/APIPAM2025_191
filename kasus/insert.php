<?php
header("Content-Type: application/json");
include "../config/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        "status" => "failed",
        "message" => "Method harus POST"
    ]);
    exit;
}

$required = [
    'id_penyakit',
    'kelurahan',
    'kecamatan',
    'kota',
    'tanggal_laporan',
    'jumlah_kasus_baru',
    'jumlah_dalam_perawatan',
    'jumlah_sembuh',
    'jumlah_meninggal',
    'catatan'
];

foreach ($required as $field) {
    if (!isset($_POST[$field])) {
        echo json_encode([
            "status" => "failed",
            "message" => "Field $field tidak ada"
        ]);
        exit;
    }
}

$id_penyakit = $_POST['id_penyakit'];
$kelurahan   = $_POST['kelurahan'];
$kecamatan   = $_POST['kecamatan'];
$kota        = $_POST['kota'];
$tanggal     = $_POST['tanggal_laporan'];
$baru        = $_POST['jumlah_kasus_baru'];
$dirawat     = $_POST['jumlah_dalam_perawatan'];
$sembuh      = $_POST['jumlah_sembuh'];
$meninggal   = $_POST['jumlah_meninggal'];
$catatan     = $_POST['catatan'];

$query = mysqli_query($conn, "
    INSERT INTO kasus (
        id_penyakit, kelurahan, kecamatan, kota, tanggal_laporan,
        jumlah_kasus_baru, jumlah_dalam_perawatan, jumlah_sembuh, jumlah_meninggal,
        catatan, created_at
    ) VALUES (
        '$id_penyakit','$kelurahan','$kecamatan','$kota','$tanggal',
        '$baru','$dirawat','$sembuh','$meninggal','$catatan', NOW()
    )
");

if ($query) {
    echo json_encode([
        "status" => "success",
        "message" => "Data kasus berhasil ditambahkan"
    ]);
} else {
    echo json_encode([
        "status" => "failed",
        "message" => mysqli_error($conn)
    ]);
}
