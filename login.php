<?php
session_start();
$servername = "localhost";
$port = 3307; // Adjust the port as needed
$username = "root";
$password = "";
$database= "Railways";
$conn = new mysqli($servername, $username, $password, $database, $port);
if (isset($_POST['submit'])) {
    $conn = mysqli_connect($servername, $username, $password, $database, $port);
    if(!$conn) {  
        echo "<script type='text/javascript'>alert('Database failed');</script>";
        die('Could not connect: '.mysqli_connect_error());  
    }
    $email=$_POST['email'];
    $pw=$_POST['pw'];
    $sql = "SELECT * FROM passengers WHERE email = '$email' AND password = '$pw';";
    $sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
    $user = mysqli_fetch_assoc($sql_result);
    if(!empty($user)){
        $_SESSION['user_info'] = $user['email']; 
        $message='Logged in successfully';
    } else {
        $message = 'Wrong email or password.';
    }
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
     




<script type="text/javascript">
    function validate()    {
        var EmailId=document.getElementById("email");
        var atpos = EmailId.value.indexOf("@");
        var dotpos = EmailId.value.lastIndexOf(".");
        var pw=document.getElementById("pw");
        if (atpos<1 || dotpos<atpos+2 || dotpos+2>=EmailId.value.length) 
        {
            alert("Enter valid email-ID");
            EmailId.focus();
            return false;
        }
        if(pw.value.length< 8)
        {
            alert("Password consists of atleast 8 characters");
            pw.focus();
            return false;
        }
        return true;
    }
</script>

<style type="text/css">
    #loginarea{
        background-color: red;
        width: 30%;
        margin: auto;
        border-radius: 25px;
        border: 2px solid black;
        margin-top: 100px;
        background-color: rgba(0,0,0,0.2);
        padding: 40px;
        font-family:sans-serif;
        font-size: 20px;
        color: white;
    }
    html { 
        background: url(img/bg4.jpg) no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    #submit {
    border-radius: 5px;
    background-color: green;
    padding: 7px 7px 7px 7px;
    box-shadow: -1px 1px 7px 3px green;
    /* font-family: "Comic Sans MS", cursive, sans-serif; */
    font-size: 17px;
    margin: auto;
    margin-top: 20px;
    display: block;
    color: white;
    border: 1px;
    #logintext    {
        text-align: center;
    }
    .data    {
        color: white;
    }
</style>
<body>
    <?php include("header.php") ?>
    <div id="loginarea">
    <form id="login"

    <h1>Login Here TO Book Tickets!</h1>
    <div id="loginarea">
        <h1 style="">Login</h1>
        <form id="loginForm" action="" method="post" onsubmit="return validate()">
            <div id="logintext">
                Email: <input type="text" id="email" name="email" required><br><br>
                Password: <input type="password" id="pw" name="pw" required><br><br>
                <input type="submit" id="submit" name="submit" value="Submit">
            </div>
        </form>
</div>
</body>
</html>

