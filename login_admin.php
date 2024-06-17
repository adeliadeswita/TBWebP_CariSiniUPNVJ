<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($koneksi, $_POST['id_admin']);
    $password = mysqli_real_escape_string($koneksi, $_POST['pass_admin']);
    $query = "SELECT * FROM adm WHERE id_admin = '$username' AND pass_admin = '$password'";
    $result = mysqli_query($koneksi, $query);

        if (!preg_match("/^[0-9]{10}$/",$username)) {
          $error = "Username harus berupa angka 10 atau 18 digit";
      } else {
          $query = "SELECT * FROM adm WHERE id_admin = '$username' AND pass_admin = '$password'";
          $result = mysqli_query($koneksi, $query);
          
          if (mysqli_num_rows($result) == 1) {
              $row = mysqli_fetch_assoc($result);
              $_SESSION['id_admin'] = $username;
              $_SESSION['nm_admin'] = $row['nm_admin'];
              header("Location: temuan_admin.php");
              exit;
          } else {
              $error = "Username atau password salah!";
          }
      }
  }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Sini UPNVJ </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style_login.css">
</head>

<body>
<div class="content-wrapper">
<img src="logo-title.png" alt="Logo" class="logo">
    <div class="container">
        <form action="" method="post">
            <h3>Admin</h3>
            <?php
            if (isset($error)) {
                echo "<p style='color:red;'>$error</p>";
            }
            ?>
            <input type="text" placeholder="Masukkan NIM/NIP" name="id_admin" required><br><br>
            <input type="password" placeholder="Masukkan Password" name="pass_admin" required>
            <br><br>
            
            <div class="login-btn">
                <input type="submit" value="Masuk">
            </div>
        </form>
        <br>
        <b><a href="index.php">Masuk sebagai Pengguna</a></b>
    </div>

</body>

</html>