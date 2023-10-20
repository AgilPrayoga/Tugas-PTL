<?php
include '../konsdb.php';

$sql="DROP TABLE DataAL_Buff ";
if($koneksi->query($sql)===true){
    echo "Drop Table Data AL berhasil!!";
}else{
    echo"Error,Gagal membuat table".$koneksi->error;
}

$sql ="CREATE TABLE DataAL_Buff (id INT (6))";

if ($koneksi->query($sql)===true){
    echo "Membuat Table Data AL berhasil!!";
}else{
    echo"Error,Gagal membuat table".$koneksi->error;
}


$alternatif=$_POST['alternatif'];
$keterangan=$_POST['keterangan'];


if(isset($_POST['simpan'])){
    $sql="INSERT INTO alternatif(alternatif,keterangan)VALUES('$alternatif','$keterangan')";
    $query = mysqli_query($koneksi,$sql);
    header("location:../welcome.php?p=alternatif");
}



?>