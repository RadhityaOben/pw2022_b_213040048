<?php 
session_start();
require '../db/functions.php';

if(!isset($_SESSION['login'])){
  header("Location: ../index.php");
}
if($_SESSION['status'] === "USER") {
    $history = query("SELECT * FROM konsultasi WHERE id_pasien = $_SESSION[id]");
}
else if($_SESSION['status'] === "DOCTOR") {
    $history = query("SELECT * FROM konsultasi WHERE id_dokter = $_SESSION[id]");
}
else {
  if(isset($_GET['cat'])) {
    $kategori = $_GET['cat'];
    if($kategori === "id_pasien") {
      $history = query("SELECT k.*, p.id_pasien, p.nama_pasien FROM konsultasi k NATURAL JOIN pasien p ORDER BY p.nama_pasien ASC");
    }
    else if ($kategori === "id_dokter") {
      $history = query("SELECT k.*, d.id_dokter, d.nama_dokter FROM konsultasi k NATURAL JOIN dokter d ORDER BY d.nama_dokter ASC");
    }
    else {
      $history = query("SELECT * FROM konsultasi ORDER BY $kategori ASC");
    }
  }
  else {
    $history = query("SELECT * FROM konsultasi");
  }
}

// History Search
if(isset($_POST['submit'])) {
  $history = cariHistory($_POST['keyword']);
}

$no = 1;
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
  <title>History</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  
  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  
  <!-- =======================================================
  * Template Name: Medilab - v4.7.1
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <?php include_once '../separate/topbar.php' ?>
    <?php include_once '../separate/header.php' ?>

    <!-- ======= History Section ======= -->
  <section id="history" class="history">
      <div class="container">

        <div class="section-title">
          <h2>History</h2>
        </div>

        <div class="row">
          <div class="col">
            <?php if($_SESSION['status'] === "ADMIN" || $_SESSION['status'] === "SUPER ADMIN") { ?>
            <a href="print.php" target="_blank"><button class="btn btn-info text-white rounded-pill px-4">Print</button></a>
          </div>

          <div class="col">
          </div>

          <div class="col-3">
          </div>

          <div class="col">
            <div class="input-group mb-3 order" id="order">
              <button class="btn btn-outline-success active asc" id="asc" onclick="order('asc')" id="order" value="ASC">ASC</button>
              <button class="btn btn-outline-success desc" id="desc" onclick="order('desc')" id="order" value="DESC">DESC</button>
            </div>
          </div>
          <div class="col-2">
            <div class="input-group mb-3">
              <select name="category" id="category" class="form-control form-select" onchange="window.location.href=this.value">
                <option value="">Category</option>
                <option value="history.php?cat=keluhan">Complaint</option>
                <option value="history.php?cat=id_pasien">Patient</option>
                <option value="history.php?cat=id_dokter">Doctor</option>
                <option value="history.php?cat=tgl_konsultasi">Date</option>
                <option value="history.php?cat=media_konsultasi">Media</option>
              </select>
              <a href="history.php" class="btn btn-outline-warning" id="button-search" name="submit">Reset</a>
            </div>
            <?php } ?>
          </div>
          <div class="col-3">
            <form action="" method="POST">
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="keyword" id="keyword">
                <button class="btn btn-outline-primary" type="submit" id="button-search" name="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>

        <div class="row">
          <div class="table-responsive-sm table-history" id="history-ajax">
            <table class="table table-striped table-borderless" id="table-history">
              <thead class="table-primary text-secondary">
                <th class="text-center col-1">No</th>
                <th>Complaint</th>
                <?php if($_SESSION['status'] === "USER") {?>
                <th>Doctor</th>
                <?php } else if($_SESSION['status'] === "DOCTOR") {?>
                <th>Patient</th>
                <?php } else {?>
                <th>Patient</th>
                <th>Doctor</th>
                <?php } ?>
                <th>Date</th>
                <th>Media</th>
              </thead>
              <tbody>
                <?php
                  foreach($history as $p) :
                    $namaDokter = query("SELECT * FROM dokter where id_dokter = $p[id_dokter]")[0]["nama_dokter"];
                    $namaPasien = query("SELECT * FROM pasien where id_pasien = $p[id_pasien]")[0]["nama_pasien"];
                    ?>
                  <tr class="align-middle">
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="col-5"><?= $p["keluhan"]; ?></td>
                    <?php if($_SESSION['status'] === "USER"){ ?>
                    <td class="col-3"><?= $namaDokter; ?></td>
                    <?php } else if($_SESSION['status'] === "DOCTOR"){ ?>
                    <td class="col-3"><?= $namaPasien; ?></td>
                    <?php } else {?>
                    <td class="col-2"><?= $namaPasien; ?></td>
                    <td class="col-2"><?= $namaDokter; ?></td>
                    <?php } ?>
                    <td class="col-1"><?= $p["tgl_konsultasi"]; ?></td>
                    <td class="col-1"><?= $p["media_konsultasi"]; ?></td>
                </tr>

              <?php endforeach; ?>
              <!-- End Foreach -->
              </tbody>
            </table>
          </div>
          
        </div>
        
      </div>

    
    </section>
    <!-- End History Section -->

    <!-- ======= Footer ======= -->
    <?php include_once '../separate/footer.php' ?>
    <!-- End Footer -->

    <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>