
<body>




    <div class="container">
        <div class="container pt-5">
        <h4 class="my-5 text-center fw-bold" >METODE WP</h4>
            <ul class="nav nav-pills nav-justified">
                <li class=" nav-item">
                    <a href="#"class="nav-link bg-secondary text-white active">Kriteria</a>
                </li>
                <li class=" nav-item">
                    <a href="welcome.php?p=alternatif"class="nav-link">Alternatif</a>
                </li>
                <li class=" nav-item">
                    <a href="welcome.php?p=dataAL"class="nav-link">Data</a>
                </li>
            </ul>
        </div>
        <div class="my-3">
            <a href="welcome.php?p=kriteria-input" class="btn btn-success"> Tambah Kriteria</a>
        </div>
        <div>
       
            <h1 class="text-center"></h1>
            <table class="table table-striped">
            <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Kriteria</th>
                        <th scope="col">Bobot</th>
                        <th scope="col">Atribut</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php 
        include 'konsdb.php';

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
                        <td>
                        <a href="welcome.php?p=delete_kriteria&id=<?php echo urlencode($r_tampil_kriteria['id']); ?>"
                                        class="btn btn-danger"
                                        onclick="return confirm('apakah anda yakin ingin menghapus item?')">Delete</a>
                        </td>
                        
                    </tr>
                   <?php
         $nomor++; }
        }
        else{
            // echo"table tidak ditemukan";
        }
                   
                   
                   ?>
                </tbody>
            </table>
        </div>
    </div>


    
        
</body>

</html>
