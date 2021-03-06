<?php 
    // $_GET
    // Array Associative
    // Sama seperti array numeric, tetapi
    // key-nya adalah string yang kita buat sendiri
    $user = [
        [
            "nickname" => "Frost",
            "rank" => "342",
            "region" =>"South Korea",
            "email" => "frost@gmail.com",
            "img" => "gambar1.gif"
        ],
        [
            "nickname" => "Udin",
            "rank" => "2406",
            "region" => "Indonesia",
            "email" => "udin@gmail.com",
            "img" => "gambar2.png"
        ],
        [
            "nickname" => "Noob",
            "rank" => "43",
            "region" => "Canada",
            "email" => "noob@gmail.com",
            "img" => "gambar3.gif"
        ],
        [
            "nickname" => "Cool",
            "rank" => "985",
            "region" => "United States",
            "email" => "cool@gmail.com",
            "img" => "gambar4.png"
        ],
        [
            "nickname" => "TnG",
            "rank" => "4044",
            "region" => "Australia",
            "email" => "tng@gmail.com",
            "img" => "gambar5.jpg"
        ],
        [
            "nickname" => "DbzA",
            "rank" => "18393",
            "region" => "United States",
            "email" => "dbza@gmail.com",
            "img" => "gambar6.png"
        ],
        [
            "nickname" => "Roar",
            "rank" => "20",
            "region" => "Japan",
            "email" => "roar@gmail.com",
            "img" => "gambar7.png"
        ],
        [
            "nickname" => "Deer",
            "rank" => "#547",
            "region" => "Indonesia",
            "email" => "deer@gmail.com",
            "img" => "gambar8.png"
        ],
        [
            "nickname" => "Shier",
            "rank" => "9383",
            "region" => "Brazil",
            "email" => "shier@gmail.com",
            "img" => "gambar9.png"
        ],
        [
            "nickname" => "Shreed",
            "rank" => "30793",
            "region" => "United Kingdom",
            "email" => "shreed@gmail.com",
            "img" => "gambar10.jpg"
        ]
    ];
?>

<!DOCTYPE html>
<head>
    <title>GET</title>
    <style>
        .tabel {
            text-align: center;
        }
        td {
            padding: 5px 15px;
        }
    </style>
</head>
<body>
    <h1>Active User</h1>

    <table class="tabel" border="1px" cellspacing="0">
        <tr>
            <th>Picture</th>
            <th>Nickname</th>
        </tr>
        <?php foreach($user as $u): ?>
            
            <tr>
                <td><img src="img/<?= $u["img"];?>" width="100px"></td>
                <td><a href="latihan2.php?nickname=<?= $u['nickname'];?> & rank=<?= $u['rank']; ?> & img=<?= $u['img']; ?> & region=<?= $u['region']; ?> & email=<?= $u['email']; ?>"><?= $u["nickname"]; ?></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>