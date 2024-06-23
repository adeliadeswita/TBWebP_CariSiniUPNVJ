<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['id_admin']) || !isset($_SESSION['nm_admin'])) {
    header("Location: login_admin.php");
    exit;
}

$username = $_SESSION['id_admin'];
$nm_lengkap = $_SESSION['nm_admin'];
$error_message = "";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Informasi Temuan - CariSini UPNVJ</title>
    <link rel="icon" href="logo/logo-tab.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-..." crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <img src='logo/logo-title.png' style="width:200px;">
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
                        <li style="font-size:smaller;"><?php echo $username; ?></li>
                        <li><a class="dropdown-item" href="logout.php">Keluar</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex-container">
        <div class="container mt-3 border rounded bg-white py-4 px-5 mb-5">
            <header class="header-title mb-2">
                <h1 class="title"><b><span style="color:#186F65">Form Penemuan</span> Barang Hilang</b></h1>
                <hr>
            </header>
            <section>
                <?php
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

                    if (empty($_POST['nm_brg'])) {
                        $error_message .= "<li>Nama barang harus diisi</li>";
                    }
                    if (empty($_POST['spek_brg'])) {
                        $error_message .= "<li>Spesifikasi barang harus diisi</li>";
                    }
                    if (empty($_POST['tgl_temu'])) {
                        $error_message .= "<li>Tanggal penemuan harus diisi</li>";
                    }
                    if (empty($_POST['lok_temu'])) {
                        $error_message .= "<li>Lokasi penemuan harus diisi</li>";
                    }
                    if (empty($_POST['lok_aman'])) {
                        $error_message .= "<li>Lokasi pengamanan harus diisi</li>";
                    }
                    if (!empty($_FILES['foto_brg']['name']) && $_FILES['foto_brg']['error'] === UPLOAD_ERR_OK) {
                        if ($_FILES['foto_brg']['size'] > 50 * 1024 * 1024) {
                            $error_message .= "<li>Ukuran file foto tidak boleh lebih dari 50 MB</li>";
                        }
                    }

                    if ($error_message === "") {
                        if (!empty($_FILES['foto_brg']) && $_FILES['foto_brg']['error'] === UPLOAD_ERR_OK) {
                            $tmp_file = $_FILES['foto_brg']['tmp_name'];
                            $nama_file = $_FILES['foto_brg']['name'];
                            $path = "foto/";
                            $full_path = $path . $nama_file;

                            if (move_uploaded_file($tmp_file, $full_path)) {
                                if (!empty($foto_brg_lama) && file_exists("foto/" . $foto_brg_lama)) {
                                    unlink("foto/" . $foto_brg_lama);
                                }
                                $foto_brg = $nama_file;

                                $query_foto_baru = "UPDATE temuan SET foto_brg='$foto_brg' WHERE kd_brg='$kd_brg'";
                                $result_foto_baru = mysqli_query($koneksi, $query_foto_baru);
                                if (!$result_foto_baru) {
                                    echo "Gagal mengupdate nama file foto baru ke database.";
                                }
                            }
                        } else {
                            $foto_brg = $foto_brg_lama;
                        }

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
                            lok_aman = '$lok_aman', 
                            petugas = '$petugas' 
                            WHERE kd_brg = '$kd_brg'";
                        $result_update = mysqli_query($koneksi, $query_update);

                        if ($result_update) {
                            $message = "Barang <b>$nm_brg</b> dengan Kode Barang <b>$kd_brg</b> berhasil diubah";
                            $_SESSION["message"] = $message;
                            header("Location: temuan_admin.php");
                            exit;
                        } else {
                            die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
                        }
                    }
                } else {
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

                if (isset($error_message) && $error_message !== "") {
                    echo "<div class=\"alert alert-danger mb-3\"><ul class=\"m-0\">$error_message</ul></div>";
                }
                ?>

                <form action="ubah_barang.php" method="post" class="form" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="hidden" name="kd_brg" value="<?php echo isset($kd_brg) ? $kd_brg : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nm_brg" class="form-label">Nama Barang</label>
                        <input type="text" name="nm_brg" id="nm_brg" class="form-control" value="<?php echo isset($nm_brg) ? $nm_brg : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="spek_brg" class="form-label">Deskripsi Barang</label>
                        <input type="text" name="spek_brg" id="spek_brg" class="form-control" value="<?php echo isset($spek_brg) ? $spek_brg : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="foto_brg" class="form-label">Foto Barang</label>
                        <?php if (!empty($foto_brg_lama)) : ?>
                            <br>
                            <img src="foto/<?php echo $foto_brg_lama; ?>" alt="image" style="max-width: 200px;">
                            <br><br>
                        <?php endif; ?>
                        <input type="file" name="foto_brg" id="foto_brg" class="" accept=".jpg, .jpeg, .png">
                    </div>
                    <div class="mb-3">
                        <label for="tgl_temu" class="form-label">Tanggal Penemuan</label>
                        <input type="date" name="tgl_temu" id="tgl_temu" class="form-control" value="<?php echo isset($tgl_temu) ? $tgl_temu : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="lok_temu" class="form-label">Lokasi Penemuan</label>
                        <input type="text" name="lok_temu" id="lok_temu" class="form-control" value="<?php echo isset($lok_temu) ? $lok_temu : ''; ?>" >
                    </div>
                    <div class="mb-3">
                        <label for="lok_aman" class="form-label">Lokasi Pengamanan</label>
                        <select name="lok_aman" id="lok_aman" class="form-select">
                            <option value="">Pilih Lokasi</option>
                            <?php
                            $lokasi_aman = ["Ruang Tata Usaha FIK", "Ruang Tata Usaha FH", "Ruang Tata Usaha FIKES", "Ruang Tata Usaha FEB", "Ruang Tata Usaha FK", "Ruang Tata Usaha FT", "Ruang Tata Usaha FISIP"];
                            foreach ($lokasi_aman as $lokasi) {
                                echo "<option value=\"$lokasi\"" . (isset($lok_aman) && $lok_aman === $lokasi ? ' selected' : '') . ">$lokasi</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="petugas" class="form-label">Petugas</label>
                        <input type="text" name="petugas" id="petugas" class="form-control" value="<?php echo htmlspecialchars($nm_lengkap); ?>" readonly>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" 
                            style="width: 100px; background-color: #65C18C; color: white;"
                            onmouseenter="this.style.backgroundColor='#186F65'" onmouseout="this.style.backgroundColor='#65C18C'">
                            Ubah
                        </button>
                    </div>

                     <!-- Modal -->
                     <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">KONFIRMASI</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Yakin Ingin Mengubah Data Ini?
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
            </section>
            <?php mysqli_close($koneksi); ?>
        </div>
        <footer>
            All Rights Reserved | © CariSini UPNVJ! - 2024
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>