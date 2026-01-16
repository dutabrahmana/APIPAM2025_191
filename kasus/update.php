<?php
include "../config/koneksi.php";

$id_kasus                 = $_POST['id_kasus'];
$id_penyakit              = $_POST['id_penyakit'];
$kelurahan                = $_POST['kelurahan'];
$kecamatan                = $_POST['kecamatan'];
$kota                     = $_POST['kota'];
$tanggal_laporan          = $_POST['tanggal_laporan'];
$jumlah_kasus_baru        = $_POST['jumlah_kasus_baru'];
$jumlah_dalam_perawatan   = $_POST['jumlah_dalam_perawatan'];
$jumlah_sembuh            = $_POST['jumlah_sembuh'];
$jumlah_meninggal         = $_POST['jumlah_meninggal'];
$catatan                  = $_POST['catatan'];

$query = mysqli_query($conn, "
    UPDATE kasus SET
        id_penyakit = '$id_penyakit',
        kelurahan = '$kelurahan',
        kecamatan = '$kecamatan',
        kota = '$kota',
        tanggal_laporan = '$tanggal_laporan',
        jumlah_kasus_baru = '$jumlah_kasus_baru',
        jumlah_dalam_perawatan = '$jumlah_dalam_perawatan',
        jumlah_sembuh = '$jumlah_sembuh',
        jumlah_meninggal = '$jumlah_meninggal',
        catatan = '$catatan',
        updated_at = NOW()
    WHERE id_kasus = '$id_kasus'
");

if ($query) {
    echo json_encode([
        "status" => "success",
        "message" => "Data kasus berhasil diupdate"
    ]);
} else {
    echo json_encode([
        "status" => "failed",
        "message" => "Gagal update data kasus"
    ]);
}
?>
