<?php
    // Date
    // Untuk menampilkan tanngal dengan format tertentu
    echo date("l, d-M-Y");
    echo "<hr>";
    
    // Time
    // UNIX Timestamp / EPOCH time
    // Detik yang sudah berlalu sejak 1 Januari 1970
    echo time();
    echo "<br>";
    // 100 hari ke depan dari sekarang
    echo date("l", time() + 60 * 60 * 24 * 100);
    echo "<br>";
    // 100 hari ke belakang dari sekarang
    echo date("d M Y", time() - 60 * 60 * 24 * 100);
    echo "<hr>";
    
    // mktime
    // membuat sendiri detik
    // mktime(0, 0, 0, 0, 0, 0)
    // jam, menit, detik, bulan, tanggal, tahun
    echo date("l", mktime(0, 0, 0, 12, 2, 2003));
    echo "<hr>";

    // strtotime
    echo date("l", strtotime("2 Dec 2003"));

?>