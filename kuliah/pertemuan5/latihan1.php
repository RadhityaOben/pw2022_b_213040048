<?php
    // Array
    // Variabel yang dapat memiliki banyak nilai
    $hari1 = "Senin";
    $hari2 = "Selasa";
    echo $hari1 . " " . $hari2;
    echo "<hr>";
    
    // Elemen pada array boleh memiliki tipe data yang berbeda
    // Pasangan antara key dan value
    // Key-nya adalah
    // Membuat array
    // Cara lama
    $hari = array("Senin", "Selasa", "Rabu");
    // Cara baru
    $bulan = ["Januari", "Februari", "Maret"];
    $arr1 = [123, "Tulisan", false];

    // Menampilkan Array
    // var_dump() / print_r()
    var_dump($hari);
    echo "<br>";
    print_r($bulan);
    
    // Menampilkan 1 elemen pada array
    echo $arr1[0];
    echo "<br>";
    echo $bulan[1];
    
    // Menambahkan elemen baru pada array
    var_dump($hari);
    $hari[] = "Kamis";
    $hari[] = "Jum'at";
    echo "<br>";
    var_dump($hari);

?>