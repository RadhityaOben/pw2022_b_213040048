<?php
    // Array Associative
    // Array yang indexnya berupa string, yang berasosiasi dengan nilainya

    $mahasiswa = [
        [
            "nama" => "Radhitya",
            "npm" => "213040048",
            "jurusan" => "Teknik Informatika",
            "email" => "radhitya@gmail.com"
        ],
        [
            "nama" => "Udin",
            "npm" => "213080888",
            "jurusan" => "Teknik Mesin",
            "email" => "udin@gmail.com"
        ],
        [
            "nama" => "Asep",
            "npm" => "213040912",
            "jurusan" => "Teknik Informatika",
            "email" => "asep@gmail.com"
        ],
        [
            "nama" => "Faris",
            "email" => "faris@gmail.com",
            "npm" => "213040982",
            "jurusan" => "Teknik Industri"
        ]
    ];

    // var_dump($mahasiswa);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Latihan 3</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <?php foreach($mahasiswa as $mhs) :?>
        <ul>
            <li>Nama: <?= $mhs["nama"]; ?></li>
            <li>NPM: <?= $mhs["npm"]; ?></li>
            <li>Jurusan: <?= $mhs["jurusan"]; ?></li>
            <li>Email: <?= $mhs["email"]; ?></li>
        </ul>
    <?php endforeach; ?>
</body>
</html>