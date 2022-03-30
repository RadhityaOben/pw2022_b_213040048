<?php 

    $mahasiswa = [
        [
            "nama" => "Radhitya",
            "npm" => "213040048",
            "jurusan" => "Teknik Informatika",
            "email" => "radhitya@gmail.com",
            "gambar" => "img/gambar1.gif"
        ],
        [
            "nama" => "Udin",
            "npm" => "213080888",
            "jurusan" => "Teknik Mesin",
            "email" => "udin@gmail.com",
            "gambar" => "img/gambar2.png"
        ],
        [
            "nama" => "Asep",
            "npm" => "213040912",
            "jurusan" => "Teknik Informatika",
            "email" => "asep@gmail.com",
            "gambar" => "img/gambar3.gif"
        ],
        [
            "nama" => "Faris",
            "email" => "faris@gmail.com",
            "npm" => "213040982",
            "jurusan" => "Teknik Industri",
            "gambar" => "img/gambar4.png"
        ]
    ];

    $no = 1;

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Detail Mahasiswa</title>
  </head>
  <body>
    <div class="container">
        <h1>Detail Mahasiswa</h1>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="<?= $_GET['gambar']?>" class="img-fluid rounded-start">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $_GET['nama']; ?></h5>
                        <p class="card-text"><?= $_GET['npm']; ?></p>
                        <p class="card-text"><?= $_GET['email']; ?></p>
                        <p class="card-text"><?= $_GET['jurusan']; ?></p>
                        <a href="kuliah_latihan3.php">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>