<?php 
    // Cek apakah tidak ada data di $_GET
    if( !isset($_GET["nickname"]) || 
        !isset($_GET["region"]) || 
        !isset($_GET["rank"]) ||
        !isset($_GET["email"]) ||
        !isset($_GET["img"])) {
        // redirect
        header("Location: latihan1.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
</head>
<body>
    <table border="1px" cellspacing="0">
    <tr>
        <td rowspan="2"><img src="img/<?= $_GET['img']; ?>" width="100px"></td>
        <td><?= $_GET["nickname"]; ?></td>
        <td><?= $_GET["region"]; ?></td>
    </tr>
    <tr>
        <td>#<?= $_GET["rank"]; ?></td>
        <td><?= $_GET["email"]; ?></td>
    </tr>
    </table>
    <a href="latihan1.php">Go Back</a>
</body>
</html>