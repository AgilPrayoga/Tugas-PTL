<?php
include '../konsdb.php';

$sql="DROP TABLE DataAl_buff";
if($koneksi->query($sql)===true){
    echo "Drop Table Data AL berhasil!!";
}else{
    echo"Error,Gagal membuat table".$koneksi->error;
}

$sql ="CREATE TABLE dataal_buff (id INT (6))";

if ($koneksi->query($sql)===true){
    echo "Membuat Table Data AL berhasil!!";
}else{
    echo"Error,Gagal membuat table".$koneksi->error;
}


$kriteria=$_POST['kriteria'];
$bobot=$_POST['bobot'];
$attribut=$_POST['attribut'];

if(isset($_POST['simpan'])){
    $sql="INSERT INTO kriteria(kriteria,bobot,attribut)VALUES('$kriteria','$bobot','$attribut')";
    $query = mysqli_query($koneksi,$sql);
    header("location:../welcome.php?p=kriteria");
}



?>