<?php
  include('function.php');

  $listSewa = readSewa();
  

  session_start();
  $datta = $_SESSION['id_pelanggan'];
  $data = readUserProfile($datta);

  
  if(isset($_GET['id_sewa'])){
    $idSewa = $_GET['id_sewa'];
    $item = readQuery('sewa', 'id_sewa', $idSewa);
    $bayar = readPembayaran($idSewa);
     if(!count($item)){
       echo "
       <script>
         alert('Data tidak ditemukan pada database');
         window.location='index.php';
       </script>";
     }
   } else {
     echo "
     <script>
       alert('Masukkan data id.');
       window.location='index.php';
     </script>";
   }

  

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Moriz Futsal</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/images/ligi.png" rel="icon">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 591 villa agency

https://templatemo.com/tm-591-villa-agency

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <!-- <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div> -->
  <!-- ***** Preloader End *****

  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <ul class="info">
            <li><i class="fa fa-envelope"></i> info@company.com</li>
            <li><i class="fa fa-map"></i> Sunny Isles Beach, FL 33160</li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul class="social-links">
            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a href="https://x.com/minthu" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div> -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">
                        <h1>Moriz</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li><a href="index.php">Home</a></li>
                      <li><a href="properties.php">Lapangan</a></li>
                      <li><a href="editProfil.php?id_pelanggan=<?=$data['id_pelanggan']?>"> Hello <?=$data['nama_pelanggan']?></a></li>
                      <li><a href="logout.php"> Log out</a></li>
                    </ul>   
                    <!-- <a class='menu-trigger'>
                        <span>Menu</span>
                    </a> -->
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="properties section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h2>Pembayaran</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <?php
                foreach($bayar as $payment){
            ?>
            <h6>Rp<?= number_format ($payment['total_harga'], 0, "", ".") ?></h6>
            <ul>
              <br>
              <li>Jam Awal: <span><?=$payment['jam_awal']?></span></li>
              <li>Jam Akhir: <span><?=$payment['jam_akhir']?></span></li>
            </ul>
            <div class="main-button">
              <a href="index.php">Bayar Sekarang</a>
            </div>
            <?php
                }
            ?>
          </div>
        </div>
      
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
</html>