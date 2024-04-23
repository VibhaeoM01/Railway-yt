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
        background-color: white;
        width: 30%;
        margin: auto;
        border-radius: 25px;
        border: 2px solid blue;
        margin-top: 100px;
        background-color: rgba(0,0,0,0.2);
        box-shadow: inset -2px -2px rgba(0,0,0,0.5);
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
    #submit    {
        border-radius: 5px;
        background-color: rgba(0,0,0,0);
        padding: 7px 7px 7px 7px;
        box-shadow: inset -1px -1px rgba(0,0,0,0.5);
        font-family:"Comic Sans MS", cursive, sans-serif;
        font-size: 17px;
        margin:auto;
        margin-top: 20px;
        display:block;
        color: white;
    }
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
    <form id="login
