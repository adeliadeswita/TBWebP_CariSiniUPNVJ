<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["selesai"])) {
    $kd_brg = mysqli_real_escape_string($koneksi, $_POST["kd_brg"]);
    $username = mysqli_real_escape_string($koneksi, $_POST["username"]);

    // Memastikan urutan query yang benar
    $update_query = "UPDATE pengajuan SET status = 'Selesai' WHERE username = '$username'";
    $delete_query = "DELETE FROM temuan WHERE kd_brg = '$kd_brg'";

    // Jalankan query update terlebih dahulu
    $update_result = mysqli_query($koneksi, $update_query);
    // Kemudian jalankan query delete
    $delete_result = mysqli_query($koneksi, $delete_query);

    if ($update_result && $delete_result) {
        header("Location: histori_admin.php?message=Pengajuan dengan NIM/NIP <b>$username</b> sudah berhasil diambil.");
    } else {
        $error_message = mysqli_error($koneksi);
        header("Location: histori_admin.php?message=Pengajuan gagal diambil: " . $error_message);
    }
}

mysqli_close($koneksi);
?>