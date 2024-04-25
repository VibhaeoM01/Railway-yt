<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Railways";
$port = 3307;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO Passengers (firstName, lastName, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $firstName, $lastName, $email);

    // Set parameters
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];

    // Execute the statement
    $stmt->execute();

    echo "New record created successfully";

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
