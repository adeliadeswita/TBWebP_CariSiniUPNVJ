<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["selesai"])) {
    $kd_ajuan = $_POST["kd_ajuan"];

    $query = "UPDATE pengajuan SET status = 'Selesai' WHERE kd_ajuan = '$kd_ajuan'";

    $result = mysqli_query($koneksi, $query);
    
    if ($result) {
        header("Location: histori_admin.php?message=Pengajuan dengan Kode Pengajuan <b>$kd_ajuan</b> berhasil diambil.");
    } else {
        $error_message = mysqli_error($koneksi);
        header("Location: histori_admin.php?message=Pengajuan gagal diambil: " . $error_message);
    }
}

mysqli_close($koneksi);
?>