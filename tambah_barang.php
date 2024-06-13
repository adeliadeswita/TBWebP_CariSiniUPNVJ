<!DOCTYPE html> 
<html lang="id"> 
<head> 
    <meta charset="UTF-8"> 
    <title>Informasi Temuan- CariSini UPNVJ</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">

    <style>
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
</style>
</head> 
<body>
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