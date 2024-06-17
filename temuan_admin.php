<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Temuan - CariSini UPNVJ</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-..." crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="nav">
        <div class="logo">CariSini UPNVJ</div>
        <div class="nav-navigasi">
            <ul>
                <li><a href="./temuan_admin.php">Informasi Temuan</a></li>
                <li><a href="./verifikasi.php">Verifikasi</a></li>
                <li><a href="./histori_admin.php">Histori</a></li>
            </ul>
        </div>
    </nav>

    <div class="flex-container">
        <div class="container mt-3 border rounded bg-white py-4 px-5 mb-5">
            <header class="header-title mb-2">
                <h1 class="title"><span style="color:#186F65">Informasi </span><span>Temuan</span></h1>
                <hr>
            </header>

            <section>
                <div class="clearfix d-flex justify-content-between">
                    <div style="margin-left: 10px;">
                        <a href="tambah_barang.php" class="btn float-start" style="width: 100px; background-color: #65C18C; color: white;" onmouseenter="this.style.backgroundColor='#186F65'" onmouseout="this.style.backgroundColor='#65C18C'">Tambah</a>
                    </div>
                    <div style="margin-right:-660px;">
                        <form class="form-inline my-2 my-lg-0 clearfix d-flex">
                            <input class="form-control mr-sm-2" type="text" name="cari" placeholder="Cari" aria-label="cari">
                            <button class="btn btn-outline my-2 my-sm-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                </div>

                <?php
                session_start();
                $nm_lengkap = $_SESSION['nm_lengkap'];
                if (!empty($_SESSION)) {
                    if (isset($_SESSION["message"])) {
                        echo "<div class=\"alert alert-success my-3\">" . $_SESSION["message"] . "</div>";
                        unset($_SESSION["message"]);
                    }
                }
                ?>

                <?php
                include("koneksi.php");

                if (isset($_GET['cari'])) {
                    $cari = $_GET['cari'];
                    $query = "SELECT * FROM temuan WHERE nm_brg LIKE '%$cari%'";
                } else {
                    $query = "SELECT * FROM temuan ORDER BY kd_brg DESC";
                }

                $result = mysqli_query($koneksi, $query);

                if (!$result) {
                    die("Query Error:" . mysqli_errno($koneksi) . " -" . mysqli_error($koneksi));
                }

                if (mysqli_num_rows($result) > 0) {
                    echo '<div class="table-responsive">';
                    echo '<table class="table table-striped mt-4">';
                    echo '<thead class="kolom">';
                    echo '<tr>';
                    echo '<th scope="col">Kode Barang</th>';
                    echo '<th scope="col">Nama Barang</th>';
                    echo '<th scope="col">Deskripsi</th>';
                    echo '<th scope="col">Gambar</th>';
                    echo '<th scope="col">Tanggal Temuan</th>';
                    echo '<th scope="col">Lokasi Temuan</th>';
                    echo '<th scope="col">Lokasi Pengamanan</th>';
                    echo '<th scope="col">Nama Petugas</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    while ($data = mysqli_fetch_assoc($result)) {
                        $raw_date = strtotime($data["tgl_temu"]);
                        $date = date("d - m - Y", $raw_date);

                        echo "<tr class='isi'>";
                        echo "<td>$data[kd_brg]</td>";
                        echo "<td>$data[nm_brg]</td>";
                        echo "<td>$data[spek_brg]</td>";
                        echo "<td><img src='foto/" . $data['foto_brg'] . "' alt='image' style='width:80px; height:80px;'></td>";
                        echo "<td>$date</td>";
                        echo "<td>$data[lok_temu]</td>";
                        echo "<td>$data[lok_aman]</td>";
                        echo "<td>$data[petugas]</td>";

                        echo "<td class='text-center'>";
                        echo '<a href="ubah_barang.php?kode=' . $data['kd_brg'] . '" class="btn btn-ubah">Ubah</a>';
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