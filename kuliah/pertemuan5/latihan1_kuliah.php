<?php
    // ARRAY
    // Array adalah variabel yang dapat menyimpan lebih dari satu nilai sekaligus.
    $hari1 = 'Senin';
    $hari2 = 'Selasa';
    $hari7 = 'Minggu';

    $bulan1 = 'Januari';
    $bulan12 = 'Desember';

    $mahasiswa = 'Radhitya';

    // Membuat Array
    $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis']; //Cara baru
    $bulan = array('Januari', 'Februari', 'Maret'); //Cara lama
    $myArray = [100, 'Radhitya', true];

    // Menampilkan Array
    // Menampilkan 1 elemen menggunakan index pada array
    echo $hari[1];
    echo '<br>';
    echo $bulan[2];
    echo '<hr>';
    
    // Menampilkan semua isi array sekaligus
    // var_dump() atau print_r()
    // khusus untuk debugging
    
    var_dump($hari);
    echo '<br>';
    print_r($bulan);
    echo '<hr>';

    // Mencetak semua isi array menggunakan Looping
    echo $hari[0];
    echo '<br>';
    echo $hari[1];
    echo '<br>';
    echo $hari[2];
    echo '<br>';
    echo $hari[3];
    echo '<hr>';

    for ($i=0; $i<count($hari); $i++) {
        echo $hari[$i];
        echo '<br>';
    }
    echo '<hr>';

    // Forrech
    foreach ($bulan as $month) {
        echo $month;
        echo '<br>';
    } 
    echo '<hr>';
    
    // Memanipulasi Array
    // Menambahkan elemen di akhri array
    $hari[] = "Jum'at";
    $hari[] = 'Sabtu';
    var_dump($hari);
?>