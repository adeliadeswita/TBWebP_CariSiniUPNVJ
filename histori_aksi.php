<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["selesai"])) {
    $username = mysqli_real_escape_string($koneksi, $_POST["username"]);

    $query = "UPDATE pengajuan SET status = 'Selesai' WHERE username = '$username'";

    $result = mysqli_query($koneksi, $update_query);
    if ($result) {
        header("Location: histori_admin.php?message=Pengajuan dengan NIM/NIP <b>$username</b> sudah berhasil diambil.");
    } else {
        $error_message = mysqli_error($koneksi);
        header("Location: histori_admin.php?message=Pengajuan gagal diambil: " . $error_message);
    }
}

mysqli_close($koneksi);
?>