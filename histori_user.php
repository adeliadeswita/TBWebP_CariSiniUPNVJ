<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Histori - CariSini UPNVJ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .centered-table th, .centered-table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>
<body>
  <nav class="nav">
    <div class="logo">CariSini UPNVJ</div>
      <div class="nav-navigasi">
        <ul>
            <li><a href="./temuan_user.php">Informasi Temuan</a></li>
            <li><a href="./form_pengajuan.php">Pengajuan</a></li>
            <li><a href="./histori_user.php">Histori</a></li>
          </ul>
      </div>
  </nav>

  <div class="flex-container">
        <div class="container mt-3 border rounded bg-white py-4 px-5 mb-5">
            <header style="margin-bottom:-30px;">
                <h1 class="title"><a style="text-decoration: none;"><span style= "color:#186F65">Histori </span><span>Verifikasi Barang</span></a></h1>
                <hr>
            </header>
            <section>
        <?php
        include("koneksi.php");

        $query = "
            SELECT pengajuan.kd_brg, pengajuan.nm_brg_ajuan, pengajuan.status, temuan.petugas
            FROM pengajuan
            LEFT JOIN temuan ON pengajuan.kd_brg = temuan.kd_brg
        ";
        
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
        }
        ?>

        <div class="table-responsive">
            <table class="table table-striped mt-4 centered-table">
                <thead>
                    <tr class="kolom">
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Status</th>
                        <th scope="col">Petugas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$data['kd_brg']}</td>";
                        echo "<td>{$data['nm_brg_ajuan']}</td>";
                        echo "<td>{$data['status']}</td>";
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
</body>
</html>