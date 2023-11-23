
<div class="container pt-5">
            <h4 class="my-5 text-center fw-bold" >METODE WP</h4>
            <ul class="nav nav-pills nav-justified">
                <li class=" nav-item">
                    <a href="welcome.php?p=kriteria"class="nav-link ">Kriteria</a>
                </li>
                <li class=" nav-item">
                    <a href="welcome.php?p=alternatif"class="nav-link">Alternatif</a>
                </li>
                <li class=" nav-item">
                    <a href="welcome.php?p=dataAL"class="nav-link bg-secondary text-white active">Data</a>
                </li>
            </ul>
        </div>
<br><br>

<div class="container">

    <h3>Data Alternatif untuk setiap Kriteria</h3>
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


    // koneksinya
    



    $table_name = "DataAL_buff";
    // Mengecek keberadaan tabel dalam database
    $query = "SHOW TABLES LIKE '$table_name'";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        //echo "Tabel '$table_name' ditemukan dalam database '$database'.";
    } else {
        //echo "Tabel '$table_name' tidak ditemukan dalam database '$database'.";
        $sql = "CREATE TABLE DataAL_buff (id INT(6))";
        if ($koneksi->query($sql) === TRUE) {
        } else {
            echo "Error creating table: " . $koneksi->error;
        }
    }	

	$table_name = "DataAL";
    $query = "SHOW TABLES LIKE '$table_name'";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        //echo "Tabel '$table_name' ditemukan dalam database '$database'.";
    } else {
        //echo "Tabel '$table_name' tidak ditemukan dalam database '$database'.";
        //Script membuat tabel DataAL
        $sql = "CREATE TABLE DataAL (nox INT(6))";
        if ($koneksi->query($sql) === TRUE) {
        } else {
            echo "Error creating table: " . $koneksi->error;
        }
    }

    $sql = "SELECT kriteria FROM kriteria";
    $result = $koneksi->query($sql);
    if ($result->num_rows > 0) {
        $x = 0;
        while($row = $result->fetch_assoc()) {
            $krr[$x] = $row["kriteria"]; 
            $x++;
        }
    } 
    else {
        echo "0 results";
    }

    // Nama tabel yang ingin Anda bandingkan
    $tabel1 = "dataal";
    $tabel2 = "dataal_buff";

    // Fungsi untuk mengambil daftar nama kolom dari tabel
    function getTableColumns($koneksi, $tabel) {
        $columns = array();
        $query = "SHOW COLUMNS FROM $tabel";
        $result = $koneksi->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $columns[] = $row['Field'];
            }
        }
        return $columns;
    }

    // Mengambil daftar nama kolom dari masing-masing tabel
    $columnsTabel1 = getTableColumns($koneksi, $tabel1);
    $columnsTabel2 = getTableColumns($koneksi, $tabel2);

    // Membandingkan daftar nama kolom
    if ($columnsTabel1 === $columnsTabel2) {
        // echo "Kedua tabel memiliki urutan kolom yang sama.";
    } 
    else {
        $sql = "DROP TABLE DataAL_buff";    
        if ($koneksi->query($sql) === TRUE) {
            // echo "Drop  Tabel DataAL created successfully";
        } else {
        echo "Error drop table: " . $koneksi->error;
        }

        //membuat table DataAL_Buff
        $sql = "CREATE TABLE DataAL_buff (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            alternatif VARCHAR(25), ";
            
        for ($i = 0; $i < $x - 1; $i++) {            
            $sql .= "`$krr[$i]` FLOAT, ";
        }
        $xx = $x - 1;
        $sql .= "`$krr[$xx]` FLOAT)";

        if ($koneksi->query($sql) === TRUE) {
        } else {
        echo "Error creating table: " . $koneksi->error;
        }

        $sqlal = "SELECT alternatif FROM alternatif";
        $result = $koneksi->query($sqlal);
        if ($result->num_rows > 0) {
            $y = 0;
            while($row = $result->fetch_assoc()) {
                $dtal[$y] = $row["alternatif"]; 
                $sqll = "INSERT INTO DataAL_buff (alternatif) VALUES('$dtal[$y]')";
                $query = mysqli_query($koneksi, $sqll);
                $y=$y+1;
            }
        } 

        else {
            echo "0 results";
        }            
            $sql = "DROP TABLE DataAL";
            if ($koneksi->query($sql) === TRUE) {
                // echo "Drop  Tabel DataAL created successfully";
            } 
            else {
                echo "Error creating table: " . $koneksi->error;
            }

            $query = "CREATE TABLE DataAL AS SELECT * FROM DataAL_buff";
            if ($koneksi->query($query) === TRUE) {
                
            } 
            else {
                echo "Error: " . $koneksi->error;
            }
    }
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Alternatif</th>
        <?PHP
            for($i=0;$i<$x;$i++) {
                echo "<th>".$krr[$i]."</th>";
            }
        ?>
        </tr>
    </thead>
    <tbody>
        <?PHP
            $sql = "SELECT alternatif FROM DataAL";
            $result = $koneksi->query($sql);
            $noal = 1;
            if ($result->num_rows > 0) {
                $brs = 1;
                while($row = $result->fetch_assoc()) {
                    $namaal = $row["alternatif"]; 
                    echo "<tr>";
                    echo "<td>".$noal."</td>";
                    echo "<td>".$namaal."</td>";
                    echo "<form action='welcome.php?p=dataAL-inputproses' method='POST'>";
                    $klm = 1;
                    for($z=0;$z<$x;$z++) {
                        echo "<td><input type='text' name='dt".$brs.$klm."' size='5'></td>";
                        $klm++;
                    }                
                    echo "</tr>";
                    $noal++;
                    $brs++;
                }
            } 
            else {
                echo "0 results";
            }
        ?>
    </tbody>
</table>
<input type="submit" class="btn btn-info my-3" name="simpan" value="Simpan Data Alternatif">
<?PHP 
    echo "</form>";
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Alternatif</th>            
        <?PHP
            for($i=0;$i<$x;$i++) {
                echo "<th>".$krr[$i]."</th>";
            }
        ?>
        </tr>
    </thead>
    <tbody>
        <?PHP         
            $sql = "SELECT * FROM DataAL";
            $result = $koneksi->query($sql);
            $noal = 1;
            if ($result->num_rows > 0) {
                $brs = 1;
                while($row = $result->fetch_assoc()) {
                    $namaal = $row["alternatif"]; 
                    echo "<tr>";
                    echo "<td>".$noal."</td>";
                    echo "<td>".$namaal."</td>";
                    $klm = 1;
                    for($z=0;$z<$x;$z++) {
                        echo "<td>".$row["$krr[$z]"]."</td>";
                        $klm++;
                    }                
                    echo "</tr>";
                    $noal++;
                    $brs++;
                }
            } 
            else {
                echo "0 results";
            }
        ?>
    </tbody>
</table>
</div>