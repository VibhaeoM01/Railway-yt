<?php 
session_start();
$servername = "localhost";
$port = 3307; // Adjust the port as needed
$username = "root";
$password = "";
$database= "Railways";
$conn = new mysqli($servername, $username, $password, $database, $port);
if(empty($_SESSION['user_info'])){
    echo "<script type='text/javascript'>alert('Please login before proceeding further!');</script>";
    // exit;
}

if(!$conn){  
    echo "<script type='text/javascript'>alert('Database failed');</script>";
    die('Could not connect: '.mysqli_connect_error());  
}

if (isset($_POST['submit'])) {
    $trains = $_POST['trains'];
    $sql = "SELECT t_no FROM trains WHERE t_name = '$trains'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $email = $_SESSION['user_info'];
    $query = "UPDATE passengers SET t_no='$row[t_no]' WHERE email='$email';";
    if(mysqli_query($conn, $query)) {  
        $message = "Ticket booked successfully";
        // Redirect to another page after processing form data
        header("Location:passenger_info.php");
        exit; // Make sure to exit after the redirect to prevent further execution
    } else {
        $message = "Transaction failed";
    }
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book a ticket</title>
    <LINK REL="STYLESHEET" HREF="STYLE.CSS">
    <style type="text/css">
        /* CSS styles */
    </style>
    <script type="text/javascript">
        // JavaScript validation function
    </script>
</head>
<body>
    <?php
        include ('header.php');
    ?>
    <div id="booktkt">
    <h1 align="center" id="journeytext">Choose your journey</h1><br/><br/>
    <form method="post" name="journeyform" onsubmit="return validate()">
        <select id="trains" name="trains" required>
            <option selected disabled>-------------------Select trains here----------------------</option>
            <option value="rajdhani" >Rajdhani Express - Mumbai Central to Delhi</option>
            <option value="duronto" >Duronto Express - Mumbai Central to Ernakulum</option>
            <option value="geetanjali">Geetanjali Express - CST to Kolkata</option>
            <option value="garibrath" >Garib Rath - Udaipur to Jammu Tawi</option>
            <option value="mysoreexp" >Mysore Express - Talguppa to Mysore Jn</option>
        </select>
        <br/><br/>
        <input type="submit" name="submit" id="submit" class="button" value="Submit" />
    </form>
    </div>
</body>
</html>
