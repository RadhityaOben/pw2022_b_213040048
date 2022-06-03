<?php 
    session_start();
    require '../db/functions.php';
  
    if(!isset($_SESSION['login'])) {
      header("Location: ../index.php");
    }

    $doctor = query("SELECT * FROM dokter");
    $patient = query("SELECT * FROM pasien");

    if(isset($_POST['addAppointment'])) {
        $connect = connect();
        
        if($_POST['patientid'] === "") {
            echo "<script>
                    alert('Select the Patient!');
                    </script>";
        } 
        else if($_POST['doctorid'] === "") {
            $_POST['doctorid'] = array_rand($doctor['id_dokter']);
        }
        
        
        if(tambahKonsultasi($_POST) >0 ){
            echo "<script>
                    alert('Appointment added successfully!');
                    document.location.href = '../';
                    </script>";
            
        }
        else {
            echo "<script>
                    alert('Something is wrong, try again!');
                    document.location.href = 'addappointment.php';
                  </script>";
        }
    
      }
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add Appointment</title>
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
  
<!-- Custom background CSS -->
<style>
    body{
        background-image: url('../assets/img/hero-bg.jpg');
        height: 100%;   
        width: 100%;
        background-size: cover;
        backdrop-filter: blur(8px);
      }
  </style>
</head>

<body>
<section id="appointment" class="appointment">
    <div class="container">
        <div class="d-flex aligns-items-center justify-content-center">
            <div class="card w-100 border-dark shadow-lg mt-5" style="max-width: 1000px;">
                <div class="card-body">
                    <div class="section-title">
                    <h2>Make an Appointment</h2>
                    <p>This is the form you use to make an appointment with any doctor that you want. All of your appointment history will be available on your profile appointment history</p>
                    </div>
                    <form action="" method="POST" class="appointment-form">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="colform-group mt-3">
                                        <input type="date" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" required>  
                                    </div>
                                </div>
                                <?php if($_SESSION['status'] === "USER") {?>
                                <input type="hidden" name="patientid" value="<?= $_SESSION['id']; ?>">
                                <div class="row">
                                    <div class="colform-group mt-3">
                                        <select name="doctorid" id="doctor" class="form-select" required>
                                            <option value="">Select Doctor</option>
                                            <?php foreach($doctor as $d)  :?>
                                            <option value="<?= $d['id_dokter']; ?>"><?= $d['nama_dokter']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <?php } else if($_SESSION['status'] === "DOCTOR") { ?>
                                    <input type="hidden" name="doctorid" value="<?= $_SESSION['id']; ?>">
                                <div class="row">
                                    <div class="colform-group mt-3">
                                        <select name="patientid" id="patient" class="form-select" required>
                                            <option value="">Select Patient</option>
                                            <?php foreach($patient as $p)  :?>
                                            <option value="<?= $p['id_pasien']; ?>"><?= $p['nama_pasien']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <?php } else {?>
                                    <div class="row">
                                    <div class="colform-group mt-3">
                                        <select name="doctorid" id="doctor" class="form-select" required>
                                            <option value="">Select Doctor</option>
                                            <?php foreach($doctor as $d)  :?>
                                            <option value="<?= $d['id_dokter']; ?>"><?= $d['nama_dokter']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="colform-group mt-3">
                                        <select name="patientid" id="patient" class="form-select" required>
                                            <option value="">Select Patient</option>
                                            <?php foreach($patient as $p)  :?>
                                            <option value="<?= $p['id_pasien']; ?>"><?= $p['nama_pasien']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="row">
                                    <div class="colform-group mt-3">
                                        <select name="media" id="media" class="form-select" required>
                                            <option value="">Appointment Media</option>
                                            <option value="onsite">Onsite</option>
                                            <option value="online">Online</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mt-3">
                                    <textarea class="form-control" name="complaint" rows="5" placeholder="Complaint" required></textarea>
                                    <div class="validate"></div>
                                </div>
                                <div class="text-center d-flex justify-content-between">
                                    <a href="../" class="align-self-center">Go Back</a>
                                    <button type="submit" name="addAppointment">Make an Appointment</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>