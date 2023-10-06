<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "db_agil";

// Create connection
$koneksi = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($koneksi->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>