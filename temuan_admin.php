<?php
session_start();
include 'koneksi.php';
$username = $_SESSION['id_admin'];
$nm_lengkap = $_SESSION['nm_admin'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Temuan - CariSini UPNVJ</title>
    <link rel="icon" href="logo/logo-tab.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-..." crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <img src='logo\logo-title.png' style="width:200px";>
            <div class="navbar-collapse ms-auto">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="./temuan_admin.php">Informasi Temuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./verifikasi.php">Verifikasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pengambilan.php">Pengambilan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./all_histori.php">Histori</a>
                    </li>
                </ul>
                
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user" style="color: #ffffff;"></i>
                    </button>
                    <ul class="dropdown-content dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><?php echo $nm_lengkap; ?></li>
                        <li style="font-size:smaller";><?php echo $username; ?></li>
                        <li><a class="dropdown-item" href="logout.php">Keluar</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex-container">
        <div class="container mt-3 border rounded bg-white py-4 px-5 mb-5">
            <header class="header-title mb-2">
                <h1 class="title"><span style="color:#186F65">Informasi </span><span>Temuan</span></h1>
                <hr>
            </header>

            <section>
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <div class="mb-2">
                        <a href="tambah_barang.php" class="btn" style="width: 100px; background-color: #65C18C; color: white;"
                           onmouseenter="this.style.backgroundColor='#186F65'"
                           onmouseout="this.style.backgroundColor='#65C18C'">Tambah</a>
                    </div>
                    <div class="mb-2">
                        <form class="form-inline d-flex">
                            <input class="form-control mr-2" type="text" name="cari" placeholder="Cari" aria-label="cari">
                            <button class="btn btn-outline-secondary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                </div>

                <?php
                if(!empty($_SESSION)){
                    if(isset($_SESSION["message"])){
                        echo "<div class=\"alert alert-success my-3\">".$_SESSION["message"]."</div>";
                        unset($_SESSION["message"]); 
                    }
                }
                ?>

                <?php
                include("koneksi.php");

                if (isset($_GET['cari'])) {
                    $cari = $_GET['cari'];
                    $query = "SELECT * FROM temuan WHERE nm_brg LIKE '%$cari%' AND status IN ('Belum Terverifikasi', 'Tertolak')";
                } else {
                    $query = "SELECT * FROM temuan WHERE status IN ('Belum Terverifikasi', 'Tertolak') ORDER BY kd_brg DESC";
                }

                $result = mysqli_query($koneksi, $query);

                if(!$result){
                    die ("Query Error:".mysqli_errno($koneksi)." -".mysqli_error($koneksi));
                }

                if (mysqli_num_rows($result) > 0) {
                    echo '<div class="table-responsive">';
                    echo '<table class="table table-striped mt-4">';
                    echo '<thead class="kolom">';
                    echo '<tr>';
                    echo '<th scope="col">Kode Barang</th>';
                    echo '<th scope="col">Nama Barang</th>';
                    echo '<th scope="col">Deskripsi Barang</th>';
                    echo '<th scope="col">Foto Barang</th>';
                    echo '<th scope="col">Tanggal Penemuan</th>';
                    echo '<th scope="col">Lokasi Penemuan</th>';
                    echo '<th scope="col">Lokasi Pengamanan</th>';
                    echo '<th scope="col">Petugas</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    while($data = mysqli_fetch_assoc($result)) {
                        $raw_date = strtotime($data["tgl_temu"]);
                        $date = date("d - m - Y", $raw_date);

                        echo "<tr class='isi'>";
                        echo "<td>$data[kd_brg]</td>";
                        echo "<td>$data[nm_brg]</td>";
                        echo "<td>$data[spek_brg]</td>";
                        echo "<td><img src='foto/" . $data['foto_brg'] . "' alt='image' style='width:80px;'></td>";
                        echo "<td>$date</td>";
                        echo "<td>$data[lok_temu]</td>";
                        echo "<td>$data[lok_aman]</td>";
                        echo "<td>$data[petugas]</td>";

                        echo "<td class='text-center'>";
                        echo '<a href="ubah_barang.php?kode='. $data['kd_brg'].'" class="btn btn-ubah">Ubah</a>';
                        echo "</td>";

                        echo "</tr>";
                    }

                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                } else {
                    echo "<div class=\"alert alert-danger my-3\">Barang Tidak Ditemukan</div>";
                }

                mysqli_free_result($result);
                mysqli_close($koneksi);
                ?>
            </section>
        </div>
    </div>
    <footer>
        All Rights Reserved | © CariSini UPNVJ! - 2024
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>