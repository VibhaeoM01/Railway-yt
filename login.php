<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style type="text/css">
        html { 
            background: url(img/bg1.jpg) no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        #loginarea {
            background-color: rgba(0,0,0,0.2);
            width: 30%;
            margin: auto;
            border-radius: 25px;
            border: 2px solid black;
            margin-top: 100px;
            padding: 40px;
            font-family:sans-serif;
            font-size: 20px;
            color: white;
        }
        #submit {
            border-radius: 5px;
            background-color: green;
            padding: 7px;
            box-shadow: -1px 1px 7px 3px green;
            font-size: 17px;
            margin: auto;
            margin-top: 20px;
            display: block;
            color: white;
            border: none;
        }
        #logintext {
            text-align: center;
            padding: 31px;
            font-size: xxx-large;
        }
        .data {
            color: white;
        }
    </style>
</head>
<body>
    <?php include("header.php") ?>
    
    <form id="login" action="login.php" method="post">
        <div id="loginarea">
            <h1 style="text-align:center" >Login</h1>
            <form id="loginForm" action="login.php" method="post" onsubmit="return validate()">
                <div style="text-align:center" id="logintext">
                    Email: <input type="text" id="email" name="email" required><br><br>
                    Password: <input type="password" id="pw" name="pw" required><br><br>
                    <input type="submit" id="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </form>
</body>
</html>
