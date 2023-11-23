<?php
include 'konsdb.php';

// Check if the ID parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute SQL statement to delete the record
    $sql = "DELETE FROM alternatif WHERE id = $id";

    if ($koneksi->query($sql) === TRUE) {
        
        header("Location:welcome.php?p=alternatif");
        
        exit();
    } else {
        header("Location:welcome.php?p=alternatif");
        
        exit();
    }
} else {
    echo "ID parameter not set";
}


?>
