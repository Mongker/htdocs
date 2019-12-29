<?php
//kết nối database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "K3Office";
$id=(isset($_GET['id']))?$_GET['id']:0;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>