<?php 
  session_start();
    require '../db/functions.php';
    
    if(isset($_GET['idPatient'])) {
      $idPatient = $_GET['idPatient'];
      if(hapusPasien($idPatient) > 0) {
        echo "<script>
        alert('Data deleted Successfully!');
        document.location.href = 'patientlist.php';
        </script>";
      }
    }
    else if(isset($_GET['idDoctor'])) {
      $idDoctor = $_GET['idDoctor'];
      if(hapusDokter($idDoctor) > 0) {
        echo "<script>
        alert('Data deleted Successfully!');
        document.location.href = 'doctorlist.php';
        </script>";
      }
    }
    else if(isset($_GET['idAdmin'])) {
      $idAdmin = $_GET['idAdmin'];
      if(hapusAdmin($idAdmin) > 0) {
        echo "<script>
                  alert('Data deleted Successfully!');
                  document.location.href = 'adminlist.php';
                </script>";
      }
    }