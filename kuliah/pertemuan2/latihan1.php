<?php
    // Pertemuan 2, Belajar sintaks PHP

    // NILAI
    // angka (integer), tulisan (string), true/false (boolean)
    echo 10; // integer
    echo '<br>';
    echo 'Radhitya'; // string
    echo '<br>';
    echo true; // boolean true tampil 1, false tidak tampil apapun (null)

    echo '<hr>';

    // VARIABEL
    // Tempat/Wadah untuk menampung NILAI
    // Awali dengan tanda dollar ($)
    // Boleh mengandung angka, tidak boleh diawali angka
    // Tidak boleh menggunakan spasi
    $nama = 'Radhitya Putra Ridwan';
    $nama_depan = 'Radhitya';
    echo $nama;
    echo '<br>';
    echo $nama_depan;

    echo '<hr>';

    // STRING
    // '', ""
    $hari = "Jum'at";
    echo $hari;
    echo '<br>';
    echo 'Radit: "Halo, Semua!"';
    echo '<br>';
    // Escape Character
    // Tanda \
    echo 'Radit: "Selamat hari Jum\'at"'; // Dengan kutip 1 (')
    echo '<br>';
    echo "Radit: \"Selamat hari Jum'at\""; // Dengan kutip 2 (")
    echo '<br>';
    // Interpolasi
    // Mencetak langsung isi variabel
    // Hanya bisa oleh ""
    echo "Halo, nama saya $nama_depan";
    echo '<br>';
    echo 'Halo, nama saya $nama';

    echo '<hr>';

    // Concat / Penggabung String
    // .
    $nama_belakang = 'Putra';
    echo $nama_depan . ' ' . $nama_belakang;
    echo '<br>';
    echo 'Radit: "Selamat hari' . " Jum'at\"";

    echo '<hr>';

    // OPERATOR
    // Simbol untuk memproses 2 atau lebih nilai
    // Aritmatika
    // +, -, *, /, % (sisa bagi)
    echo 1 + 1;
    echo '<br>';
    echo 'Hasil dari 1 + 1 adalah ' . 1 + 1;
    echo '<br>';
    echo (1 + 2) * 3 - 4;
    echo '<br>';
    echo 10 % 5;
    echo '<br>';
    echo 1 + '1';
    
    echo '<hr>';
    
    // Perbandingan
    // <, >, <=, >=, ==, !=
    echo 1 < 2;
    echo '<br>';
    echo 1 == '1';
    
    echo '<hr>';
    
    // Identitas / Strict Comparison
    // Tidak hanya membandingkan nilai, tetapi juga tipe datanya
    // ===, !==
    echo 1 === '1';
    echo '<br>';
    echo 1 !== '1';
    
    echo '<hr>';

    // Increment / Decrement
    // Tambah / Kurang 1
    // ++, --
    $z = 10;
    echo $z++; // Variabel z ditambah 1
    echo '<br>';
    echo $z;
    echo '<br>';
    ++$z; // Tambahkan 1 ke variabel z
    echo $z;
    echo '<br>';
    $z--;
    echo $z;

?>