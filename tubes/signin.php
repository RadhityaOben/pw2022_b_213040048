<?php 
  session_start();
  require 'db/functions.php';

  if(isset($_SESSION['login'])) {
    header("Location: index.php");
  }

  if(isset($_POST['signin'])) {
    $connect = connect();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $resultSAdmin = mysqli_query($connect, "SELECT * FROM superadmin WHERE username = '$username'");
    $resultAdmin = mysqli_query($connect, "SELECT * FROM admin WHERE username = '$username'");
    $resultDokter = mysqli_query($connect, "SELECT * FROM dokter WHERE email_dokter = '$username' OR nama_dokter = '$username'");
    $resultPasien = mysqli_query($connect, "SELECT * FROM pasien WHERE email_pasien = '$username' OR nama_pasien = '$username'");

    if(mysqli_num_rows($resultSAdmin) === 1) {
      $row = mysqli_fetch_assoc($resultSAdmin);
      if(sha1($password) === $row['password']) {
        $_SESSION['login'] = true;
        $_SESSION['status'] = "SUPER ADMIN";
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];
        header("Location: php/history.php");
        exit;
      }
    }
    else if(mysqli_num_rows($resultAdmin) === 1) {
      
      $row = mysqli_fetch_assoc($resultAdmin);
      if(sha1($password) === $row['password']) {
        $_SESSION['login'] = true;
        $_SESSION['status'] = "ADMIN";
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id_admin'];
        header("Location: index.php");
        exit;
      }
    }
    else if(mysqli_num_rows($resultDokter) === 1) {
      $row = mysqli_fetch_assoc($resultDokter);
      if(sha1($password) === $row['password']) {
        $_SESSION['login'] = true;
        $_SESSION['status'] = "DOCTOR";
        $_SESSION['username'] = $row['nama_dokter'];
        $_SESSION['id'] = $row['id_dokter'];
        header("Location: index.php");
        exit;
      }
    }
    else if(mysqli_num_rows($resultPasien) === 1) {
      $row = mysqli_fetch_assoc($resultPasien);
      if(sha1($password) === $row['password']) {
        $_SESSION['login'] = true;
        $_SESSION['status'] = "USER";
        $_SESSION['username'] = $row['nama_pasien'];
        $_SESSION['id'] = $row['id_pasien'];
        header("Location: index.php");
        exit;
      }
    }
    $error = true;
  }

?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OHCC - Sign In</title>
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
                        <img src="assets/img/gallery/gallery-6.jpg" class="img-fluid rounded-start" style="height: 500px; object-fit: cover; object-position: 80% 0;" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <h5 class="card-title">Sign In</h5>
                            <a href="index.php" type="button" class="btn-close" aria-label="Close"></a>
                          </div>
                            <p class="card-text">Sign in with your email or name.</p>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username / Email</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" maxlength="13" required>
                                </div>
                                <?php if(isset($error)) {?>
                                  <p class="text-danger">Username / Password does not exist</p>
                                <?php } ?>
                                <div class="mb-3 w-100 d-flex justify-content-between">
                                    <a href="signup.php" class="align-self-center">I don't have an account!</a>
                                    <button type="submit" name="signin" class="btn btn-primary">Sign In</button>
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