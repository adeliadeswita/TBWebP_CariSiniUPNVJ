<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $query = "SELECT * FROM pengguna WHERE username = '$username' AND pass = '$password'";
    $result = mysqli_query($koneksi, $query);

    if (!preg_match("/^[0-9]{10}(?:[0-9]{8})?$/",$username)) {
        $error = "Username harus berupa angka 10 atau 18 digit";
    } else {
        $query = "SELECT * FROM pengguna WHERE username = '$username' AND pass = '$password'";
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $username;
            $_SESSION['nm_lengkap'] = $row['nm_lengkap'];
            header("Location: temuan_user.php");
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
    <title>CariSini UPNVJ</title>
    <link rel="icon" href="logo/logo-tab.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style_login.css">
</head>

<body>
    <div class="content-wrapper">
    <img src="logo/logo-title.png" alt="Logo" class="logo">
        <div class="container">
        <form action="" method="post">
            <h3>Pengguna</h3>
            <?php
            if (isset($error)) {
                echo "<p style='color:red;'>$error</p>";
            }
            ?>
            <input type="text" placeholder="Masukkan NIM/NIP" name="username" required><br><br>
            <input type="password" placeholder="Masukkan Kata Sandi" name="password" required>
            <br><br>
            
            <div class="login-btn">
                <input type="submit" value="Masuk">
            </div>
        </form>
        <br>
        <b><a href="login_admin.php">Masuk sebagai Admin</a></b>
    </div>
    <footer>
        All Rights Reserved | © CariSini UPNVJ! - 2024
    </footer>
</body>
</html>