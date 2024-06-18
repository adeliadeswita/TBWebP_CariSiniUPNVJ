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
    <title>Verifikasi - CariSini UPNVJ</title>
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
                        <a class="nav-link" href="./histori_admin.php">Histori</a>
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
            <header>
                <h1 class="title"><span style= "color:#186F65">Verifikasi </span><span>Pengajuan</span></h1>
                <hr>
            </header>
            <?php
                if(!empty($_SESSION)){
                    if(isset($_SESSION["message"])){
                        echo "<div class=\"alert alert-success my-3\">".$_SESSION["message"]."</div>";
                        unset($_SESSION["message"]); 
                    }
                }
                ?>
            <section>
                <?php
                if (isset($_GET["message"])) {
                    echo "<div class=\"alert alert-success my3\">".$_GET["message"]."</div>";
                }
                ?>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="kolom">
                            <tr>
                                <th scope="col">Kode Pengajuan</th>
                                <th scope="col">NIM/NIP</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">KTP/KTM</th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Tanggal Hilang</th>
                                <th scope="col">Deskripsi Barang</th>
                                <th scope="col">Kronologi Kehilangan</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody class="isi">
                            <?php
                            include("koneksi.php");

                            $query = "SELECT * FROM pengajuan WHERE status = 'Belum Terverifikasi'";
                            $result = mysqli_query($koneksi, $query);

                            if(!$result){
                                die ("Query Error:".mysqli_errno($koneksi)." -".mysqli_error($koneksi));
                            }

                            while($data = mysqli_fetch_assoc($result)) {
                                $raw_date = strtotime($data["tgl_hilang"]);
                                $date = date("d - m - Y", $raw_date);

                                echo "<tr>";
                                echo "<td>$data[kd_ajuan]</td>";
                                echo "<td>$data[username]</td>";
                                echo "<td>$data[nm_lengkap]</td>";
                                echo "<td><img src='ktpktm/" . $data['ktp_ktm'] . "' alt='image' style='width:80px;s'></td>";
                                echo "<td>$data[kd_brg]</td>";
                                echo "<td>$data[nm_brg_ajuan]</td>";
                                echo "<td>$date</td>";
                                echo "<td>$data[spek_brg_ajuan]</td>";
                                echo "<td>$data[kron_hilang]</td>";
                                echo "<td>$data[status]</td>";
                                echo "<td class=\"text-center\">";
                                echo "<form action=\"verifikasi_aksi.php\" method=\"post\" class=\"d-inline-block mb-2\">";
                                echo "<input type=\"hidden\" name=\"kd_ajuan\" value=\"$data[kd_ajuan]\">";
                                echo "<input type=\"submit\" name=\"verifikasi\" value=\"Verifikasi\" class=\"btn btn-info text-white\"
                                    style=\"width:100px; background-color: #65C18C; color: white;\" 
                                    onmouseenter=\"this.style.backgroundColor='#186F65'\" 
                                    onmouseout=\"this.style.backgroundColor='#65C18C'\">";
                                
                                echo "</form>";
                                echo "<form action=\"tolak_aksi.php\" method=\"post\" class=\"d-inline-block mb-2\">";
                                echo "<input type=\"hidden\" name=\"kd_ajuan\" value=\"$data[kd_ajuan]\">";
                                echo "<input type=\"submit\" name=\"Tolak\" value=\"Tolak\" class=\"btn btn-info text-white\"
                                style=\"width:100px; background-color: #d15e5e; color: white;\" 
                                onmouseenter=\"this.style.backgroundColor='#a81b1b'\" 
                                onmouseout=\"this.style.backgroundColor='#d15e5e'\">";
                                echo "</form>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            mysqli_free_result($result);
                            mysqli_close($koneksi);
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
    <footer>
        All Rights Reserved | © CariSini UPNVJ! - 2024
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>