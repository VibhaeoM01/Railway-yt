<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Railways";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO Passengers (firstName, lastName, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstName, $lastName, $email);

// Set parameters and execute
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
?>
