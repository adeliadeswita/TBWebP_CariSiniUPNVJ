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
    <h1 class="title"><b><span style= "color:#186F65">Form</span><span> Barang Hilang</span></b></h1>
        <hr> 
    </header> 
    <section>
    <?php
include("koneksi.php");

session_start();
$nm_lengkap = $_SESSION['nm_lengkap'];
if (isset($_POST["submit"])) {
    $kd_brg = $_POST['kd_brg'];

    $query = "SELECT * FROM temuan WHERE kd_brg = '$kd_brg'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);

    $nm_brg = $data['nm_brg'];   
    $spek_brg = $data['spek_brg'];   
    $tgl_temu = $data['tgl_temu'];
    $lok_temu = $data['lok_temu'];
    $foto_brg_lama = $data['foto_brg'];
    $lok_aman = $data['lok_aman'];
    $petugas = $data['petugas'];
    mysqli_free_result($result);

    if (isset($_FILES['foto_brg'])) {
        $foto_brg = $foto_brg_lama;
        $tmp_file = $_FILES['foto_brg']['tmp_name'];
        $nama_file = $_FILES['foto_brg']['name'];
        $path = "foto/";
        $full_path = $path . $nama_file;

        if (move_uploaded_file($tmp_file, $full_path)) {
            $foto_brg = $nama_file;

            if (!empty($foto_brg_lama)) {
              unlink("foto/" . $foto_brg_lama);
          }
          
            $query_delete_foto_lama = "SELECT foto_brg FROM temuan WHERE kd_brg='$kd_brg'";
            $result_delete_foto_lama = mysqli_query($koneksi, $query_delete_old_photo);
            if ($result_delete_foto_lama) {
                $old_photo = mysqli_fetch_assoc($result_delete_foto_lama)['foto_brg'];
                unlink("foto/" . $foto_lama); // Hapus file lama dari folder
            }
        
            $query_foto_baru = "UPDATE temuan SET foto_brg='$foto_brg' WHERE kd_brg='$kd_brg'";
            $result_foto_baru = mysqli_query($koneksi, $query_foto_baru);
            if (!$result_foto_baru) {
                echo "Gagal mengupdate nama file foto baru ke database.";
            }
        }
    } else {
      $foto_brg = $foto_brg_lama;
  }

    if ($_POST) {
        $nm_brg = mysqli_real_escape_string($koneksi, $_POST['nm_brg']);
        $spek_brg = mysqli_real_escape_string($koneksi, $_POST['spek_brg']);
        $tgl_temu = mysqli_real_escape_string($koneksi, $_POST['tgl_temu']);
        $lok_temu = mysqli_real_escape_string($koneksi, $_POST['lok_temu']);
        $lok_aman = mysqli_real_escape_string($koneksi, $_POST['lok_aman']);
        $petugas = mysqli_real_escape_string($koneksi, $_POST['petugas']);

        $query_update = "UPDATE temuan SET 
                            nm_brg = '$nm_brg', 
                            spek_brg = '$spek_brg', 
                            tgl_temu = '$tgl_temu', 
                            lok_temu = '$lok_temu', 
                            foto_brg = '$foto_brg', 
                            lok_aman = '$lok_aman', 
                            petugas = '$petugas' 
                        WHERE kd_brg = '$kd_brg'";
        $result_update = mysqli_query($koneksi, $query_update);

      if($result_update) {
          $message = "Barang \"<b>$nm_brg</b>\" dengan Kode Barang\"<b>$kd_brg</b>\" berhasil diubah"; 
          $_SESSION["message"] = $message;
          header("Location: temuan_admin.php"); 
      }else {
          die ("Query Error: ".mysqli_errno($koneksi)." - "
          .mysqli_error($koneksi)); 
      }
    }
}else{
  
  $kd_brg = $_GET['kode'];

  $query = "SELECT * FROM temuan WHERE kd_brg = '$kd_brg'";
  $result = mysqli_query($koneksi, $query);
  $data = mysqli_fetch_assoc($result);

  $nm_brg = $data['nm_brg'];   
  $spek_brg = $data['spek_brg'];   
  $tgl_temu = $data['tgl_temu'];
  $lok_temu = $data['lok_temu'];
  $foto_brg_lama = $data['foto_brg'];
  $lok_aman = $data['lok_aman'];
  $petugas = $data['petugas'];
  mysqli_free_result($result);
}
?>

    <?php 
    if (isset($error_message) && $error_message !== "") {
        echo "<div class=\"alert alert-danger mb3\"> 
              <ul class=\"m-0\">$error_message</ul>
              </div>"; 
    }
    ?> 

    <form action="ubah_barang.php" method="post" class="form" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="kd_brg" class="form-label">Kode Barang</label>
          <input type="text" name="kd_brg" id="kd_brg" class="form-control" value="<?php echo($kd_brg); ?>" readonly>
        </div>
        <div class="mb-3"> 
            <label for="nm_brg" class="form-label">Nama Barang</label> 
            <input type="text" name="nm_brg" id="nm_brg" class="form-control" value="<?php echo isset($nm_brg) ? $nm_brg : ''; ?>"> 
        </div> 
        <div class="mb-3"> 
            <label for="spek_brg" class="form-label">Spesifikasi Barang</label> 
            <input type="text" name="spek_brg" id="spek_brg" class="form-control" value="<?php echo isset($spek_brg) ? $spek_brg : ''; ?>"> 
        </div>
        <div class="mb-3">
          <label for="foto_brg" class="form-label">Foto Barang</label>
          <?php if (!empty($foto_brg_lama)) : ?>
              <br>
              <img src="foto/<?php echo $foto_brg_lama; ?>" alt="image" style="max-width: 200px;">
              <br><br>
          <?php endif; ?>
          <input type="file" name="foto_brg" id="foto_brg" class="" accept=".jpg, .jpeg, .png" value="Ubah">
          <div class="mb-3"> 
            <label for="tgl_temu" class="form-label">Tanggal Penemuan</label> 
            <input type="date" name="tgl_temu" id="tgl_temu" class="form-control" value="<?php echo isset($tgl_temu) ? $tgl_temu : ''; ?>"> 
        </div>
        <div class="mb-3"> 
          <label for="lok_temu" class="form-label">Lokasi Penemuan</label> 
          <input type="text" name="lok_temu" id="lok_temu" class="form-control" value="<?php echo (isset($lok_temu)) ? $lok_temu : ""; ?>"> 
        </div>
        <div class="mb-3"> 
        <label for="lok_aman" class="form-label">Lokasi Pengamanan</label> 
        <select name="lok_aman" id="lok_aman" class="form-select">
        <option value="">Pilih Lokasi</option> 
      </div> 
      <?php 
          $lokasi_aman = ["Ruang Tata Usaha FIK", "Ruang Tata Usaha FH", "Ruang Tata Usaha FIKES", "Ruang Tata Usaha FEB", "Ruang Tata Usaha FK", "Ruang Tata Usaha FT", "Ruang Tata Usaha FISIP"]; 
          foreach($lokasi_aman as $lokasi) {
              if (isset($lok_aman) && $lok_aman === $lokasi) { echo "<option value=\"$lokasi\"selected>$lokasi</option>";
              } else {
                  echo "<option value=\"$lokasi\">$lokasi</option>";
              }
          }
      ?>
      </select>
      <br>
      <div class="mb-2">
          <label for="petugas" class="form-label">Petugas</label>
          <input type="text" name="petugas" id="petugas" class="form-control" value="<?php echo htmlspecialchars($nm_lengkap); ?>" readonly>
        </div>
      <br> 
      <div> 
        <input type="submit" name="submit" value="Ubah"  class="btn float-start" 
        style="width: 100px; background-color: #65C18C; color: white;"
        onmouseenter="this.style.backgroundColor='#186F65'"
        onmouseout="this.style.backgroundColor='#65C18C'"> 
      </div> 
    </form> 
  </section> 
  <?php 
      mysqli_close($koneksi); 
  ?> 
  </div>
  <footer>
  All Rights Reserved | © CariSini UPNVJ! - 2024
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body> 
</html>