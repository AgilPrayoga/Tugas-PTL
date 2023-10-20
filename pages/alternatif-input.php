
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>
  <div class="container pt-5">
    <div class="card p-5 w-75 m-auto"> 
  <form  action="pages/alternatif-inputproses.php" method="post">
  <!-- Email input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="alternatif">Alternatif</label>
    <input type="text" id="alternatif" name="alternatif" placeholder="Alternatif" class="form-control" />
  </div>
  <div class="form-outline mb-4">
    <label class="form-label" for="keterangan">Keterangan</label>
    <input type="text" id="keterangan" name="keterangan" placeholder="keterangan" class="form-control" />
  </div>
  
 
  

 

  <!-- Submit button -->
  <button type="submit" name="simpan" class="btn btn-success btn-block">Simpan</button>
  <button type="reset" class="btn btn-danger btn-block">Reset</button>

  <a href="welcome.php?p=kriteria" class="btn btn-warning btn-block">Kembali</a>
</form>
</div>
  </div>


    


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</body>
</html>