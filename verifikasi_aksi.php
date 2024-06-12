<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["verifikasi"])) {
    $username = $_POST["username"];

    $query = "UPDATE pengajuan SET status = 'Terverifikasi' WHERE username = $username";

    $result = mysqli_query($koneksi, $query);


    if ($result) {
        header("Location: verifikasi.php?message=Pengajuan dengan NIM/NIP <b>$username</b>\" sudah berhasil diverifikasi");
    } else {
        header("Location: verifikasi.php?message=Verifikasi gagal: " . mysqli_error($koneksi));
    }
}

mysqli_close($koneksi);
?>