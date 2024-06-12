<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CariSini UPNVJ</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-..." crossorigin="anonymous">
  
    <style>
        .custom-th {
            color: #186F65;
            font-size: smaller;
            text-align:center;
        }

        .title {
            font-size:x-large;
            font-weight:bold;
        }

        *{
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
        }

        body{
            display:block;    
            font-family: 'Poppins';
        }

        .logo{
            font-family:'Poppins';
            font-size:x-large;
            font-weight:bold;
            color:white;
            padding: 0px 0px 0px 30px;
        }

        nav{
            display:flex;
            font-size:medium;
            background-color:#186F65;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            padding: 5px 0px 5px 0px;
            top:0;
            left:0;
            right:0;
            z-index:9999;
            text-decoration:none;
        }

        nav ul{
            font-weight: bold;
            list-style-type:none;
            margin:0;
            padding: 8px;
            overflow:hidden;
        }

        nav ul li{
            font-weight: bold;
            float: left;
        }

        nav ul li a{
            font-weight: bold;
            padding-right:30px;
            padding-left: 30px;
            color: white;
            text-decoration:none;
        }

        .nav-navigasi ul li a:hover{
            font-weight: bold;
            padding: 30px;
            color:#65C18C;
        }

        .btn{
            color: #65C18C;
            border-color: lightgray;
        }

        .btn:hover {
            color: white;
            background-color: #65C18C; 
            border-color: #65C18C;
        }
    </style>
</head>
<body class="bg-light">
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

    <div style="margin-top: 70px;">
        <div class="container mt-5 border rounded bg-white py-4 px-5 mb-5">
            <header style="margin-bottom:-30px;">
                <h1 class="title"><a style="text-decoration: none;"><span style= "color:#186F65">Verifikasi </span><span>Pengajuan</span></a></h1>
                <hr>
            </header>

            <section>
                <?php
                if (isset($_GET["message"])) {
                    echo "<div class=\"alert alert-success my3\">".$_GET["message"]."</div>";
                }
                ?>

                <div class="table-responsive">
                    <table class="table table-striped mt-4">
                        <thead>
                            <tr>
                                <th class="custom-th" scope="col">Nomor</th>
                                <th class="custom-th" scope="col">NIM/NIP</th>
                                <th class="custom-th" scope="col">Nama Lengkap</th>
                                <th class="custom-th" scope="col">KTP/KTM</th>
                                <th class="custom-th" scope="col">Kode Barang</th>
                                <th class="custom-th" scope="col">Nama Barang</th>
                                <th class="custom-th" scope="col">Tanggal Hilang</th>
                                <th class="custom-th" scope="col">Spesifikasi</th>
                                <th class="custom-th" scope="col">Kronologi Kehilangan</th>
                                <th class="custom-th" scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include("koneksi.php");

                            $query = "SELECT * FROM pengajuan";
                            $result = mysqli_query($koneksi, $query);

                            if(!$result){
                                die ("Query Error:".mysqli_errno($koneksi)." -".mysqli_error($koneksi));
                            }
                            $i = 1;

                            while($data = mysqli_fetch_assoc($result)) {
                                $raw_date = strtotime($data["tgl_hilang"]);
                                $date = date("d - m - Y", $raw_date);

                                echo "<tr>";
                                echo "<th scope=\"row\">$i</th>";
                                echo "<td>$data[username]</td>";
                                echo "<td>$data[nm_lengkap]</td>";
                                echo "<td><img src='data:ktm_ktm;base64, " . base64_encode($data['ktp_ktm']) . "' alt='Image' style='width:120px; height:80px;'></td>";
                                echo "<td>$data[kd_brg]</td>";
                                echo "<td>$data[nm_brg_ajuan]</td>";
                                echo "<td>$date</td>";
                                echo "<td>$data[spek_brg_ajuan]</td>";
                                echo "<td>$data[kron_hilang]</td>";
                                echo "<td>$data[status]</td>";
                                echo "<td class=\"text-center\">";
                                echo "<form action=\"verifikasi_aksi.php\" method=\"post\" class=\"d-inline-block mb-2\">";
                                echo "<input type=\"hidden\" name=\"username\" value=\"$data[username]\">";

                                if ($data['status'] == 'Terverifikasi') {
                                    echo "<input type=\"button\" value=\"Verifikasi\" class=\"btn btn-success\" disabled>";
                                } else {
                                    echo "<input type=\"submit\" name=\"verifikasi\" value=\"Verifikasi\" class=\"btn btn-info text-white\"
                                        style=\"width:100px; background-color: #65C18C; color: white;\" 
                                        onmouseenter=\"this.style.backgroundColor='#186F65'\" 
                                        onmouseout=\"this.style.backgroundColor='#65C18C'\">";
                                }
                                echo "</form>";
                                echo "</td>";
                                echo "</tr>";
                                $i++;
                            }
                            mysqli_free_result($result);
                            mysqli_close($koneksi);
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
