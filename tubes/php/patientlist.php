<?php 
session_start();
require '../db/functions.php';

if(!isset($_SESSION['login'])){
  header("Location: ../index.php");
}

if($_SESSION['status'] === "USER"){
  header('Location: ../');
}

$patient = query("SELECT * FROM pasien");
$no = 1;

// Patient Search
if(isset($_POST['submit'])) {
  $patient = cariPasien($_POST['keyword']);
}

?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
  <?php if($_SESSION['status'] === "DOCTOR"){?>
    <title>Doctor - Patient List</title>
    <?php } else{?>
    <title>Admin - Patient List</title>
  <?php } ?>
  
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
  
  <!-- ======= Patient Section ======= -->
  <section id="patient" class="patient">
      <div class="container">

        <div class="section-title">
          <h2>Patient List</h2>
          <p>This table is a list of patients who have registered. DO NOT make any changes unless it is necessary.</p>
        </div>

        <div class="row">
          <div class="col">
            <button class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#addModal">Add Patient</button>
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
          <div class="table-responsive-sm table-patient" id="patient-ajax">
            <table class="table table-striped table-borderless">
              <thead class="table-primary text-secondary">
                <th class="text-center">No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th colspan="2" class="text-center">Action</th>
              </thead>
              <tbody>
                <?php
                  foreach($patient as $p) : 
                    $nolist = 1;
                    $consultant = query("SELECT * FROM konsultasi WHERE id_pasien = $p[id_pasien]");
                ?>
                  <tr class="align-middle">
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="col-3"><?= $p["nama_pasien"]; ?></td>
                    <td class="col-3"><?= $p["email_pasien"]; ?></td>
                    <td><?= $p["telepon_pasien"]; ?></td>
                    <td class="col-3 text-center">
                      <button class="btn btn-success my-1" data-bs-toggle="modal" data-bs-target="#historyModal<?= $p['id_pasien']?>">More</button>
                      <?php if($_SESSION['status'] === "ADMIN" || $_SESSION['status'] === "SUPER ADMIN") {?>
                      <button class="btn btn-warning my-1" data-bs-toggle="modal" data-bs-target="#editModal<?= $p['id_pasien']?>">Edit</button>
                      <a href="delete.php?idPatient=<?= $p["id_pasien"]?>" class="btn btn-danger my-1" onclick="return confirm('Are you sure you want to delete it?')">Delete</a>
                      <?php } ?>
                    </td>
                </tr>
                <tr>
                  <td>
                    <!-- Modal History -->
                    <div class="modal fade" id="historyModal<?= $p['id_pasien']?>" tabindex="-1" aria-labelledby="HistoryModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable modal-fullscreen-lg-down">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">More About Patient</h5>
                          </div>
                          <div class="modal-body">
                            <div class="row mb-3">
                              <div class="col">
                                <img src="../assets/img/profile/<?= $p["foto_pasien"]?>" alt="Profile" width="250rem" class="mx-5">
                              </div>
                              <div class="col align-middle">
                                <div class="row">
                                  <div class="lh-1">
                                    <span>Name</span>
                                    <br>
                                    <span class="mx-3 fs-4"><b><?= $p["nama_pasien"]; ?></b></span>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="lh-1">
                                    <span>Telephone</span>
                                    <br>
                                    <span class="mx-3 fs-4"><b><?= $p["telepon_pasien"]; ?></b></span>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="lh-1">
                                    <span>Email</span>
                                    <br>
                                    <span class="mx-3 fs-4"><b><?= $p["email_pasien"]; ?></b></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <table class="table table-striped">
                              <thead>
                                <th class="col-1 text-center">No</th>
                                <th class="col-6">Complaint</th>
                                <th class="col-3">Doctor</th>
                                <th class="col-2">Date</th>
                              </thead>
                              <tbody>
                                <?php foreach($consultant as $c) : ?>
                                  <?php $namaDokter = query("SELECT * FROM dokter where id_dokter = $c[id_dokter]")[0] ?>
                                  <tr>
                                    <td class=" text-center"><?= $nolist++; ?></td>
                                    <td><?= $c["keluhan"]; ?></td>
                                    <td><?= $namaDokter['nama_dokter']; ?></td>
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
                <div class="modal fade" id="editModal<?= $p['id_pasien']?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable modal-fullscreen-lg-down">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Patient Data</h5>
                      </div>
                      <div class="modal-body">
                        <form action="edit.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="gambarLama" value="<?= $p["foto_pasien"]?>">
                          <div class="mb-3">
                            <div class="row">
                              <div class="col-4">
                                <div class="row">
                                  <label for="image" class="form-label">Profile Picture</label>
                                </div>
                                <div class="row">
                                  <div class="col">
                                    <img src="../assets/img/profile/<?= $p["foto_pasien"]?>" alt="Profile" width="200px" class="mx-5">
                                  </div>
                                </div>
                              </div>
                              <div class="col-5 pt-5 mt-5">
                                <input type="file" class="form-control" id="image" name="image">
                              </div>
                            </div>
                          </div>
                          <input type="hidden" name="id" value="<?= $p['id_pasien']?>">
                          <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" value="<?= $p['nama_pasien']?>" name="name">
                          </div>
                          <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?= $p['email_pasien']?>" name="email">
                          </div>
                          <div class="mb-3">
                            <label for="telephone" class="form-label">Telephone</label>
                            <input type="number" class="form-control" id="telephone" value="<?= $p['telepon_pasien']?>" name="telephone">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" name="submitPatient" class="btn btn-primary">Save changes</button>
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
              <h5 class="modal-title" id="exampleModalLabel">Add Patient</h5>
            </div>
            <div class="modal-body">
              <form action="add.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $p['id_pasien']?>">
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
                <button type="submit" name="addPatient" class="btn btn-primary">Add</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- End Modal Add -->
    
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