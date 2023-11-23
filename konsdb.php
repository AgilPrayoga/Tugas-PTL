<?php
$koneksi = mysqli_connect("localhost", "root", "root", "db_agil");

// Periksa koneksi
if (mysqli_connect_errno()) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}


?>