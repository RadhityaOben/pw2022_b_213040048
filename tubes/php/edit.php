<?php 
session_start();
    require '../db/functions.php';
    if(isset($_POST['submitPatient'])){
      $idPasien = $_POST['id'];

      if($_SESSION['status'] === "USER") {
        $location = 'profile.php';
      }
      else {
        $location = 'patientlist.php';
      }
        // Pasien
        if(editPasien($idPasien, $_POST) > 0) {
            echo "<script>
                    alert('Data Edited Successfully!');
                    document.location.href = '" . $location . "';
                  </script>";
        }
        else {
          echo "<script>
                  alert('Failed to Edit!');
                  document.location.href = '" . $location . "';
                </script>";
        }
    }
    else if(isset($_POST['submitDoctor'])){
      $idDokter = $_POST['id'];

      if($_SESSION['status'] === "DOCTOR") {
        $location = 'profile.php';
      }
      else {
        $location = 'doctorlist.php';
      }
      
        // Dokter
        if(editDokter($idDokter, $_POST) > 0) {
            echo "<script>
                    alert('Data Edited Successfully!');
                    document.location.href = '" . $location . "';
                  </script>";
        }
        else {
          echo "<script>
                  alert('Failed to Edit!');
                  document.location.href = '" . $location . "';
                </script>";
        }
    }
    else if(isset($_POST['submitAdmin'])){
      $idAdmin = $_POST['id'];

      // Admin
      if($_POST['password'] === $_POST['confirmPassword']) {
        if(editAdmin($idAdmin, $_POST) > 0) {
            echo "<script>
                    alert('Data Edited Successfully!');
                    document.location.href = 'adminlist.php';
                  </script>";
        }
        else{
          echo "<script>
                  alert('Failed to Edit!');
                  document.location.href = 'adminlist.php';
                </script>";
              }
      }
      else{
        echo "<script>
                alert('Password Doesn't Match!');
                document.location.href = 'adminlist.php';
              </script>";
      }
    }
