<?php 
session_start();
require '../db/functions.php';

if(!isset($_SESSION['login'])){
  $_SESSION['status'] = "NOT LOGIN";
}

if($_SESSION['status'] !== "SUPER ADMIN"){
  header('Location: ../');
}

$admin = query("SELECT * FROM admin");
$no = 1;

// Admin Search
if(isset($_POST['submit'])) {
  $admin = cariAdmin($_POST['keyword']);
}

?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
  <title>Admin - Admin List</title>
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
  <!-- Header -->
  <?php
    include_once '../separate/topbar.php';
    include_once '../separate/header.php';
  ?>
  <!-- End Header -->
  
  <!-- ======= Admin Section ======= -->
  <section id="admin" class="admin">
      <div class="container">

        <div class="section-title">
          <h2>Admin List</h2>
        </div>

        <div class="row">
          <div class="col">
            <button class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#addModal">Add Admin</button>
          </div>
          <div class="col-3">
            <form action="" method="POST">
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="button-search" name="keyword" id="keyword">
                <button class="btn btn-outline-primary" type="submit" id="button-search" name="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>

        <div class="row">
          <div class="table-responsive-sm table-admin">
            <table class="table table-striped table-borderless">
              <thead class="table-primary text-secondary">
                <th class="text-center">No</th>
                <th>Code</th>
                <th>Username</th>
                <th colspan="2">Action</th>
              </thead>
              <tbody>
                <?php
                  foreach($admin as $p) : 
                    $nolist = 1;
                ?>
                  <tr class="align-middle">
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="col-3"><?= $p["kode_admin"]; ?></td>
                    <td class="col-3"><?= $p["username"]; ?></td>
                    <td class="col-3">
                      <button class="btn btn-warning my-1" data-bs-toggle="modal" data-bs-target="#editModal<?= $p['id_admin']?>">Edit</button>
                      <a href="delete.php?idAdmin=<?= $p["id_admin"]?>" class="btn btn-danger my-1" onclick="return confirm('Are you sure you want to delete it?')">Delete</a>
                    </td>
                </tr>

                <!-- Modal Edit-->
                <div class="modal fade" id="editModal<?= $p['id_admin']?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable modal-fullscreen-lg-down">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Admin Data</h5>
                      </div>
                      <div class="modal-body">
                        <form action="edit.php" method="POST">
                          <input type="hidden" name="id" value="<?= $p['id_admin']?>">
                          <div class="mb-3">
                            <label for="code" class="form-label">Admin Code</label>
                            <input type="text" class="form-control" id="code" value="<?= $p['kode_admin']?>" name="code" readonly>
                          </div>
                          <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" value="<?= $p['username']?>" name="username">
                          </div>
                          <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                          </div>
                          <div class="mb-3">
                            <label for="password" class="form-label">Confirm your Password</label>
                            <input type="password" class="form-control" id="password" name="confirmPassword">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" name="submitAdmin" class="btn btn-primary">Save changes</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

              <?php endforeach; ?>
              <!-- End Foreach -->
              </tbody>
            </table>
          </div>
          
        </div>
        
      </div>

      <!-- Modal Add-->
      <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable modal-fullscreen-lg-down">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
            </div>
            <div class="modal-body">
              <form action="add.php" method="POST">
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Confirm your Password</label>
                  <input type="password" class="form-control" id="password" name="confirmPassword">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="addAdmin" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- End Admin Section -->
  
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