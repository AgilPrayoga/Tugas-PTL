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
                    <a href="welcome.php?p=kriteria"class="nav-link ">Kriteria</a>
                </li>
                <li class=" nav-item">
                    <a href="welcome.php?p=alternatif"class="nav-link active">alternatif</a>
                </li>
                <li class=" nav-item">
                    <a href="welcome.php?p=dataAL"class="nav-link">Data</a>
                </li>
            </ul>
        </div>
        <div class="m-3">
            <a href="welcome.php?p=alternatif-input" class="btn btn-primary"> Tambah Alternatif</a>
        </div>
        <div>
       
            <h1 class="text-center"></h1>
            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">alternatif</th>
                        <th scope="col">keterangan</th>
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
        $query ="SELECT*FROM alternatif";
        $tampil_alternatif= mysqli_query($koneksi,$query);
        if(mysqli_num_rows($tampil_alternatif)>0){
            while($r_tampil_alternatif=mysqli_fetch_array($tampil_alternatif)){

            
        

        ?>
                <tbody>
                    <tr>
                        <td><?php echo $nomor ?></td>
                        <td><?php echo $r_tampil_alternatif['alternatif']; ?></td>
                        <td><?php echo $r_tampil_alternatif['keterangan']; ?></td>
                       
                        
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
