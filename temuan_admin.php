<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CariSini UPNVJ</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Lobster&family=Lobster+Two&family=Pacifico&family=Poppins:wght@100;300;400;700&family=Satisfy&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="navbar.css">

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

      @media (max-width: 768px) {
        body {
            font-size: 14px;
        }
      }

      .logo{
        font-family:'Poppins';
        font-size:xx-large;
        text-shadow: 2px 2px 4px rgba(239, 180, 149);
        color:rgb(87, 19, 19);
      }

      nav{
        display:flex;
        background-color:#F9D7E5;
        border-bottom: 1px solid rgb(131, 81, 81, 0.6);
        justify-content: space-between;
        align-items: center;
        position: fixed;
        padding: 20px 0px 20px 30px;
        top:0;
        left:0;
        right:0;
        z-index:9999;
      }

      /* navbar navigation */
      nav ul{
        list-style-type:none;
        margin:0;
        padding: 8px;
        overflow:hidden;
      }

      nav ul li{
        float: left;
      }

      nav ul li a{
        padding-right:30px;
        padding-left: 30px;
        color: rgb(131, 81, 81);
      }

      nav ul li a:hover{
        font-weight: bold;
        padding: 28px;
        color:rgb(87, 19, 19);
      }

      /* search */
      .nav-extra a{
        color: rgb(131, 81, 81);
        padding-right: 30px;
      }

      .nav-extra a:hover{
        color:rgb(87, 19, 19);
      }
</style>
</head>
<body>
    <nav class="nav">
        <a href="#" class="logo">CariSini UPNVJ</a>
        
        <div class="nav-navigasi">
            <ul>
                <li><a href="#">Informasi Temuan</a></li>
                <li><a href="#pengajuan">Pengajuan</a></li>
                <li><a href="#histori">Histori</a></li>
              </ul>
        </div>
    </nav>
  </body>
</html>
