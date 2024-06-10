<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Sini UPNVJ</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
        }
        
        input[type=text], input[type=password] 
        {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid grey; border-radius: 30px;
            box-sizing: border-box;
        }
        h3
        {
            margin: 50px 50px 100px 50px;
            text-align: center;
            color: black;
        }
        label 
        {
            text-align: center;
            color: black;
        }
        input[type=submit]
        {
            width: 100%;
            text-align: center; 
            padding: 14px 20px;
            background-color: #17A589 ;
            border: 1px solid grey; border-radius: 30px;
            color : white ;
            cursor: pointer ;
            font-weight; bold ;
        }
        input[type=submit]:hover 
        {
            background-color: white ;
            border: 1px solid #17A589; border-radius: 30px;
            color: #17A589
        }

        .container {
            background; white;
            display: flex;
            justify-content: center; align-items: center; 
            border : 1px solid grey ; border-radius : 30px ; 
            padding : 10px 20px 50px 20px;
            font-family: sans-serif;
            box-shadow: 5px 5px 5px lightgrey;
        }
        
        </style>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <h3>KANTIN <br> "VETERAN" <br> JAKARTA</h3>
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Masukkan username" name="username" required><br><br>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Masukkan password" name="password" required>
            <br><br>
            
            <div class="login-btn">
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
</body>
</html>
