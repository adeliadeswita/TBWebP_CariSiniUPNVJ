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
    $error .= "<li>Deskripsi barang harus diisi</li>";
  }
  if (empty($tgl_hilang)) {
    $error .= "<li>Tanggal kehilangan harus diisi</li>";
  }
  if (empty($kron_hilang)) {
    $error .= "<li>Kronologi kehilangan harus diisi</li>";
  }
  if ($error === "") {
    $query_check_duplicate = "SELECT * FROM pengajuan WHERE kd_brg = '$kd_brg' AND username = '$username' AND status = 'Belum Terverifikasi'";
    $result_check_duplicate = mysqli_query($koneksi, $query_check_duplicate);

  if (mysqli_num_rows($result_check_duplicate) > 0) {
    $error = "Anda sudah melakukan pengajuan barang ini sebelumnya.";
  } else {
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

<?php 
include "navbar_user.php"
?>

  <div class="flex-container">
    <div class="container mt-3 border rounded bg-white py-4 px-5 mb-5">
      <header class="header-title mb-2">
        <h1 class="title"><b><span style="color:#186F65">Form Pengajuan</span><span> Barang Hilang</span></b></h1>
        <hr>
      </header>
      
      <section>
        <form action="form_pengajuan.php" id="pengajuanForm" method="post" class="form" enctype="multipart/form-data">
          <?php if (!empty($error)) {
            echo "<div class='alert alert-danger'><ul>$error</ul></div>";
          } elseif (isset($berhasil)) {
            echo "<div class='alert alert-success'>$berhasil</div>";
          }
          ?>
          <div class="mb-3">
            <input type="hidden" name="kd_ajuan" id="kd_ajuan" class="form-control" value="Auto Generated">  
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
            <input type="file" name="ktp_ktm" id="ktp_ktm" class="form-control" value="" accept=".jpg, .jpeg, .png">
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
          
          <!-- Tombol Kirim dan Reset dalam div yang sama-->
          <div>
            <input type="button" value="Kirim" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kirimModal" 
            style="width: 100px; background-color: #65C18C; color: white;" 
            onmouseenter="this.style.backgroundColor='#186F65'" onmouseout="this.style.backgroundColor='#65C18C'">

            <input type="button" value="Reset" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#resetModal"
            style="width: 100px; background-color: #d15e5e; color: white;" 
            onmouseenter="this.style.backgroundColor='#a81b1b'" onmouseout="this.style.backgroundColor='#d15e5e'">
          </div>

          <!-- Modal Kirim -->
          <div class="modal fade" id="kirimModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="kirimModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="kirimModalLabel">KONFIRMASI</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Yakin Ingin Mengirim Pengajuan?
                </div>
                <div class="modal-footer">
                  <input type="submit" name="submit" value="Ya" class="btn btn-primary"
                  style="width: 100px; background-color: #65C18C; color: white;"
                  onmouseenter="this.style.backgroundColor='#186F65'" onmouseout="this.style.backgroundColor='#65C18C'">
                  <input type="button" value="Tidak" class="btn btn-secondary" data-bs-dismiss="modal"
                  style="width: 100px; background-color: #d15e5e; color: white;"
                  onmouseenter="this.style.backgroundColor='#a81b1b'" onmouseout="this.style.backgroundColor='#d15e5e'">
                </div>
              </div>
            </div>
          </div>
          
          <!-- Modal Reset-->
          <div class="modal fade" id="resetModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="resetModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="resetModalLabel">KONFIRMASI</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Yakin Ingin Mereset Pengajuan?
                </div>
                <div class="modal-footer">
                  <input type="button" onclick="resetForm()" value="Ya" class="btn btn-primary" data-bs-dismiss="modal"
                  style="width: 100px; background-color: #65C18C; color: white;"
                  onmouseenter="this.style.backgroundColor='#186F65'" onmouseout="this.style.backgroundColor='#65C18C'">
                  <input type="button" value="Tidak" class="btn btn-secondary" data-bs-dismiss="modal"
                  style="width: 100px; background-color: #d15e5e; color: white;"
                  onmouseenter="this.style.backgroundColor='#a81b1b'" onmouseout="this.style.backgroundColor='#d15e5e'">
                </div>
              </div>
            </div>
          </div>
          
        </form>
      </section>
    </div>
  </div>
  <?php 
  include "footer.php"
  ?>
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