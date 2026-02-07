<?php
  include('function.php');
  $listlapangan = readLapangan();
  $listEkstra = readEkstra();
  $listBayar = readBayar();

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Khusus Pegawai!</title>

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
                        <h1>Pegawai</h1>
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

  <section id="rekam_medis" class="services">
      <div class="container">

        <div class="section-title">
          <h3>Lapangan</h3>
          <br>
          <a href="addLapangan.php" class="btn btn-success">+ Add Lapangan</a>
          <br><br>
        </div>

        <table class="table table-bordered table-striped table-hover">
            <thead class="table-warning">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Lapangan</th>
                    <th scope="col">Fasilitas</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-success">
                <tr>
                  <?php
                    $count = 1;
                    foreach($listlapangan as $lapangan){

                  ?>
                    <th scope="row"><?= $count ?></td>
                    <td><?= $lapangan['nama_lapangan'] ?></td>
                    <td><?= $lapangan['fasilitas_tambahan'] ?></td>
                    <td>
                    <div class="gallery-item">
                          <a href="assets/images/default.jpg" class="gallery-lightbox">
                              <img src="assets/images/<?= $lapangan['foto_lapangan'] ?>" alt="" width="2px">
                          </a>
                      </div>
                    </td>
                    <td>Rp<?= number_format ($lapangan['harga_lapangan'], 0, "", ".") ?></td>
                    <td>
                    <a href="editLapangan.php?id_lapangan=<?=$lapangan['id_lapangan']?>" class="btn btn-warning"><i class="bi bi-pencil-square">Edit</i></a>
                        <br>
                        <a href="deleteLapangan.php?id=<?=$lapangan['id_lapangan']?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger"><i class="bi bi-trash3">Delete</i></a>
                    </td>
                </tr>
                <?php
                  $count++;
                  }
                ?>
            </tbody>
        </table>

        <br><br>

      </div>
    </section><!-- Lapangan Section -->

    <section id="ekstra" class="services">
      <div class="container">

        <div class="section-title">
          <h3>Ekstra</h3>
          <br>
          <a href="addEkstra.php" class="btn btn-success">+ Add Ekstra</a>
          <br><br>
        </div>

        <table class="table table-bordered table-striped table-hover">
            <thead class="table-warning">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Ekstra</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-success">
                <tr>
                  <?php
                    $count = 1;
                    foreach($listEkstra as $ekstra){

                  ?>
                    <th scope="row"><?= $count ?></td>
                    <td><?= $ekstra['nama_ekstra'] ?></td>
                    <td><?= $ekstra['stok_ekstra'] ?></td>
                    <td>Rp<?= number_format ($ekstra['harga_ekstra'], 0, "", ".") ?></td>
                    <td>
                    <a href="editEkstra.php?id_ekstra=<?=$ekstra['id_ekstra']?>" class="btn btn-warning"><i class="bi bi-pencil-square">Edit</i></a>
                        <br>
                        <a href="deleteEkstra.php?id=<?=$ekstra['id_ekstra']?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger"><i class="bi bi-trash3">Delete</i></a>
                    </td>
                </tr>
                <?php
                  $count++;
                  }
                ?>
            </tbody>
        </table>

        <div class="section-title">
          <h3>Pembayaran</h3>
          <br>
        </div>
        
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-warning">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Durasi</th>
                    <th scope="col">Status</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">ID Pegawai</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-success">
                <tr>
                  <?php
                    $count = 1;
                    foreach($listBayar as $bayar){

                  ?>
                    <td scope="row"><?= $count ?></td>
                    <td>Rp<?= number_format ($bayar['total_harga'], 0, "", ".") ?></td>
                    <td><?= $bayar['durasi_sewa'] ?></td>
                    <td><?= $bayar['status_pembayaran'] ?></td>
                    <td>Rp<?=$bayar['transaksi_timestamp']?></td>
                    <td><?=$bayar['nama_pelanggan']?></td>
                    <td><?=$bayar['id_pegawai']?></td>
                    <td><a href="editStatus.php?id_bayar=<?=$bayar['id_bayar']?>" class="btn btn-warning"><i class="bi bi-pencil-square">Edit</i></a>
                    </td>
                </tr>
                <?php
                  $count++;
                  }
                ?>
            </tbody>
        </table>

      </div>
    </section><!-- Ekstra Section -->

  

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