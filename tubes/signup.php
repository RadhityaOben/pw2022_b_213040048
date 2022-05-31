<?php 
    session_start();
  require 'db/functions.php';

  if(isset($_SESSION['login'])) {
    header("Location: index.php");
  }

  if(isset($_POST['add'])) {
    $connect = connect();
    $email = $_POST['email'];
    $result = mysqli_query($connect, "SELECT email_pasien FROM pasien WHERE email_pasien = '$email'");

    if(mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Email has already been taken!');
                document.location.href = 'signup.php';
              </script>";
    }
    
    if($_POST['password'] === $_POST['confirmPassword']){
        if(tambahPasien($_POST) > 0) {
          echo "<script>
                  alert('Sign Up success!');
                  document.location.href = 'index.php';
                  </script>";
        }
    }
    else {
        echo "<script>
                alert('Password Doesn't Match!');
                document.location.href = 'signup.php';
              </script>";
    }

  }

?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OHCC - Sign Up</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab - v4.7.1
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <!-- Custom background CSS -->
  <style>
      body{
        height: 100%;   
      }
      .bg{
        background-image: url("assets/img/about.jpg");
        height: 100%; 
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        filter: blur(8px);
      }
  </style>
</head>

<body>
    <div class="bg">
    </div>

    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="card border-dark shadow-lg mb-3" style="max-width: 1000px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="assets/img/gallery/gallery-6.jpg" class="img-fluid rounded-start" style="height: 100%; object-fit: cover; object-position: 80% 0;" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Sign Up</h5>
                            <p class="card-text">Sign Up so you can consult with us. Fill everything to record.</p>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Confirm Your Password</label>
                                    <input type="password" class="form-control" id="password" name="confirmPassword" required>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <div class="mb-3">
                                            <label for="telephone" class="form-label">Telephone</label>
                                            <input type="text" class="form-control" id="telephone" name="telephone" maxlength="13" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Profile Picture</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a href="signin.php" class="align-self-center">I already have an account!</a>
                                    <button type="submit" name="add" class="btn btn-primary">Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>