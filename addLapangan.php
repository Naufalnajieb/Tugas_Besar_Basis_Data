<?php
    include('function.php');

    if (isset($_POST['btn-add'])) {
        // jalankan query tambah record baru
        $isAddSucceed = addLapangan($_POST, $_FILES);
        if ($isAddSucceed > 0) {
            // jika penambahan sukses, tampilkan alert
            echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'admin.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Gagal menambahkan Data !');
                document.location.href = 'admin.php';
            </script>
            ";
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Villa Agency - Real Estate HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


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
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End *****


  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">
                        <h1>Admin</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li><a href="logout.php">  Log out</a></li>
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

  <div class="main-div">
        <div class="panel">
            <h2>Tambah Lapangan</h2>
            <br>
        </div>
        <form action="#" method="post" role="form" id="form-add" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id">
            <div class="mb-3">
                <label for="nama_lapangan" class="form-label">Nama Lapangan</label>
                <input type="text" class="form-control" id="nama_lapangan" name="nama_lapangan" required>
            </div>
            <div class="mb-3">
                <label for="fasilitas_tambahan" class="form-label">Fasilitas Tambahan</label>
                <input type="text" class="form-control" id="fasilitas_tambahan" name="fasilitas_tambahan" required>
            </div>
            <div class="mb-3">
                <label for="harga_lapangan" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga_lapangan" name="harga_lapangan" required>
            </div>

            <div class="mb-3">
                <label for="foto_lapangan" class="form-label">Foto</label>
                <input class="form-control" type="file" id="foto_lapangan" name="foto_lapangan" required>
            </div>

            <a href="admin.php"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button></a>
            <button type="submit" class="btn btn-primary text-white" name="btn-add" id="btn-add" form="form-add">Tambah Lapangan</button>
        </form>

        
        <p class="botto-text"> by Cairocoders</p>
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