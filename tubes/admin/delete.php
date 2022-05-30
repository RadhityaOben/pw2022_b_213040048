<?php 
    require '../db/functions.php';
    $id = $_GET['id'];

    if(hapusPasien($id) > 0) {
        echo "<script>
                alert('Data deleted Successfully!');
                document.location.href = 'patientlist.php';
              </script>";
    }