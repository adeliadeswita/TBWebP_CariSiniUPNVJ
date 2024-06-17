<?php
session_start();
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $query = "SELECT * FROM pengguna WHERE username = '$username' AND pass = '$password'";
    $result = mysqli_query($koneksi, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $username;
        $_SESSION['nm_lengkap'] = $row['nm_lengkap'];

        if (strlen($username) > 10) {
            header("Location: temuan_admin.php");
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
            margin: 20px;
            text-align: center;
            font-size: 50px;
            color: #186F65;
            font-family: 'Poppins';
            font-weight: bold;
        }

        input[type=text],
        input[type=password] {
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid grey;
            border-radius: 20px;
            box-sizing: border-box;
        }

        input {
            width: 800px;
            align-items: center;
            display: flex;
            justify-content: center;
        }

        input[type=submit] {
            padding: 14px 20px;
            background-color: #65C18C;
            border: 1px solid grey;
            border-radius: 20px;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }

        input[type=submit]:hover {
            background-color: #186F65;
            border-radius: 20px;
            color: white;
        }

        .container {
            width: 100%;
            max-width: 1000px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            padding: 50px;
            background-color: #f9f9f9;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
            <input type="text" placeholder="Masukkan NIM/NIP" name="username" required><br><br>
            <input type="password" placeholder="Masukkan Password" name="password" required>
            <br><br>

            <div class="login-btn">
                <input type="submit" value="Masuk">
            </div>
        </form>
    </div>

</body>

</html>