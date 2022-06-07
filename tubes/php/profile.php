<?php 
session_start();
require '../db/functions.php';

if(!isset($_SESSION['login'])){
  header("Location: ../index.php");
}
$id = $_SESSION['id'];

if($_SESSION['status'] === "SUPER ADMIN"){
    $data = query("SELECT * FROM superadmin WHERE id = $id")[0];
}
else if($_SESSION['status'] === "ADMIN") {
    $data = query("SELECT * FROM admin WHERE id_admin = $id")[0];
}
else if($_SESSION['status'] === "DOCTOR") {
    $data = query("SELECT * FROM dokter WHERE id_dokter = $id")[0];
}
else if($_SESSION['status'] === "USER") {
    $data = query("SELECT * FROM pasien WHERE id_pasien = $id")[0];
}


if(isset($_POST['submitSAdmin'])) {
    if(passwordSAdmin($id, $_POST) > 0) {
        echo "<script>
        alert('Password Edited Successfully!');
        document.location.href = 'profile.php';
      </script>";
    }
}
else if(isset($_POST['submitAdmin'])) {
    if(passwordAdmin($id, $_POST) > 0) {
        echo "<script>
        alert('Password Edited Successfully!');
        document.location.href = 'profile.php';
      </script>";
    }
}
else if(isset($_POST['submitDoctor'])) {
    if(passwordDokter($id, $_POST) > 0) {
        echo "<script>
        alert('Password Edited Successfully!');
        document.location.href = 'profile.php';
      </script>";
    }
}
else if(isset($_POST['submitPatient'])) {
    if(passwordPasien($id, $_POST) > 0) {
        echo "<script>
        alert('Password Edited Successfully!');
        document.location.href = 'profile.php';
      </script>";
    }
}

?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
  <title>Profile</title>
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

<?php include_once '../separate/topbar.php'; ?>
<?php include_once '../separate/header.php'; ?>

<section id="profile" class="profile">
    <div class="container">

        <div class="section-title">
            <h2>Profile</h2>
        </div>

        <div class="row mb-3">
            <?php if($_SESSION['status'] === "SUPER ADMIN"){ ?>
            <div class="col align-middle text-center">
                <div class="row mt-3">
                    <div class="col lh-1">
                    <span>Username</span>
                    <span class="mx-3 fs-4"><b><?= $data["username"]; ?></b></span>
                    </div>
                </div>
                <div class="section-title mt-5">
                    <h2>Change Password</h2>
                </div>
                <div class="row">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Confirm your Password</label>
                            <input type="password" class="form-control" id="password" name="confirmPassword" required>
                        </div>
                        <button type="submit" name="submitSAdmin" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
            <?php } else if($_SESSION['status'] === "ADMIN") { ?>
            <div class="col align-middle text-center">
                <div class="row mt-3">
                    <div class="col lh-1">
                    <span>Admin Code</span>
                    <span class="mx-3 fs-4"><b><?= $data["kode_admin"]; ?></b></span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col lh-1">
                    <span>Username</span>
                    <span class="mx-3 fs-4"><b><?= $data["username"]; ?></b></span>
                    </div>
                </div>
                <div class="section-title mt-5">
                    <h2>Change Password</h2>
                </div>
                <div class="row">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Confirm your Password</label>
                            <input type="password" class="form-control" id="password" name="confirmPassword" required>
                        </div>
                        <button type="submit" name="submitAdmin" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
            <?php } else if($_SESSION['status'] === "DOCTOR") { ?>
            <div class="col-4">
                <img src="../assets/img/profile/<?= $data["foto_dokter"]?>" class="img-thumbnail mx-5" alt="Profile" width="300rem">
                <form action="edit.php" method="POST" enctype="multipart/form-data">
                    <div class="input-group my-3">
                        <input type="hidden" name="gambarLama" value="<?= $p["foto_dokter"]?>">
                        <input type="hidden" name="id" value="<?= $data['id_dokter']?>">
                        <input type="hidden" class="form-control" id="name" value="<?= $p['nama_dokter']?>" name="name">
                        <input type="hidden" class="form-control" id="email" aria-describedby="emailHelp" value="<?= $p['email_dokter']?>" name="email">
                        <input type="hidden" class="form-control" id="telephone" value="<?= $p['telepon_dokter']?>" name="telephone">
                        <input type="file" class="form-control" id="image" name="image">
                        <button class="btn btn-outline-primary" type="submit" id="button-update" name="submitDoctor">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col align-middle">
                <table class="row mt-3">
                    <tr class="col lh-1">
                        <td>Name</td>
                        <td class="col-1"></td>
                        <td class="mx-3 fs-4"><b><?= $data["nama_dokter"]; ?></b></td>
                    </tr>
                    <tr class="col lh-1">
                        <td>Telephone</td>
                        <td></td>
                        <td class="mx-3 fs-4"><b><?= $data["telepon_dokter"]; ?></b></td>
                    </tr>
                    <tr class="col lh-1">
                        <td>Email</td>
                        <td></td>
                        <td class="mx-3 fs-4"><b><?= $data["email_dokter"]; ?></b></td>
                    </tr>
                </table>
                <div class="section-title mt-5">
                    <h2>Change Password</h2>
                </div>
                <div class="row">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Confirm your Password</label>
                            <input type="password" class="form-control" id="password" name="confirmPassword" required>
                        </div>
                        <div class="mb-3 text-end">
                            <button type="submit" name="submitDoctor" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php } else if($_SESSION['status'] === "USER") { ?>
            <div class="col-4   ">
                <img src="../assets/img/profile/<?= $data["foto_pasien"]?>" class="img-thumbnail mx-5" alt="Profile" width="300rem">
                <form action="edit.php" method="POST" enctype="multipart/form-data">
                    <div class="input-group my-3">
                        <input type="hidden" name="gambarLama" value="<?= $data["foto_pasien"]?>">
                        <input type="hidden" name="id" value="<?= $data['id_pasien']?>">
                            <input type="hidden" class="form-control" id="name" value="<?= $data['nama_pasien']?>" name="name">
                            <input type="hidden" class="form-control" id="email" aria-describedby="emailHelp" value="<?= $data['email_pasien']?>" name="email">
                            <input type="hidden" class="form-control" id="telephone" value="<?= $data['telepon_pasien']?>" name="telephone">
                        <input type="file" class="form-control" id="image" name="image">
                        <button class="btn btn-outline-primary" type="submit" id="button-update" name="submitPatient">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col align-middle">
                <table class="row mt-3">
                    <tr class="col lh-1">
                        <td>Name</td>
                        <td class="col-1"> </td>
                        <td class="mx-3 fs-4"><b><?= $data["nama_pasien"]; ?></b></td>
                    </tr>
                    <tr class="col lh-1">
                        <td>Telephone</td>
                        <td> </td>
                        <td class="mx-3 fs-4"><b><?= $data["telepon_pasien"]; ?></b></td>
                    </tr>
                    <tr class="col lh-1">
                        <td>Email</td>
                        <td> </td>
                        <td class="mx-3 fs-4"><b><?= $data["email_pasien"]; ?></b></td>
                    </tr>
                </table>
                <div class="section-title mt-5">
                    <h2>Change Password</h2>
                </div>
                <div class="row">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Confirm your Password</label>
                            <input type="password" class="form-control" id="password" name="confirmPassword" required>
                        </div>
                        <div class="mb-3 text-end">
                            <button type="submit" name="submitPatient" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>


<?php include_once '../separate/footer.php'; ?>
    <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>