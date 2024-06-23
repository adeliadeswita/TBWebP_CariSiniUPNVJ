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
    <title>Histori - CariSini UPNVJ</title>
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
                        <a class="nav-link" href="./histori_admin.php">Pengambilan</a>
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
    <div class="d-flex flex-wrap justify-content-between align-items-center">
        <div class="container mt-3 border rounded bg-white py-4 px-5 mb-5">
            <header>
                <h1 class="title"><a style="text-decoration: none;"><span style= "color:#186F65">Histori </span><span>Verifikasi</span></a></h1>
                <hr>
            </header>
           
            <section>
                <div class="table-responsive">          
                    <table class="table table-striped">
                        <thead>
                            <tr class="kolom">
                                <th scope="col">Kode Pengajuan</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Deskripsi Barang</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM pengajuan ORDER BY kd_ajuan DESC";
                            $result = mysqli_query($koneksi, $query);

                            if(!$result){
                                die ("Query Error:".mysqli_errno($koneksi)." -".mysqli_error($koneksi));
                            }

                            while($data = mysqli_fetch_assoc($result)) {
                                $raw_date = strtotime($data["tgl_hilang"]);
                                $date = date("d - m - Y", $raw_date);

                                echo "<tr class='isi'>";
                                echo "<td>$data[kd_ajuan]</td>";
                                echo "<td>$data[nm_lengkap]</td>";
                                echo "<td>$data[kd_brg]</td>";
                                echo "<td>$data[nm_brg_ajuan]</td>";
                                echo "<td>$data[spek_brg_ajuan]</td>";
                                echo "<td>$data[status]</td>";
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
    </div>
    <?php 
    include "footer.php"
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>