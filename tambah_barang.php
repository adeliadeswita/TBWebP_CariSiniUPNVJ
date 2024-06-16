<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Informasi Temuan - CariSini UPNVJ</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
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
        <h1 class="title"><b><span style="color:#186F65">Form</span><span> Barang Hilang</span></b></h1>
        <hr>
      </header>

      <section>
        <?php
        include("koneksi.php");
        $query = mysqli_query($koneksi, "SELECT max(kd_brg) as kodeTerbesar FROM temuan");
        $data = mysqli_fetch_array($query);
        $kd_brg = $data['kodeTerbesar'];
        $urutan = (int) substr($kd_brg, 4, 5);
        $urutan++;
        $awalan = "CH24";
        $kd_brg = $awalan . sprintf("%05s", $urutan);

        session_start();
        $nm_lengkap = $_SESSION['nm_lengkap'];

        if (isset($_POST["submit"])) {
          $nm_brg = htmlentities(strip_tags(trim($_POST["nm_brg"])));
          $spek_brg = htmlentities(strip_tags(trim($_POST["spek_brg"])));
          $tgl_temu = htmlentities(strip_tags(trim($_POST["tgl_temu"])));
          $lok_temu = htmlentities(strip_tags(trim($_POST["lok_temu"])));
          $lok_aman = htmlentities(strip_tags(trim($_POST["lok_aman"])));
          $petugas = htmlentities(strip_tags(trim($_POST["petugas"])));
          $foto_brg = "";

          if (isset($_FILES['foto_brg']) && $_FILES['foto_brg']['error'] === UPLOAD_ERR_OK) {
            $tmp_file = $_FILES['foto_brg']['tmp_name'];
            $nama_file = $_FILES['foto_brg']['name'];
            $path = "foto/";

            $nama_file_unik = uniqid() . '_' . $nama_file;
            $full_path = $path . $nama_file_unik;

            if (move_uploaded_file($tmp_file, $full_path)) {
              $foto_brg = $nama_file_unik;
              echo "File berhasil diunggah ke: " . $full_path;
            } else {
              echo "Gagal mengunggah file.";
            }
          }

          $error_message = "";

          if (empty($nm_brg)) {
            $error_message .= "<li>Nama barang harus diisi</li>";
          }
          if (empty($spek_brg)) {
            $error_message .= "<li>Spesifikasi barang harus diisi</li>";
          }
          if (empty($tgl_temu)) {
            $error_message .= "<li>Tanggal penemuan harus diisi</li>";
          }
          if (empty($lok_temu)) {
            $error_message .= "<li>Lokasi penemuan harus diisi</li>";
          }
          if (!isset($_FILES['foto_brg']) || $_FILES['foto_brg']['error'] != UPLOAD_ERR_OK) {
            $error_message .= "<li>Foto barang harus diupload</li>";
          }
          if (empty($lok_aman)) {
            $error_message .= "<li>Lokasi pengamanan harus dipilih</li>";
          }
          if (empty($petugas)) {
            $error_message .= "<li>Petugas harus diisi</li>";
          }

          if ($error_message === "") {
            $nm_brg = mysqli_real_escape_string($koneksi, $nm_brg);
            $spek_brg = mysqli_real_escape_string($koneksi, $spek_brg);
            $tgl_temu = mysqli_real_escape_string($koneksi, $tgl_temu);
            $lok_temu = mysqli_real_escape_string($koneksi, $lok_temu);
            $lok_aman = mysqli_real_escape_string($koneksi, $lok_aman);
            $petugas = mysqli_real_escape_string($koneksi, $petugas);
            $query = "INSERT INTO temuan (kd_brg, nm_brg, foto_brg, spek_brg, tgl_temu, lok_temu, lok_aman, petugas) VALUES ";
            $query .= "('$kd_brg', '$nm_brg', '$foto_brg', '$spek_brg', '$tgl_temu', '$lok_temu', '$lok_aman', '$petugas')";
            $result = mysqli_query($koneksi, $query);

            if ($result) {
              $message = "Barang \"<b>$nm_brg</b>\" dengan Kode Barang \"<b>$kd_brg</b>\" sudah berhasil ditambahkan";
              $message = urlencode($message);
              header("Location: temuan_admin.php?message={$message}");
            } else {
              die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
            }
          }
        }
        ?>
        
        <?php
        if (isset($error_message) && $error_message !== "") {
          echo "<div class=\"alert alert-danger mb3\"> 
                  <ul class=\"m-0\">$error_message</ul>
                </div>";
        }
        ?>

        <form action="tambah_barang.php" method="post" class="form" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="kd_brg" class="form-label">Kode Barang</label>
            <input type="text" name="kd_brg" id="kd_brg" class="form-control" value="<?php echo $kd_brg; ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="nm_brg" class="form-label">Nama Barang</label>
            <input type="text" name="nm_brg" id="nm_brg" class="form-control" value="<?php echo (isset($nm_brg)) ? $nm_brg : ""; ?>">
          </div>
          <div class="mb-3">
            <label for="spek_brg" class="form-label">Spesifikasi Barang</label>
            <input type="text" name="spek_brg" id="spek_brg" class="form-control" value="<?php echo (isset($spek_brg)) ? $spek_brg : ""; ?>">
          </div>
          <div class="mb-3">
            <label for="foto_brg" class="form-label">Foto Barang</label>
            <input type="file" name="foto_brg" id="foto_brg" class="form-control" accept=".jpg, .jpeg, .png">
          </div>
          <div class="mb-3">
            <label for="tgl_temu" class="form-label">Tanggal Penemuan</label>
            <input type="date" name="tgl_temu" id="tgl_temu" class="form-control" value="<?php echo (isset($tgl_temu)) ? $tgl_temu : ""; ?>">
          </div>
          <div class="mb-3">
            <label for="lok_temu" class="form-label">Lokasi Penemuan</label>
            <input type="text" name="lok_temu" id="lok_temu" class="form-control" value="<?php echo (isset($lok_temu)) ? $lok_temu : ""; ?>">
          </div>
          <div class="mb-3">
            <label for="lok_aman" class="form-label">Lokasi Pengamanan</label>
            <select name="lok_aman" id="lok_aman" class="form-select">
              <option value="">Pilih Lokasi</option>
              <?php
              $lokasi_aman = ["Ruang Tata Usaha FIK", "Ruang Tata Usaha FH", "Ruang Tata Usaha FIKES", "Ruang Tata Usaha FEB", "Ruang Tata Usaha FK", "Ruang Tata Usaha FT", "Ruang Tata Usaha FISIP"];
              foreach ($lokasi_aman as $lokasi) {
                if (isset($lok_aman) && $lok_aman === $lokasi) {
                  echo "<option value=\"$lokasi\" selected>$lokasi
                                    </option>";
                } else {
                  echo "<option value=\"$lokasi\">$lokasi</option>";
                }
              }
              ?>
            </select>
          </div>
          <div class="mb-2">
            <label for="petugas" class="form-label">Petugas</label>
            <input type="text" name="petugas" id="petugas" class="form-control" value="<?php echo htmlspecialchars($nm_lengkap); ?>" readonly>
          </div>
          <br>
          <div>
            <input type="submit" name="submit" value="Tambah" class="btn float-start" style="width: 100px; background-color: #65C18C; color: white;" onmouseenter="this.style.backgroundColor='#186F65'" onmouseout="this.style.backgroundColor='#65C18C'">
          </div>
        </form>
      </section>
      <?php
      mysqli_close($koneksi);
      ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>