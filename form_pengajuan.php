<?php
session_start();
include 'koneksi.php';

$username = $_SESSION['username'];
$nm_lengkap = $_SESSION['nm_lengkap'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Collect form data
  $nm_lengkap = $_POST['nm_lengkap'];
  $username = $_POST['username'];
  $nm_brg = $_POST['nm_brg'];
  $kd_brg = $_POST['kd_brg'];
  $spek_brg_ajuan = $_POST['spek_brg_ajuan'];
  $tgl_hilang = $_POST['tgl_hilang'];
  $kron_hilang = $_POST['kron_hilang'];

  // File upload handling
  $ktp_ktm = $_FILES['ktp_ktm']['name'];
  $ktp_ktm_tmp = $_FILES['ktp_ktm']['tmp_name'];
  $upload_dir = 'foto/';
  move_uploaded_file($ktp_ktm_tmp, $upload_dir . $ktp_ktm);

  // Validasi nm_brg dan kd_brg
  $query_check = "SELECT * FROM temuan WHERE nm_brg = '$nm_brg' AND kd_brg = '$kd_brg'";
  $result_check = mysqli_query($koneksi, $query_check);

  if (mysqli_num_rows($result_check) > 0) {
    // Jika ada data yang cocok, lakukan INSERT
    $sql = "INSERT INTO pengajuan (nm_lengkap, username, nm_brg, kd_brg, spek_brg_ajuan, tgl_hilang, kron_hilang, ktp_ktm)
                VALUES ('$nm_lengkap', '$username', '$nm_brg', '$kd_brg', '$spek_brg_ajuan', '$tgl_hilang', '$kron_hilang', '$ktp_ktm')";

    if (mysqli_query($koneksi, $sql)) {
      $berhasil = "Data berhasil disimpan !";
    } else {
      echo "<script>alert('Error: " . mysqli_error($koneksi) . "');</script>";
    }
  } else {
    $error = "Nama barang atau kode barang tidak valid atau tidak ditemukan.";
  }

  mysqli_close($koneksi);
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Pengajuan-CariSini UPNVJ</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <nav class="nav">
    <div class="logo">CariSini UPNVJ!</div>
    <div class="nav-navigasi">
      <ul>
        <li><a href="./temuan_user.php">Informasi Temuan</a></li>
        <li><a href="">Pengajuan</a></li>
        <li><a href="./histori_user.php">Histori</a></li>
      </ul>
    </div>
  </nav>
  <div class="bg-light">
    <div class="container mt-5 border rounded bg-white py-4 px-5 mb-5">
      <header class="header-title mb-4">
        <h1 class="form-barang"><b><a style="text-decoration: none;"><span style="color:#186F65">Form</span><span> Pengajuan Verifikasi Barang</span></a></b></h1>
        <hr>
      </header>
      <section>
        <form action="form_pengajuan.php" method="post" class="form" enctype="multipart/form-data">
          <?php if (isset($error)) {
            echo "<p style='color:red;'>$error</p>";
          } elseif (isset($berhasil)) {
            echo "<p style='color:green;'>$berhasil</p>";
          }
          ?>
          <div class="mb-3">
            <label for="nm_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" name="nm_lengkap" id="nm_lengkap" class="form-control" value="<?php echo $nm_lengkap; ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">NIM/NIP</label>
            <input type="text" name="username" id="username" class="form-control" value="<?php echo $username; ?>" readonly>
          </div>
          <div>
            <label for="ktp_ktm" class="form-label">KTP/KTM</label>
            <input type="file" name="ktp_ktm" id="ktp_ktm" class="form-control" value="">
          </div><br>
          <div class="mb-3">
            <label for="nm_brg" class="form-label">Nama Barang</label>
            <input type="text" name="nm_brg" id="nm_brg" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="kd_brg" class="form-label">Kode Barang</label>
            <input type="text" name="kd_brg" id="kd_brg" class="form-control" value="" placeholder="Contoh : CS24XXXXX">
          </div>
          <div class="mb-3">
            <label for="spek_brg_ajuan" class="form-label">Spesifikasi Barang</label>
            <input type="text" name="spek_brg_ajuan" id="spek_brg_ajuan" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="tgl_hilang" class="form-label">Tanggal Hilang</label>
            <input type="date" name="tgl_hilang" id="tgl_hilang" class="form-control" value="">
          </div>
          <br>
          <div class="mb-3">
            <label for="kron_hilang" class="form-label">Kronologi Kehilangan</label>
            <input type="text" name="kron_hilang" id="kron_hilang" class="form-control" value="">
          </div>
          <br>
          <br>
          <div class="mb-3">
            <input type="reset" name="reset" value="Reset" class="btn">
            <input type="submit" name="submit" value="Submit" class="btn">
          </div>
        </form>
      </section>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
    function resetForm() {
      const form = document.getElementById('pengajuanForm');
      Array.from(form.elements).forEach(element => {
        if (!element.readOnly && element.type !== 'submit' && element.type !== 'button') {
          element.value = '';
          if (element.type === 'file') {
            element.value = null;
          }
        }
      });
    }
  </script>
</body>

</html>