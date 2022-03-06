<?php
    // FUNCTION
    // Built-in Function

    // date()
    // Untuk mengetahui waktu saat ini
    // default timezone : UTC (-7 jam)
    echo date('h:i:s | l, j F Y');
    echo '<br>';
    echo date('r');
    echo '<hr>';
    echo date('l', time());
    echo '<hr>';

    // time()
    // UNIX Timestamp / EPOCH Time
    // Detik yang sudah berlalu sejak 1 Januari 1970
    echo time();
    echo '<br>';
    echo time() + 60 * 60 * 24;
    echo '<hr>';
    // Menghitung 100 hari ke belakang
    echo date('l', time() - 60 * 60 * 24 * 100);
    echo '<hr>';

    // mktime()
    // Membuat waktu berdasarkan format
    // mktime(0, 0, 0, 0, 0, 0)
    // jam, menit, detik, bulan, tanggal, tahun
    echo mktime(10, 45, 0, 3, 5, 22);
    echo '<hr>';
    echo date('l', mktime(0, 0, 0, 12, 2, 2003));
    echo '<hr>';
    echo strtotime('2 December 2003');
    echo '<br>';
    echo mktime(0, 0, 0, 12, 2, 2003);
    echo '<hr>';

    // Fungsi Matematika
    // pow() untuk pangkat
    echo pow(5, 3);
    echo '<br>';
    // rand() untuk angka acak (Random)
    echo rand(1, 10);
    echo '<br>';
    // round() untuk pembulatan
    echo round(2.1);
    echo '<br>';
    echo round(2.5);
    echo '<br>';
    // ceil() untuk pembulatan ke atas (Ceiling)
    echo ceil(2.2);
    echo '<br>';
    // floor() untuk pembulatan ke bawah
    echo floor(2.7);
?>