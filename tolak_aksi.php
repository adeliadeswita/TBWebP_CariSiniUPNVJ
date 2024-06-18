<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Tolak"])) {
    $kd_ajuan= $_POST["kd_ajuan"];

    $query = "UPDATE pengajuan SET status = 'Tertolak' WHERE kd_ajuan = '$kd_ajuan'";

    $result = mysqli_query($koneksi, $query);


    if ($result) {
        header("Location: verifikasi.php?message=Pengajuan dengan Kode Pengajuan <b>$kd_ajuan</b> berhasil ditolak");
    } else {
        header("Location: verifikasi.php?message=Penolakan gagal: " . mysqli_error($koneksi));
    }
}

mysqli_close($koneksi);
?>