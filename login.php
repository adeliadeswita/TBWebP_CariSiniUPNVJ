<?php
session_start();
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $query = "SELECT * FROM pengguna WHERE username = '$username' AND pass = '$password'";
    $result = mysqli_query($koneksi, $query);
    if (mysqli_num_rows($result) == 1) {
        // Set sesi pengguna
        $_SESSION['username'] = $username;


        if (stripos($username, "admin") !== false) {
            header("Location: temuan_admin.php"); //Kalo username mengandung admin maka akan dialihkan ke halaman temuan_admin.php
        } else {
            header("Location: temuan_user.php");
        }
        exit;
    } else {
        // Pesan error jika login gagal
        $error = "Username atau password salah!";
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
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #186F65;
        }


        h3 {
            margin: 50px 50px 100px 50px;
            text-align: center;
            font-size: 100px;
            color: white;
            font-family: 'Poppins';
            font-weight: bold;
        }

        input[type=text],
        input[type=password] {
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid grey;
            border-radius: 30px;
            box-sizing: border-box;
        }

        input {
            width: 1000px;
            align-items: center;
            display: flex;
            justify-content: center;
            /* color: black; */
        }

        input[type=submit] {
            padding: 14px 20px;
            background-color: #65C18C;
            border: 1px solid grey;
            border-radius: 30px;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }

        input[type=submit]:hover {
            background-color: white;
            border: 1px solid #65C18C;
            border-radius: 30px;
            color: #65C18C;
        }

        .container {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <h3>CariSini UPNVJ!</h3>
            <?php
            if (isset($error)) {
                echo "<p style='color:red;'>$error</p>";
            }
            ?>
            <!-- <label for="username"><b>Username</b></label> -->
            <input type="text" placeholder="Masukkan username" name="username" required><br><br>

            <!-- <label for="password"><b>Password</b></label> -->
            <input type="password" placeholder="Masukkan password" name="password" required>
            <br><br>

            <div class="login-btn">
                <input type="submit" value="Login">
            </div>

        </form>
    </div>

</body>

</html>