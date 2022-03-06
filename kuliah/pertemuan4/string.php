<?php
    // strlen
    // menghitung panjand sebuah string
    echo strlen("Nama saya radit");
    echo "<br>";

    // strcmp
    // membandingkan 2 buah string
    echo strcmp("Halo", "Hello");
    echo "<br>";
    
    // explode
    // memecah sebuah string menjadi array
    $text = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam dignissimos eligendi asperiores expedita quas nisi quos sunt suscipit laborum corrupti!";
    $pecah = explode(" ", $text);
    echo $pecah[2];
    echo "<br>";
    echo $pecah[6];
    echo "<br>";

    // htmlspecialchars
    // menjaga dari orang yang iseng yang masuk ke website 
?>

