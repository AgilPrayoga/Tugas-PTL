
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
  <form  action="pages/kriteria-inputproses.php" method="post">
  <!-- Email input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="kriteria">Kriteria</label>
    <input type="text" id="kriteria" name="kriteria" placeholder="kriteria" class="form-control" />
  </div>
  <div class="form-outline mb-4">
    <label class="form-label" for="bobot">Bobot</label>
    <input type="text" id="bobot" name="bobot" placeholder="bobot" class="form-control" />
  </div>
  <div class="form-outline mb-4">
    <input type="radio" id="cost" name="attribut" value="cost" class="" />
    <label class="form-label" for="cost">Cost</label>
    <input type="radio" id="benefit" name="atrribut" value="benefit" class="" />
    <label class="form-label" for="benefit">Benefit</label>
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