<?php
// koneksinya
include 'konsdb.php';

?>
<div class="container pt-5">
<h3 class="my-5 text-center ">Hasil Perhitungan Vector S</h3>
<table class="table table-striped ">
   <thead>
      <tr class="table-primary">
         <th>No</th>
         <th>Alternatif</th>
         <th>Vector S</th>
      </tr>
   </thead>
   <?php
   $nomor = 1;
   $query = "SELECT * FROM alternatif";
   $q_tampil_alternatif = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
   if (mysqli_num_rows($q_tampil_alternatif) > 0) {
      $al = 0;
      while ($r_tampil_alternatif = mysqli_fetch_array($q_tampil_alternatif)) {
         $nmal[$al] = $r_tampil_alternatif['alternatif'];
         $al++;
      }
   }


   $sql = "SELECT * FROM kriteria";
   $result = $koneksi->query($sql) or die(mysqli_error($koneksi));
   if (mysqli_num_rows($result) > 0) {
      $kr = 0;
      $jmlbbt = 0;
      while ($row = $result->fetch_assoc()) {
         $krr[$kr] = $row['kriteria'];
         $bbt[$kr] = $row['bobot'];
         $atb[$kr] = $row['attribut'];
         $jmlbbt = $jmlbbt + $bbt[$kr];
         $kr++;
      }
      for ($y = 0; $y < $kr; $y++) {
         $bbt[$y] = $bbt[$y] / $jmlbbt;
      }
   }


   $sql = 'SELECT * FROM dataAL';
   $result = $koneksi->query($sql) or die(mysqli_error($koneksi));
   if (mysqli_num_rows($result) > 0) {
      $x = 0;
      while ($row = $result->fetch_assoc()) {
         for ($i = 0; $i < $kr; $i++) {
            $Valkrt[$x][$i] = $row[$krr[$i]];
         }
         $x++;
      }
   }
   ?>
   <tbody>
      <?php
      $jumlahVekS = 0;
      for ($i = 0; $i < $al; $i++) {
         $VekS[$i] = 1;
         echo  "<tr>";
         echo "<td>" . $nomor . "</td>";
         echo "<td>" . $nmal[$i] . "</td>";

         //hitung vektor 
         for ($j = 0; $j < $kr; $j++) {
            if ($atb[$j] == "benefit") {
               $VekS[$i] = number_format($Valkrt[$i][$j] * number_format($bbt[$j], 2), 2);
            } else {
               $VekS[$i] = number_format($Valkrt[$i][$j] * -number_format($bbt[$j], 2), 2);
            }
            // echo  $Valkrt[$i][$j] . ',';
         }
         echo "<td>" . number_format($VekS[$i], 2) . "</td>";
         echo "</tr>";
         $nomor++;
      }
      $jumlahVekS = array_sum($VekS);
      ?>
   </tbody>
</table>

<h3 class ="text-center my-5">Hasil Perhitungan Nilai Vektor V</h3>
<table class="table table-striped ">
   <thead>
      <tr class="table-success">
         <th scope="col">No</th>
         <th scope="col">Alternatif</th>
         <th scope="col">Vector V</th>

      </tr>
   </thead>
   <!-- php -->

   <tbody>
      <?php
      $nomor = 1;


      for ($i = 0; $i < $al; $i++) {
         $VekV[$i] = 1;
         echo "<tr>";
         echo "<td>" . $nomor . "</td>";
         echo "<td>" . $nmal[$i] . "</td>";
         $VekS[$i] = $VekS[$i] / $jumlahVekS;
         // $jumlahVekS = $jumlahVekS + $VekS[$i];
         echo "<td>" . number_format($VekS[$i], 2) . "</td>";
         echo "</tr>";
         $nomor++;
      }


      ?>
   </tbody>

   <!-- php -->
</table>
</div>
</div>
<?php


?>
<?php
$datas = [];
for ($i = 0; $i < $al; $i++) {
   $data = ["nama" => $nmal[$i], "nilai" => number_format($VekS[$i], 3)];
   $datas[] = $data;
}

for ($xx = 0; $xx < $al; $xx++) {
   $VSort[$xx] = $VekS[$xx];
}
rsort($VSort);

for ($xx = 0; $xx < $al; $xx++) {
   for ($yy = 0; $yy < $al; $yy++) {
      if ($VSort[$xx] == $VekV[$yy]) {
      }
   }
}


$datasUpdated = [];
for ($i = 0; $i < $al; $i++) {
   for ($j = 0; $j < count($datas); $j++) {
      if (number_format($VSort[$i], 3) == $datas[$j]["nilai"]) {
         $datasUpdated[] = ["nama" => $datas[$j]["nama"], "nilai" => $datas[$j]["nilai"], "rank" => $i + 1];
      } else {
         continue;
      }
   }
}


$sql = "DROP TABLE rankwp";
if ($koneksi->query($sql) === TRUE) {
} else {
   echo "Error Creating Table:" . $koneksi->error;
}

$sql = "CREATE TABLE rankwp(
    id INT(6),
    Nama VARCHAR(30),
    `Rank` INT(6),
    NilaiV float
);";

if ($koneksi->query($sql) === TRUE) {
} else {
   echo "Error Creating Table:" . $koneksi->error;
}

for ($w = 0; $w < count($datasUpdated); $w++) {
   $nama = $datasUpdated[$w]["nama"];
   $rank = $datasUpdated[$w]["rank"];
   $nilaiV = number_format($datasUpdated[$w]["nilai"], 2);
   $sql = "INSERT INTO rankwp(`id`, `Nama`, `Rank`, `NilaiV`) VALUES ($w+1,'$nama',$rank,$nilaiV)";
   $query = mysqli_query($koneksi, $sql);
}
?>







<?php
// for ($i = 0; $i < $al; $i++) {

//    $VekS[$i] = 1;
//    // echo  "<tr>";
//    // echo "<td>" . $nomor . "</td>";
//    // echo "<td>" . $nmal[$i] . "</td>";

//    // //hitung vektor 
//    for ($j = 0; $j < $kr; $j++) {
//       if ($atb[$j] == "benefit") {
//          echo $nmal[$i] . ' | ' . $krr[$j]  . ' | ' . $atb[$j] . ' | ' . number_format($bbt[$j], 2) . ' | ' . $Valkrt[$i][$j] . ' | ' . number_format($Valkrt[$i][$j] ** number_format($bbt[$j], 2), 2)     . '<br>';
//          $VekS[$i] = number_format($Valkrt[$i][$j] * number_format($bbt[$j], 2), 2);
//       } else {
//          echo $nmal[$i] . ' | ' . $krr[$j] . ' | ' . $atb[$j] . " | " . number_format($bbt[$j], 2) . ' | ' . $Valkrt[$i][$j] . ' | ' . number_format($Valkrt[$i][$j] ** -number_format($bbt[$j], 2), 2)  . '<br>';
//          $VekS[$i] = number_format($Valkrt[$i][$j] * -number_format($bbt[$j], 2), 2);
//       }
//    }
//    echo " hasil = " . number_format($VekS[$i], 2)  . "<br>";
//    echo "====================== <br>";
// }

?>