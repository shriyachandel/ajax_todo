<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "ajax_todo";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>