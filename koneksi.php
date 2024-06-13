<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "db_carisini";

$koneksi = mysqli_connect($server, $username, $password, $database);
if (!$koneksi) {
    die("Koneksi Bermasalah" . mysqli_connect_errno() . "-" . mysqli_connect_errno());
} else {
    // echo"Koneksi Berhasil";
}
