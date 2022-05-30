<?php 
  require '../db/functions.php';

  if(isset($_POST['add'])) {
    if(tambahPasien($_POST) > 0) {
      echo "<script>
              alert('Data added successfully!');";
      if($_GET['from'] == 'admin'){
        echo  "document.location.href = 'patientlist.php';";
      } else{
        echo "document.location.href = '../';";
      }
      echo "</script>";
    }
  }

?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <?php if($_GET['from'] == 'admin'){ ?>
  <title>Admin - Add Patient</title>
  <?php }else {?>
  <title>Add Patient</title>
  <?php }?>
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

<!-- ======= Appointment Section ======= -->
<section id="appointment" class="appointment section-bg h-100">
      <div class="container">
        <?php if($_GET['from'] == 'admin'){?>
          <div class="section-title">
            <h2>Add New Patient</h2>
          </div>
          <?php } else{ ?>
          <div class="section-title">
            <h2>Register as a new Patient</h2>
          </div>
          <?php } ?>

        <form action="" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6 form-group mx-auto">
              <input type="text" name="name" class="form-control" id="name" placeholder="Patient Name" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group mx-auto mt-3">
              <input type="email" class="form-control" name="email" id="email" placeholder="Patient Email" data-rule="email" data-msg="Please enter a valid email" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group mx-auto mt-3">
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Patient Phone" maxlength="13" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group mx-auto mt-3">
              <input type="file" class="form-control" name="image" id="image">
            </div>
          </div>
          
          <div class="text-center mt-3">
          <?php if($_GET['from'] == 'admin'){ ?>
            <a href="patientlist.php" class="btn btn-danger rounded-pill">Cancel</a>
          <?php }else if($_GET['from'] == 'home') {?>
            <a href="../" class="btn btn-danger">Cancel</a>
          <?php } ?>
            <button type="submit" class="btn rounded-pill" name="add">Complete</button>
          </div>
        </form>

      </div>
    </section><!-- End Appointment Section -->
    