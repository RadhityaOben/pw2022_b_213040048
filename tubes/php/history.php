<?php 
session_start();
require '../db/functions.php';

if(!isset($_SESSION['login'])){
  $_SESSION['status'] = "NOT LOGIN";
}
if($_SESSION['status'] === "USER") {
    $history = query("SELECT * FROM konsultasi WHERE id_pasien = $_SESSION[id]");
}
else if($_SESSION['status'] === "DOCTOR") {
    $history = query("SELECT * FROM konsultasi WHERE id_dokter = $_SESSION[id]");
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

    <!-- ======= Patient Section ======= -->
  <section id="patient" class="patient">
      <div class="container">

        <div class="section-title">
          <h2>History</h2>
        </div>

        <div class="row">
          <div class="col">
          </div>
          <div class="col-3">
            <form action="" method="POST">
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="button-search" name="keyword">
                <button class="btn btn-outline-primary" type="submit" id="button-search" name="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>

        <div class="row">
          <div class="table-responsive-sm table-patient">
            <table class="table table-striped table-borderless">
              <thead class="table-primary text-secondary">
                <th class="text-center">No</th>
                <th>Complaint</th>
                <?php if($_SESSION['status'] === "USER") {?>
                <th>Doctor</th>
                <?php } else if($_SESSION['status'] === "DOCTOR") {?>
                <th>Patient</th>
                <?php } ?>
                <th>Date</th>
                <th>Media</th>
              </thead>
              <tbody>
                <?php
                  foreach($history as $p) :
                  if($_SESSION['status'] === "USER"){
                    $nama = query("SELECT * FROM dokter where id_dokter = $p[id_dokter]")[0]["nama_dokter"];
                  } else if($_SESSION['status'] === "DOCTOR"){
                    $nama = query("SELECT * FROM pasien where id_pasien = $p[id_pasien]")[0]["nama_pasien"];
                  }
                ?>
                  <tr class="align-middle">
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="col-5"><?= $p["keluhan"]; ?></td>
                    <td class="col-3"><?= $nama; ?></td>
                    <td><?= $p["tgl_konsultasi"]; ?></td>
                    <td><?= $p["media_konsultasi"]; ?></td>
                </tr>

              <?php endforeach; ?>
              <!-- End Foreach -->
              </tbody>
            </table>
          </div>
          
        </div>
        
      </div>

    
    </section>
    <!-- End Patient Section -->

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