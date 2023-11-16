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
 
 
     // koneksiny
    $qbrs = "SELECT COUNT(alternatif) as Jbrs FROM alternatif";
    $result = $koneksi->query($qbrs);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $jbrs = $row["Jbrs"];
        }
    } 
    $qklm = "SELECT COUNT(kriteria) as Jklm FROM kriteria";
    $result = $koneksi->query($qklm);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $jklm = $row["Jklm"];
        }
    }    
    
    if (isset($_POST['simpan'])) {
        $sqlal = "SELECT alternatif FROM alternatif";
        $resultal = $koneksi->query($sqlal);
        if ($resultal->num_rows > 0) {
            $i = 1;
            while ($rowal = $resultal->fetch_assoc()) {
                $sql = "UPDATE DataAl SET ";
                $sqlkr = "SELECT kriteria FROM kriteria";
                $resultkr = $koneksi->query($sqlkr);
                if ($resultkr->num_rows > 0) {
                    $j = 1;
                    while ($rowkr = $resultkr->fetch_assoc()) {
                        $sql = $sql . "`" . $rowkr["kriteria"] . "` = "; // Use backticks for column names
                        $data = $_POST['dt' . $i . $j];
                        $sql = $sql . "'" . $data . "'";
                        if ($j < $jklm) {
                            $sql = $sql . ", ";
                        }
                        $j++;
                    }
                }
                $sql = $sql . " WHERE `alternatif` = '" . $rowal["alternatif"] . "';"; // Use backticks for column names
                echo $sql;
                $query = mysqli_query($koneksi, $sql);
                $i++;
            }
        }
        header("location:welcome.php?p=dataAL");
    }
?>