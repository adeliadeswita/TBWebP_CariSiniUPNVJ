<?php
session_start();
include 'koneksi.php';
$username = $_SESSION['username'];
$nm_lengkap = $_SESSION['nm_lengkap'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pengambilan - CariSini UPNVJ</title>
    <link rel="icon" href="logo/logo-tab.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-..." crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
    body {
    padding-top: 70px;
    }

    .accordion-header button {
        font-weight: bold;
        font-family: 'Poppins';
    }
    </style>
</head>

<body>
    
<?php 
include "navbar_user.php"
?>

    <div class="container mt-3 border rounded bg-white py-4 px-5 mb-5">
        <header>
            <h1 class="title"><a style="text-decoration: none;"><span style= "color:#186F65">Frequently Ask </span><span>Question</span></a></h1>
            <hr>
        </header>
        <div class="accordion-container">
            <div class="accordion accordion-flush" id="accordionFlushExample">

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Bagaimana cara mengambil barang yang ditampilkan dalam informasi temuan?
                    </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Barang yang ada dalam tampilan informasi temuan, 
                    dapat diambil dengan mengisi form pengajuan barang hilang. 
                    Kemudian akan dikonfirmasi oleh Admin apakah pengajuan terverifikasi atau ditolak.</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Mengapa pengajuan pengambilan barang saya ditolak?
                    </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Pengajuan pengambilan barang bisa ditolak oleh Admin jika terdapat perbedaan dalam
                    ciri-ciri barang ataupun kronologi kehilangan barang yang tidak sesuai.</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Berapa lama laporan barang hilang atau ditemukan akan ditampilkan di situs?
                    </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Tidak ada batasan waktu dalam laporan barang hilang. 
                        Selagi barang hilang belum diambil, maka barang akan terus ditampilkan.</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                    Kapan waktu yang tepat untuk bisa mengambil barang yang diajukan?
                    </button>
                    </h2>
                    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Barang hilang yang sudah diajukan untuk diambil, 
                        bisa diambil ketika form pengajuan barang hilang sudah diverifikasi oleh Admin
                        dengan mengecek status pengajuan pada histori.</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                    Apakah ada biaya untuk menggunakan layanan web CariSini?
                    </button>
                    </h2>
                    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Layanan ini gratis dan terbuka untuk semua masyarakat UPNVJ 
                        yang membutuhkan bantuan dalam menemukan atau melaporkan barang hilang.</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                    Bagaimana cara melaporkan barang yang saya temukan?
                    </button>
                    </h2>
                    <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Barang yang ditemukan bisa dilaporakan kepada tata usaha fakultas terdekat 
                    dari tempat barang itu ditemukan, kemudian Admin akan memasukkan info barang tersebut ke dalam website.</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingSeven">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                    Apakah terdapat jam operasional website CariSini UPNVJ?
                    </button>
                    </h2>
                    <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Web beroperasi selama 24 jam, untuk pengambilan barang dari 
                    tata usaha fakultas dimulai dari jam 9:00 - 17:00.</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingEight">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
                    Apa saja informasi yang perlu diberikan saat melaporkan barang hilang?
                    </button>
                    </h2>
                    <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Informasi yang diberikan adalah tanggal berapa barang itu 
                    ditemukan dan lokasi tempat penemuan barang hilang.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "footer.php"
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>