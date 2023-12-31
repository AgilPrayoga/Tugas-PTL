<?php
session_start();

// Periksa apakah pengguna telah login
if (!isset($_SESSION['username'])) {
  header("location: login.php");
  exit();
}

// Tampilkan halaman selamat datang
?>
<!DOCTYPE html>
<html>

<head>
  <title>Selamat Datang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>

<body style="background-color: #eaeaea;">

  <nav class="navbar navbar-expand-lg navbar-light fixed-top " style="background-color: #563d7c!important;">
  <div class="container  d-flex">
    <a class="navbar-brand text-white fw-bold " href="#"> METODE WP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link text-white" href="welcome.php?p=kriteria">Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="welcome.php?p=kriteria">Data</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="welcome.php?p=metodewp">Metode Wp</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="welcome.php?p=hasilwp">Hasil Wp</a>
        </li>
      </ul>
    </div>
  </div>
    
  </nav>
  <div>
    <?php
    $pages_dir = 'pages';
    if (!empty($_GET['p'])) {
      $pages = scandir($pages_dir, 0);
      unset($pages[0], $pages[1]);
      $p = $_GET['p'];
      if (in_array($p . '.php', $pages)) {
        include($pages_dir . '/' . $p . '.php');
      } else {
        echo "Halaman tidak di temukan";
      }
    } else {
      include($pages_dir . '/kriteria.php');
    }
    ?>
  </div>
   


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>

</html>