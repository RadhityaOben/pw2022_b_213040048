<?php 
session_start();
require '../db/functions.php';

if(!isset($_SESSION['login'])){
  $_SESSION['status'] = "NOT LOGIN";
}

$doctor = query("SELECT * FROM dokter");
$no = 1;

// Doctor Search
if(isset($_POST['submit'])) {
  $doctor = cariDokter($_POST['keyword']);
}

?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
  <title>Admin - Doctor List</title>
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
  
  <!-- ======= Doctor Section ======= -->
  <section id="doctor" class="doctor">
      <div class="container">

        <div class="section-title">
          <h2>Doctor List</h2>
          <p>This table is a list of Doctor who have registered. DO NOT make any changes unless it is necessary.</p>
        </div>

        <div class="row">
          <div class="col">
            <button class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#addModal">Add Doctor</button>
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
          <div class="table-responsive-sm table-doctor">
            <table class="table table-striped table-borderless">
              <thead class="table-primary text-secondary">
                <th class="text-center">No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th colspan="2">Action</th>
              </thead>
              <tbody>
                <?php
                  foreach($doctor as $p) : 
                    $nolist = 1;
                    $consultant = query("SELECT * FROM konsultasi WHERE id_dokter = $p[id_dokter]");
                ?>
                  <tr class="align-middle">
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="col-3"><?= $p["nama_dokter"]; ?></td>
                    <td class="col-3"><?= $p["email_dokter"]; ?></td>
                    <td><?= $p["telepon_dokter"]; ?></td>
                    <td class="col-3">
                      <button class="btn btn-success my-1" data-bs-toggle="modal" data-bs-target="#historyModal<?= $p['id_dokter']?>">More</button>
                      <button class="btn btn-warning my-1" data-bs-toggle="modal" data-bs-target="#editModal<?= $p['id_dokter']?>">Edit</button>
                      <a href="delete.php?idDoctor=<?= $p["id_dokter"]?>" class="btn btn-danger my-1" onclick="return confirm('Are you sure you want to delete it?')">Delete</a>
                    </td>
                </tr>
                <tr>
                  <td>
                    <!-- Modal History -->
                    <div class="modal fade" id="historyModal<?= $p['id_dokter']?>" tabindex="-1" aria-labelledby="HistoryModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable modal-fullscreen-lg-down">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">More About Doctor</h5>
                          </div>
                          <div class="modal-body">
                            <div class="row mb-3">
                              <div class="col">
                                <img src="../assets/img/profile/<?= $p["foto_dokter"]?>" alt="Profile" width="250rem" class="mx-5">
                              </div>
                              <div class="col align-middle">
                                <div class="row">
                                  <div class="lh-1">
                                    <span>Name</span>
                                    <br>
                                    <span class="mx-3 fs-4"><b><?= $p["nama_dokter"]; ?></b></span>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="lh-1">
                                    <span>Telephone</span>
                                    <br>
                                    <span class="mx-3 fs-4"><b><?= $p["telepon_dokter"]; ?></b></span>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="lh-1">
                                    <span>Email</span>
                                    <br>
                                    <span class="mx-3 fs-4"><b><?= $p["email_dokter"]; ?></b></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <table class="table table-striped">
                              <thead>
                                <th class="col-1 text-center">No</th>
                                <th class="col-6">Complaint</th>
                                <th class="col-3">Patient</th>
                                <th class="col-2">Date</th>
                              </thead>
                              <tbody>
                                <?php foreach($consultant as $c) : ?>
                                  <?php $namaPasien = query("SELECT * FROM pasien where id_pasien = $c[id_pasien]")[0] ?>
                                  <tr>
                                    <td class=" text-center"><?= $nolist++; ?></td>
                                    <td><?= $c["keluhan"]; ?></td>
                                    <td><?= $namaPasien['nama_pasien']; ?></td>
                                    <td><?= $c["tgl_konsultasi"]; ?></td>
                                  </tr>
                                <?php endforeach; ?>
                              </tbody>
                            </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End Modal -->
                  </td>
                </tr>

                <!-- Modal Edit-->
                <div class="modal fade" id="editModal<?= $p['id_dokter']?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable modal-fullscreen-lg-down">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Doctor Data</h5>
                      </div>
                      <div class="modal-body">
                        <form action="edit.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="gambarLama" value="<?= $p["foto_dokter"]?>">
                          <div class="mb-3">
                            <div class="row">
                              <div class="col-4">
                                <div class="row">
                                  <label for="image" class="form-label">Profile Picture</label>
                                </div>
                                <div class="row">
                                  <div class="col">
                                    <img src="../assets/img/profile/<?= $p["foto_dokter"]?>" alt="Profile" width="200px" class="mx-5">
                                  </div>
                                </div>
                              </div>
                              <div class="col-5 pt-5 mt-5">
                                <input type="file" class="form-control" id="image" name="image">
                              </div>
                            </div>
                          </div>
                          <input type="hidden" name="id" value="<?= $p['id_dokter']?>">
                          <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" value="<?= $p['nama_dokter']?>" name="name">
                          </div>
                          <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?= $p['email_dokter']?>" name="email">
                          </div>
                          <div class="mb-3">
                            <label for="telephone" class="form-label">Telephone</label>
                            <input type="number" class="form-control" id="telephone" value="<?= $p['telepon_dokter']?>" name="telephone">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" name="submitDoctor" class="btn btn-primary">Save changes</button>
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
      <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable modal-fullscreen-lg-down">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Doctor</h5>
            </div>
            <div class="modal-body">
              <form action="add.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $p['id_dokter']?>">
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
                  <label for="password" class="form-label">Confirm Password</label>
                  <input type="password" class="form-control" id="password" name="confirmPassword" required>
                </div>
                <div class="mb-3">
                  <label for="telephone" class="form-label">Telephone</label>
                  <input type="number" class="form-control" id="telephone" name="telephone" required>
                </div>
                <div class="mb-3">
                  <label for="image" class="form-label">Profile Picture</label>
                  <input type="file" class="form-control" id="image" name="image">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="addDoctor" class="btn btn-primary">Add</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- End Modal Add -->
    
    </section>
    <!-- End Doctor Section -->

    
  
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