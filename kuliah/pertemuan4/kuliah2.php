<?php
    // Definisikan masing-masing kubus
    $a = 9;
    $b = 4;

    // Hitung volume setiap kubus
    $volumeA = pow($a, 3);
    $volumeB = pow($b, 3);
    
    // Hitung total 2 volume
    $total = $volumeA + $volumeB;

    // Cetak nilai total
    echo "Jumlah dari volume kubus A dengan sisi $a dan kubus B dengan sisi $b adalah $total";
    echo '<hr>';

    // Deklarasi / definisi function
    function totalVolumeDuaKubus($a, $b) {
        $volumeA = pow($a, 3);
        $volumeB = pow($b, 3);      
        $total = $volumeA + $volumeB;

        return "Jumlah dari volume kubus dengan sisi $a dan kubus dengan sisi $b adalah $total";
    }

    // Pemanggilan / eksekusi function
    echo totalVolumeDuaKubus(9, 4);
    echo '<br>';
    echo totalVolumeDuaKubus(12, 8);
    echo '<br>';
    echo totalVolumeDuaKubus(2, 8);
    echo '<hr>';

    // Fungsi untuk menghitung luas segitiga
    function luasSegitiga($alas, $tinggi) {
        $luas = $alas * $tinggi / 2;

        return "Luas segitiga dengan alas $alas dan tinggi $tinggi adalah $luas";
    }

    echo luasSegitiga(2, 4);
    echo '<br>';
    echo luasSegitiga(3, 7);

?>