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
    $history = query("SELECT * FROM konsultasi");
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

<body onload="window.print()">
    <!-- ======= History Section ======= -->
  <section id="print" class="print">
      <div class="container">

        <div class="section-title">
          <h2>History</h2>
        </div>

        <div class="row inv-print">
            <div class="col">
                <button class="btn btn-info text-white rounded-pill px-4" onclick="window.print()">Print</button>
            </div>
            <div class="col-1">
                <button class="btn btn-danger text-white rounded-pill px-4" onclick="window.close()">Close</button>
            </div>
        </div>

        <div class="row mt-3">
          <div class="table-responsive-sm table-print">
            <table class="table table-striped table-borderless">
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


    <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>