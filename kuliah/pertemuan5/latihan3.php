<?php
    $mahasiswa = [
        ["Radhitya", "213040048", "Teknik Informatika", "radhitya@gmail.com"],
        ["Udin", "213080888", "Teknik Mesin", "udin@gmail.com"],
        ["Asep", "213040912", "Teknik Informatika", "asep@gmail.com"]
    ];
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
            <li>Nama: <?= $mhs[0]; ?></li>
            <li>NRP: <?= $mhs[1]; ?></li>
            <li>Jurusan: <?= $mhs[2]; ?></li>
            <li>Email: <?= $mhs[3]; ?></li>
        </ul>
    <?php endforeach; ?>
</body>
</html>