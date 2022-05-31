<?php 
    require '../db/functions.php';
    if(isset($_POST['submitPatient'])){
      $idPasien = $_POST['id'];
      
        // Pasien
        if(editPasien($idPasien, $_POST) > 0) {
            echo "<script>
                    alert('Data Edited Successfully!');
                    document.location.href = 'patientlist.php';
                  </script>";
        }
        else {
          echo "<script>
                  alert('Failed to Edit!');
                  document.location.href = 'patientlist.php';
                </script>";
        }
    }
    else if(isset($_POST['submitDoctor'])){
      $idDokter = $_POST['id'];
      
        // Pasien
        if(editDokter($idDokter, $_POST) > 0) {
            echo "<script>
                    alert('Data Edited Successfully!');
                    document.location.href = 'doctorlist.php';
                  </script>";
        }
        else {
          echo "<script>
                  alert('Failed to Edit!');
                  document.location.href = 'doctorlist.php';
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
