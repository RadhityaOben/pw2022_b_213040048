<?php
    // var_dump
    // mencetak isi dari sebuah variabel, array, objek
    $b = 3.1;
    $c = true;
    var_dump($b, $c);
    echo "<br>";
    
    // isset
    // mengecek apakah sebuah variabel sudah pernah dibuat atau belum
    $a = "halo";
    if(isset($a)) {
        echo '$a adalah variabel yang sudah ada';
    }
    echo "<br>";
    
    // empty
    // mengecek apakah sebuah variabel memiliki isi atau tidak
    $emp;
    if(empty($emp)) {
        echo '$emp is empty';
    }
    echo "<br>";
    
    // die
    // memberhentikan program
    
    // sleep
    // memberhentikan sementara program
    echo "Program ini menggunakan function sleep() selama 2detik";
    sleep(2);
    echo "<br>";
    
    echo "dibawah ada kode yang tidak dieksekusi karena diberhentikan oleh function die()";
    die();
    echo "halo";
?>