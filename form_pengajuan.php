<?php
session_start();
include 'koneksi.php';

$username = $_SESSION['username'];
$nm_lengkap = $_SESSION['nm_lengkap'];
$query_check = mysqli_query($koneksi, "SELECT max(kd_ajuan) as kodeTerakhir FROM pengajuan");
$data = mysqli_fetch_array($query_check);
$kd_ajuan = $data['kodeTerakhir'];
$urutan = (int) substr($kd_ajuan, 4, 5);
$urutan++;
$awalan = "PJ24";
$kd_ajuan = $awalan . sprintf("%05s", $urutan);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nm_lengkap = $_POST['nm_lengkap'];
  $username = $_POST['username'];
  $nm_brg_ajuan = $_POST['nm_brg_ajuan'];
  $kd_brg = $_POST['kd_brg'];
  $spek_brg_ajuan = $_POST['spek_brg_ajuan'];
  $tgl_hilang = $_POST['tgl_hilang'];
  $kron_hilang = $_POST['kron_hilang'];

  $ktp_ktm = $_FILES['ktp_ktm']['name'];
  $ktp_ktm_tmp = $_FILES['ktp_ktm']['tmp_name'];
  $upload_dir = 'ktpktm/';
  $error = "";

  if (!isset($_FILES['ktp_ktm']) || $_FILES['ktp_ktm']['error'] != UPLOAD_ERR_OK) {
    $error .= "<li>KTP/KTM harus diupload</li>";
  }
  if (empty($kd_brg)) {
    $error .= "<li>Kode barang harus diisi</li>";
  }
  if (empty($nm_brg_ajuan)) {
    $error .= "<li>Nama barang harus diisi</li>";
  }
  if (empty($spek_brg_ajuan)) {
    $error .= "<li>Spesifikasi barang harus diisi</li>";
  }
  if (empty($tgl_hilang)) {
    $error .= "<li>Tanggal kehilangan harus diisi</li>";
  }
  if (empty($kron_hilang)) {
    $error .= "<li>Kronologi hilang harus diisi</li>";
  }

  if ($error === "") {
    move_uploaded_file($ktp_ktm_tmp, $upload_dir . $ktp_ktm);

    $ktp_ktm = mysqli_real_escape_string($koneksi, $ktp_ktm);
    $kd_brg = mysqli_real_escape_string($koneksi, $kd_brg);
    $nm_brg_ajuan = mysqli_real_escape_string($koneksi, $nm_brg_ajuan);
    $tgl_hilang = mysqli_real_escape_string($koneksi, $tgl_hilang);
    $spek_brg_ajuan = mysqli_real_escape_string($koneksi, $spek_brg_ajuan);
    $kron_hilang = mysqli_real_escape_string($koneksi, $kron_hilang);

    $query_check = "SELECT * FROM temuan WHERE nm_brg = '$nm_brg_ajuan' AND kd_brg = '$kd_brg'";
    $result_check = mysqli_query($koneksi, $query_check);

    if (mysqli_num_rows($result_check) > 0) {
      $sql = "INSERT INTO pengajuan (kd_ajuan, nm_lengkap, username, nm_brg_ajuan, kd_brg, spek_brg_ajuan, tgl_hilang, kron_hilang, ktp_ktm)
      VALUES ('$kd_ajuan','$nm_lengkap', '$username', '$nm_brg_ajuan', '$kd_brg', '$spek_brg_ajuan', '$tgl_hilang', '$kron_hilang', '$ktp_ktm')";

      if (mysqli_query($koneksi, $sql)) {
        $berhasil = "Data berhasil disimpan!";
      } else {
        $error = "Error: " . mysqli_error($koneksi);
      }
    } else {
      $error = "Nama barang atau kode barang tidak valid atau tidak ditemukan.";
    }
  }

  mysqli_close($koneksi);
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Pengajuan - CariSini UPNVJ</title>
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
                        <a class="nav-link" href="./temuan_user.php">Informasi Temuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./form_pengajuan.php">Pengajuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./histori_user.php">Histori</a>
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
        <h1 class="title"><b><span style="color:#186F65">Form Pengajuan</span><span> Barang Hilang</span></b></h1>
        <hr>
      </header>
      
      <section>
        <form action="form_pengajuan.php" method="post" class="form" enctype="multipart/form-data">
          <?php if (!empty($error)) {
            echo "<div class='alert alert-danger'><ul>$error</ul></div>";
          } elseif (isset($berhasil)) {
            echo "<div class='alert alert-success'>$berhasil</div>";
          }
          ?>
          <div class="mb-3">
            <input type="hidden" name="kd_ajuan" id="kd_ajuan" class="form-control" value="<?php echo $kd_ajuan; ?>">  
          </div>
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
            <label for="kd_brg" class="form-label">Kode Barang</label>
            <input type="text" name="kd_brg" id="kd_brg" class="form-control" value="" placeholder="Contoh : CS24XXXXX">
          </div>
          <div class="mb-3">
            <label for="nm_brg_ajuan" class="form-label">Nama Barang</label>
            <input type="text" name="nm_brg_ajuan" id="nm_brg_ajuan" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="spek_brg_ajuan" class="form-label">Deskripsi Barang</label>
            <input type="text" name="spek_brg_ajuan" id="spek_brg_ajuan" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="tgl_hilang" class="form-label">Tanggal Hilang</label>
            <input type="date" name="tgl_hilang" id="tgl_hilang" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label for="kron_hilang" class="form-label">Kronologi Kehilangan</label>
            <input type="text" name="kron_hilang" id="kron_hilang" class="form-control" value="">
          </div>
          <br>
          <div class="mb-3">
            <input type="reset" name="reset" value="Reset" class="btn" style="width: 100px; background-color: #65C18C; color: white;"
            onmouseenter="this.style.backgroundColor='#186F65'"
            onmouseout="this.style.backgroundColor='#65C18C'">
            <input type="kirim" name="kirim" value="Kirim" class="btn" style="width: 100px; background-color: #65C18C; color: white;"
            onmouseenter="this.style.backgroundColor='#186F65'"
            onmouseout="this.style.backgroundColor='#65C18C'">
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
        if (!element.readOnly && element.type !== 'kirim' && element.type !== 'button') {
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
