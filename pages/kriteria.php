<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>

<body>




    <div class="container">
        <div class="container">
            <h4>Pilih Menu untuk melengkapi data :</h4>
            <ul class="nav nav-pills nav-justified">
                <li class=" nav-item">
                    <a href="#"class="nav-link active">Kriteria</a>
                </li>
                <li class=" nav-item">
                    <a href="welcome.php?p=alternatif"class="nav-link">alternatif</a>
                </li>
                <li class=" nav-item">
                    <a href="welcome.php?p=data"class="nav-link">Data</a>
                </li>
            </ul>
        </div>
        <div class="m-3">
            <a href="welcome.php?p=kriteria-input" class="btn btn-primary"> Tambah Kriteria</a>
        </div>
        <div>
       
            <h1 class="text-center"></h1>
            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th scope="col">no</th>
                        <th scope="col">kriteria</th>
                        <th scope="col">bobot</th>
                        <th scope="col">atribut</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
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

        $nomor =1;
        $query ="SELECT*FROM kriteria";
        $tampil_kriteria = mysqli_query($koneksi,$query);
        if(mysqli_num_rows($tampil_kriteria)>0){
            while($r_tampil_kriteria=mysqli_fetch_array($tampil_kriteria)){

            
        

        ?>
                <tbody>
                    <tr>
                        <td><?php echo $nomor ?></td>
                        <td><?php echo $r_tampil_kriteria['kriteria']; ?></td>
                        <td><?php echo $r_tampil_kriteria['bobot']; ?></td>
                        <td><?php echo $r_tampil_kriteria['attribut']; ?></td>
                        
                    </tr>
                   <?php
         $nomor++; }
        }
        else{
            echo"table tidak ditemukan";
        }
                   
                   
                   ?>
                </tbody>
            </table>
        </div>
    </div>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

        
</body>

</html>
