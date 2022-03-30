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

    <title>Daftar Mahasiswa</title>
  </head>
  <body>
    <div class="container">
        <h1>Daftar Mahasiswa</h1>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($mahasiswa as $m) :?>
                <tr class="align-middle">
                    <th scope="row"><?= $no++; ?></th>
                    <td><img src="<?= $m["gambar"]; ?>" width="50px" class="rounded-circle"></td>
                    <td><?= $m["nama"]; ?></td>
                    <td>
                        <a href="#" class="btn badge bg-warning">Edit</a>
                        <a href="#" class="btn badge bg-danger">Delete</a>
                        <a href="kuliah_latihan4.php?npm=<?= $m['npm'];?> & nama=<?= $m['nama'];?> & jurusan=<?= $m['jurusan'];?> & email=<?= $m['email'];?> & gambar=<?= $m['gambar'];?>" class="btn badge bg-info">Detail</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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