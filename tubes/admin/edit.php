<?php 
    require '../db/functions.php';
    $id = $_POST['id'];

    if(editPasien($id, $_POST) > 0) {
        echo "<script>
                alert('Data Edited Successfully!');
                document.location.href = 'patientlist.php';
              </script>";
    }