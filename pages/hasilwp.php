<?php 
// koneksinya
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

$sql = "SELECT * FROM rankwp";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
  // Initialize arrays to store data
  $krr = array();
  $bbt = array();
  $atb = array();

  while ($row = $result->fetch_assoc()) {
      $krr[] = $row["Nama"];
      $bbt[] = $row["Rank"];
      $atb[] = $row["NilaiV"];
  }
}

?>
<div class="container pt-5">
<h4 class="my-5 text-center fw-bold" > HASIL METODE WP</h4>
  <table class="table table-striped">
      <thead class="thead-dark">
          <tr>
              <th scope="col">ALternatif</th>
              <th scope="col">Ranking</th>
              <th scope="col">Nilai Vektor V</th>
          </tr>
      </thead>
  
      <tbody>
                  <?php
                  // Display data in the table
                  for ($i = 0; $i < count($krr); $i++) {
                      echo "<tr>";
                      echo "<td>" . $krr[$i] . "</td>";
                      echo "<td>" . $bbt[$i] . "</td>"; // Explicitly cast to int
                      echo "<td>" . $atb[$i] . "</td>";
                      echo "</tr>";
                  }
                  ?>
              </tbody>
  
  </table>
</div>