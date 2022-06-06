<?php 
    session_start();
    require '../db/functions.php';

    if(isset($_POST['addPatient'])) {
        $connect = connect();
        $email = $_POST['email'];
        $result = mysqli_query($connect, "SELECT email_pasien FROM pasien WHERE email_pasien = '$email'");
    
        if(mysqli_fetch_assoc($result)) {
            echo "<script>
                    alert('Email has already been taken!');
                  </script>";
        }
        else if($_POST['password'] === $_POST['confirmPassword']){
            if(tambahPasien($_POST) > 0) {
              echo "<script>
                      alert('Sign Up success!');
                      </script>";
            }
        }
        else {
            echo "<script>
                    alert('Password Doesn't Match!');
                  </script>";
        }
        echo "<script>
                document.location.href = 'patientlist.php';
              </script>";
    
      }
    else if(isset($_POST['addDoctor'])) {
        $connect = connect();
        $email = $_POST['email'];
        $result = mysqli_query($connect, "SELECT email_dokter FROM dokter WHERE email_dokter = '$email'");
    
        if(mysqli_fetch_assoc($result)) {
            echo "<script>
                    alert('Email has already been taken!');
                  </script>";
        }
        else if($_POST['password'] === $_POST['confirmPassword']){
            if(tambahDokter($_POST) > 0) {
              echo "<script>
                      alert('Add Data Success!');
                      </script>";
            }
        }
        else {
            echo "<script>
                    alert('Password Doesn't Match!');
                  </script>";
        }
        echo "<script>
                document.location.href = 'doctorlist.php';
              </script>";
    
      }
    else if(isset($_POST['addAdmin'])) {
        $connect = connect();
        $username = $_POST['username'];
        $result = mysqli_query($connect, "SELECT username FROM admin WHERE username = '$username'");
    
        if(mysqli_fetch_assoc($result)) {
            echo "<script>
                    alert('Username has already been taken!');
                  </script>";
        }
        else if($_POST['password'] === $_POST['confirmPassword']){
            if(tambahAdmin($_POST) > 0) {
              echo "<script>
                      alert('Add Data Success!');
                      </script>";
            }
        }
        else {
            echo "<script>
                    alert('Password Doesn't Match!');
                  </script>";
        }
        echo "<script>
                document.location.href = 'adminlist.php';
              </script>";
    
      }

?>