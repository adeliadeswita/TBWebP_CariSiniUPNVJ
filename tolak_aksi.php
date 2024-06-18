<?php
session_start();
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Tolak"])) {
    $kd_ajuan= $_POST["kd_ajuan"];

    $query = "UPDATE pengajuan SET status = 'Tertolak' WHERE kd_ajuan = '$kd_ajuan'";

    $result = mysqli_query($koneksi, $query);

    if($result) {
        $message = "Pengajuan dengan Kode Pengajuan <b>$kd_ajuan</b> berhasil ditolak"; 
        $_SESSION["message"] = $message;
        header("Location: verifikasi.php"); 
    }else {
        die ("Query Error: ".mysqli_errno($koneksi)." - "
        .mysqli_error($koneksi)); 
    }
}
?>