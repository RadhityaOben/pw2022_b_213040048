<?php 
require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");
$no = 1;

// Jika tombol cari di-klik
if(isset($_GET['cari'])) {
  $keyword = $_GET['keyword'];
  $query = "SELECT * FROM mahasiswa WHERE
            nama LIKE '%$keyword%' OR
            npm LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%' OR
            email LIKE '%$keyword%'";
  $mahasiswa = query("$query");
}

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

        <a href="tambah.php" class="btn btn-primary">Tambah Data Mahasiswa</a>

        <div class="row mt-3">
          <div class="col-8">
            <form action="" method="GET">
              <div class="input-group mｂ-3">
                <input type="text" class="form-control" name="keyword" placeholder="Cari disini..." autocomplete="off">
                <button class="btn btn-primary" type="submit" name="cari">Cari!</button>
              </div>
            </form>
          </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama</th>
                <th scope="col">NPM</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Email</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($mahasiswa as $m) :?>
                <tr class="align-middle">
                    <th scope="row"><?= $no++; ?></th>
                    <td><img src="img/<?= $m["gambar"]; ?>" width="50px" class="rounded-circle"></td>
                    <td><?= $m["nama"]; ?></td>
                    <td><?= $m["npm"]; ?></td>
                    <td><?= $m["jurusan"]; ?></td>
                    <td><?= $m["email"]; ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $m['id']; ?>" class="btn badge bg-warning">Ubah</a>
                        <a href="hapus.php?id=<?= $m['id']; ?>" class="btn badge bg-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
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