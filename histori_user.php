<?php
session_start();
include 'koneksi.php';
$username = $_SESSION['username'];
$nm_lengkap = $_SESSION['nm_lengkap'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengambilan - CariSini UPNVJ</title>
    <link rel="icon" href="logo/logo-tab.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-..." crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<?php 
include "navbar_user.php"
?>

  <div class="flex-container">
        <div class="container mt-3 border rounded bg-white py-4 px-5 mb-5">
            <header style="margin-bottom:-30px;">
                <h1 class="title"><a style="text-decoration: none;"><span style= "color:#186F65">Histori </span><span>Pengajuan</span></a></h1>
                <hr>
            </header>
            <section>
        <?php
        $query = "
        SELECT pengajuan.kd_ajuan, pengajuan.kd_brg, pengajuan.nm_brg_ajuan, pengajuan.status, temuan.petugas, temuan.lok_aman
        FROM pengajuan
        LEFT JOIN temuan ON pengajuan.kd_brg = temuan.kd_brg
        WHERE pengajuan.username = '$username'
        ";
    
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
        }
        ?>

        <div class="table-responsive">
             <table class="table table-striped mt-4">
                <thead>
                    <tr class="kolom">
                        <th scope="col">Kode Pengajuan</th>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Status</th>
                        <th scope="col">Lokasi Pengamanan</th>
                        <th scope="col">Petugas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "<tr class='isi'>";
                        echo "<td>{$data['kd_ajuan']}</td>";
                        echo "<td>{$data['kd_brg']}</td>";
                        echo "<td>{$data['nm_brg_ajuan']}</td>";
                        echo "<td>{$data['status']}</td>";
                        echo "<td>{$data['lok_aman']}</td>";
                        echo "<td>{$data['petugas']}</td>";
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
    <?php 
    include "footer.php"
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>