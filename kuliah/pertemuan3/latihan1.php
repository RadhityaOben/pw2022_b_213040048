<?php
// Pengulangan
// for
// while
// do... while
// foreach

for ($i = 0; $i < 5; $i++) {
    echo "Hello World! <br>";
}

echo "<hr>";

$j = 0;
while($j < 5) {
    echo "Hello World! <br>";
    $j++;
}

echo "<hr>";

$j = 10;
do {
    echo "Hello World! <br>";
    $j++;
} while ($j <5)
?>
<hr>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 1</title>
    <style>
        .warna-baris-genap {
            background-color: silver;
        }
    </style>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <td>1,1</td>
            <td>1,2</td>
            <td>1,3</td>
            <td>1,4</td>
            <td>1,5</td>
        </tr>
        <tr>
            <td>2,1</td>
            <td>2,2</td>
            <td>2,3</td>
            <td>2,4</td>
            <td>2,5</td>
        </tr>
        <tr>
            <td>3,1</td>
            <td>3,2</td>
            <td>3,3</td>
            <td>3,4</td>
            <td>3,5</td>
        </tr>
    </table>
    <hr>
    <table border="1" cellpadding="10" cellspacing="0">
        <?php
            for ($i = 1; $i <=3; $i++) {
                echo "<tr>";
                for($j = 1; $j <=5; $j++) {
                    echo "<td>$i, $j</td>";
                }
            }
        ?>
    </table>
    <hr>
    <table border="1" cellpadding="10" cellspacing="0">
        <?php for ($i = 1; $i <= 3; $i++) { ?>
            <tr>
                <?php for($j = 1; $j <= 5; $j++) : ?>
                    <td><?= "$i, $j"; ?></td>
                <?php endfor; ?>
            </tr>
        <?php } ?>
    </table>
    <hr>
    <table border="1" cellpadding="10" cellspacing="0">
        <?php for ($i = 1; $i <= 5; $i++) { 
            if($i % 2 == 0) : ?>
            <tr class="warna-baris-genap">
            <?php else : ?>
            <tr>
            <?php endif; ?>
                <?php for($j = 1; $j <= 5; $j++) : ?>
                    <td><?= "$i, $j"; ?></td>
                <?php endfor; ?>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
