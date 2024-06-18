<?php
session_start();
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["selesai"])) {
    $kd_ajuan = $_POST["kd_ajuan"];

    $query = "UPDATE pengajuan SET status = 'Selesai' WHERE kd_ajuan = '$kd_ajuan'";

    $result = mysqli_query($koneksi, $query);

    if($result) {
        $message = "Pengajuan dengan Kode Pengajuan <b>$kd_ajuan</b> berhasil diambil"; 
        $_SESSION["message"] = $message;
        header("Location: histori_admin.php"); 
    }else {
        die ("Query Error: ".mysqli_errno($koneksi)." - "
        .mysqli_error($koneksi)); 
    }
}
?>