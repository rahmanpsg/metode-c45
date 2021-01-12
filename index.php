<?php 
  $menu = '';
  if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Pengambilan Keputusan</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/resume.min.css" rel="stylesheet">
  <link href="css/sweetalert2.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-table.min.css">
  <link rel="shortcut icon" href="img/profile.jpg" />

</head>
<body>
  <?php 
    include('header.php');
  
    if ($menu == '') {
      include('home.php');
    }elseif ($menu == 'ujidata') {
      include('ujidata.php');
    }elseif ($menu == 'nasabah') {
      include('nasabah.php');
    }elseif ($menu == 'c45') {
      include ('mining.php');
    }elseif ($menu == 'pohonkeputusan') {
      include ('pohonkeputusan.php');
    }elseif ($menu == 'klasifikasi') {
      include ('klasifikasi.php');
    }
  ?>

<div class="preloader-wrapper active">
  <div class="spinner-layer spinner-blue-only">
    <div class="circle-clipper left">
      <div class="circle"></div>
    </div>
    <div class="gap-patch">
      <div class="circle"></div>
    </div>
    <div class="circle-clipper right">
      <div class="circle"></div>
    </div>
  </div>
</div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.js"></script>
  <script src="vendor/jquery/sweetalert2.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/resume.min.js"></script>
  <script src="js/bootstrap-table.min.js"></script>
</body>

</html>
