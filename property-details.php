<?php
 include('function.php');
 $listLapangan = readLapangan();
 $listEkstra = readEkstra();

 session_start();
 $datta = $_SESSION['id_pelanggan'];
  $data = readUserProfile($datta);

 if(isset($_GET['id_lapangan'])){
 $idLapangan = $_GET['id_lapangan'];
 $item = readQuery('lapangan', 'id_lapangan', $idLapangan);
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
    <link href="assets/images/ligi.png" rel="icon">

    <title>Pemesanan <?=$item['nama_lapangan']?></title>

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
  <!-- ***** Preloader End ***** -->


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

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb">Pesan Sekarang!</span>
          <h3><?=$item['nama_lapangan']?></h3>
        </div>
      </div>
    </div>
  </div>

  <div class="single-property section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="main-image">
            <img src="assets/images/<?= $item['foto_lapangan'] ?>" alt="">
          </div>
          <div class="main-content">
            <span class="category">Lapangan</span>
            <h4>Cimahi, Kota Bandung Jawa Barat</h4>
            <p>Lapangan futsal adalah sebuah fasilitas olahraga yang dirancang khusus untuk permainan futsal, sebuah variasi dari sepak bola yang dimainkan di dalam ruangan atau area yang lebih kecil. Ukuran lapangan futsal biasanya berkisar antara 25 hingga 42 meter panjangnya dan 16 hingga 25 meter lebarnya, yang membuat permainan menjadi lebih cepat dan dinamis dibandingkan sepak bola tradisional. Permukaan lapangan biasanya terbuat dari bahan sintetis, kayu, atau semen yang halus, memberikan daya cengkeram yang baik dan mendukung pergerakan cepat serta kontrol bola yang lebih baik. Garis-garis pembatas lapangan, termasuk garis tengah, garis gawang, dan garis samping, berwarna putih dengan lebar sekitar 8 cm. Gawang futsal berukuran 3 meter lebar dan 2 meter tinggi, lebih kecil dibandingkan dengan gawang sepak bola biasa, dan ditempatkan di tengah setiap ujung lapangan. Area penalti berbentuk setengah lingkaran dengan radius 6 meter dari pusat garis gawang, di mana kiper boleh menggunakan tangannya dan pelanggaran di dalam area ini dapat berujung pada tendangan penalti. Di sepanjang garis samping dekat area tengah lapangan, terdapat zona khusus untuk pergantian pemain, yang bersifat "rolling" atau terus menerus tanpa menghentikan permainan. Bola yang digunakan dalam futsal juga lebih kecil dan lebih berat dibandingkan bola sepak bola biasa, dirancang untuk mendukung kontrol yang lebih baik dalam ruang yang terbatas.</p>
          </div> 
      </div>
    </div>
  </div>

  <div class="section best-deal">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="section-heading">
            <h6>| Sewa</h6>
            <h2>Booking Disini!</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="tabs-content">
            <div class="row">
              <div class="nav-wrapper ">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab" data-bs-target="#appartment" type="button" role="tab" aria-controls="appartment" aria-selected="true">Ekstra</button>
                  </li>
                </ul>
              </div>              
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="appartment" role="tabpanel" aria-labelledby="appartment-tab">
                  <div class="row">
                    <div class="col-lg-6">
                      <img src="assets/images/orango.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Tambahan</h4>
                      <p>Kami juga menyediakan rompi futsal untuk disewa sebagai sarana fasilitas yang kami adakan.</p>
                      <!-- <div class="icon-button">
                        <a href="#"><i class="fa fa-calendar"></i> Schedule a visit</a>
                      </div> -->
                    </div>
                    <div class="col-lg-3">
                    <form action="#" method="post" role="form" id="form-add" enctype="multipart/form-data">
                      <div class="mb-3">
                          <label for="tanggal_sewa" class="form-label">Tanggal Sewa</label>
                          <input class="form-control" type="date" id="tanggal_sewa" name="tanggal_sewa" required>
                      </div>
                      <div class="mb-3">
                          <label for="jam_awal" class="form-label">Jam Awal</label>
                          <select class="form-control" id="jam_awal" name="jam_awal" required>
                              <option value="">Pilih Jam Awal</option>
                              <option value="07:00">07:00</option>
                              <option value="08:00">08:00</option>
                              <option value="09:00">09:00</option>
                              <option value="10:00">10:00</option>
                              <option value="11:00">11:00</option>
                              <option value="12:00">12:00</option>
                              <option value="13:00">13:00</option>
                              <option value="14:00">14:00</option>
                              <option value="15:00">15:00</option>
                              <option value="16:00">16:00</option>
                              <option value="17:00">17:00</option>
                              <option value="18:00">18:00</option>
                              <option value="19:00">19:00</option>
                              <option value="20:00">20:00</option>
                              <option value="21:00">21:00</option>
                              <option value="22:00">22:00</option>
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="jam_akhir" class="form-label">Jam Akhir</label>
                          <select class="form-control" id="jam_akhir" name="jam_akhir" required>
                              <option value="">Pilih Jam Akhir</option>
                              <option value="08:00">08:00</option>
                              <option value="09:00">09:00</option>
                              <option value="10:00">10:00</option>
                              <option value="11:00">11:00</option>
                              <option value="12:00">12:00</option>
                              <option value="13:00">13:00</option>
                              <option value="14:00">14:00</option>
                              <option value="15:00">15:00</option>
                              <option value="16:00">16:00</option>
                              <option value="17:00">17:00</option>
                              <option value="18:00">18:00</option>
                              <option value="19:00">19:00</option>
                              <option value="20:00">20:00</option>
                              <option value="21:00">21:00</option>
                              <option value="22:00">22:00</option>
                              <option value="23:00">23:00</option>
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="id_ekstra" class="form-label">Nama Ekstra</label>
                          <select class="form-select" id="id_ekstra" name="id_ekstra">
                              <option value="0" selected>Tidak Pilih</option>
                              <?php
                                  foreach($listEkstra as $ekstra){
                                  echo '<option value="'.$ekstra['id_ekstra'].'">'.
                                  $ekstra['nama_ekstra']
                                  .'</option>';
                                  }
                              ?>
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="jumlah_stok" class="form-label">Stok Ekstra</label>
                          <input class="form-control" type="number" id="jumlah_stok" name="jumlah_stok" min="0" required>
                      </div>
                      <div class="mb-3" id="voucher_section" style="display:none;">
                          <label for="id_voucher" class="form-label" >Voucher Diskon</label>
                          <select class="form-control" id="id_voucher" name="id_voucher">
                              <option value= "0" selected>Tidak</option>
                              <option value="1">Pakai</option>
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="metode_bayar" class="form-label">Metode Bayar</label>
                          <select class="form-control" id="metode_bayar" name="metode_bayar" onchange="showQRISImage(this)">
                              <option value="">Pilih Metode Bayar</option>
                              <option value="qris">QRIS</option>
                              <option value="cash">Cash</option>
                          </select>
                      </div>
                      <div class="mb-3" id="qris_image_div" style="display:none;">
                          <img src="assets/images/qris.jpeg" alt="QRIS" >
                      </div>

                      <button type="submit" class="btn btn-primary" name="btn-add" id="btn-add" form="form-add">Submit</button>
                  </form>

                  <script>
                      function showQRISImage(select) {
                          var qrisImageDiv = document.getElementById('qris_image_div');
                          if (select.value === 'qris') {
                              qrisImageDiv.style.display = 'block';
                          } else {
                              qrisImageDiv.style.display = 'none';
                          }
                      }

                      function toggleStockBayar(select) {
                          var stokBayarDiv = document.getElementById('stok_bayar_div');
                          if (select.value === '') {
                              stokBayarDiv.style.display = 'none';
                          } else {
                              stokBayarDiv.style.display = 'block';
                          }
                      }
                      document.getElementById('jam_awal').addEventListener('change', validateTime);
                      document.getElementById('jam_akhir').addEventListener('change', validateTime);
                      document.getElementById('tanggal_sewa').addEventListener('input', validateDate);

                          
                      function validateTime() {
                          const jamAwal = document.getElementById('jam_awal').value;
                          const jamAkhir = document.getElementById('jam_akhir').value;
                          
                          if (jamAwal && jamAkhir) {
                              if (jamAwal >= jamAkhir) {
                                  alert('Jam Awal tidak boleh lebih besar atau sama dengan Jam Akhir');
                                  document.getElementById('jam_akhir').value = '';
                              } else {
                                  checkDuration();
                              }
                          }
                      }

                      function checkDuration() {
                          const jamAwal = new Date(`1970-01-01T${document.getElementById('jam_awal').value}:00`);
                          const jamAkhir = new Date(`1970-01-01T${document.getElementById('jam_akhir').value}:00`);

                          const duration = (jamAkhir - jamAwal) / (1000 * 60 * 60);

                          if (duration >= 10) {
                              document.getElementById('voucher_section').style.display = 'block';
                          } else {
                              document.getElementById('voucher_section').style.display = 'none';
                          }
                      }

                      function validateDate() {
                          const tanggalSewa = document.getElementById('tanggal_sewa').value;
                          const today = new Date().toISOString().split('T')[0];
                          
                          if (tanggalSewa < today) {
                              alert('Tanggal Sewa tidak boleh sebelum hari ini');
                              document.getElementById('tanggal_sewa').value = '';
                          }
                      }

                      // Set the minimum date for the date input to today
                      document.getElementById('tanggal_sewa').setAttribute('min', new Date().toISOString().split('T')[0]);
                  </script>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="footer-no-gap">
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © 2048 Villa Agency Co., Ltd. All rights reserved. 
        
        Design: <a rel="nofollow" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <?php
  if (isset($_POST['btn-add'])) {
  // jalankan query tambah record baru
  $isAddSucceed = addSewa($_POST, $idLapangan, $datta);
  if ($isAddSucceed > 0) {
      // jika penambahan sukses, tampilkan alert
      echo "
      <script>
          alert('Booking Berhasil dibuat');
          document.location.href = 'index.php'; </script>"; 
  } else {
      echo "
      <script>
          alert('Gagal menambahkan Data !');
          document.location.href = 'index.php';
      </script>
      ";
  }
}

  ?>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
</html>