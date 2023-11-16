<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "db_agil";

// Create connection
$koneksi = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

// Check if the ID parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute SQL statement to delete the record
    $sql = "DELETE FROM kriteria WHERE id = $id";

    if ($koneksi->query($sql) === TRUE) {
        
        header("Location:welcome.php?p=kriteria");
        
        exit();
    } else {
        header("Location:welcome.php?p=kriteria");
        
        exit();
    }
} else {
    echo "ID parameter not set";
}


?>
