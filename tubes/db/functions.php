<?php 

    function connect() {
        // Koneksi ke Database
        $connect = mysqli_connect('localhost', 'root', '', 'tubes_213040048') or die('FAILED TO CONNECT!!');
        return $connect;
    }

    function query($sql) {

        $connect = connect();
        // Querry ke tabel
        $result = mysqli_query($connect, $sql) or die(mysqli_error($connect));

        // Siapkan data
        $rows = [];
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function hitungPasien() {
        $connect = connect();

        $query = "SELECT COUNT(id_pasien) as Total FROM pasien";

        $result = mysqli_query($connect, $query);
        $data = mysqli_fetch_assoc($result);
        return $data['Total'];
    }

    function tambahPasien($data) {
        $connect = connect();

        $nama = htmlspecialchars($data["name"]);
        $email = htmlspecialchars($data["email"]);
        $telephone = htmlspecialchars($data["phone"]);

        $gambar = upload();
        if(!$gambar) {
            $gambar = 'nophoto.png';
        }

        $query = "INSERT INTO pasien VALUES (NULL, '$nama', '$email', '$telephone', '$gambar')";

        mysqli_query($connect, $query) or die(mysqli_error($connect));

        return mysqli_affected_rows($connect);
    }

    function hapusPasien($id) {
        $connect = connect();

        mysqli_query($connect, "DELETE FROM konsultasi WHERE id_pasien = $id") or die(mysqli_error($connect));
        mysqli_query($connect, "DELETE FROM pasien WHERE id_pasien = $id") or die(mysqli_error($connect));

        return mysqli_affected_rows($connect);
    }

    function editPasien($id, $edit) {
        $connect = connect();

        $nama = htmlspecialchars($edit['name']);
        $email = htmlspecialchars($edit['email']);
        $telepon = htmlspecialchars($edit['telephone']);
        $gambarLama = htmlspecialchars($edit['gambarLama']);

        if($_FILES['image']['error'] === 4) {
            $gambar = $gambarLama;
        } else {
            $gambar = upload();
        }

        $query = "UPDATE pasien SET nama_pasien = '$nama', email_pasien = '$email', telepon_pasien = '$telepon', foto_pasien = '$gambar' WHERE id_pasien = $id";

        mysqli_query($connect, $query) OR DIE(mysqli_error($connect));

        return mysqli_affected_rows(($connect));
    }

    function upload() {
        $nama_file = $_FILES['image']['name'];
        $ukuran_file = $_FILES['image']['size'];
        $error = $_FILES['image']['error'];
        $tmpName = $_FILES['image']['tmp_name'];

        $extGambarV = ['jpg', 'jpeg', 'png'];
        $extGambar = explode('.', $nama_file);
        $extGambar = strtolower(end($extGambar));

        if(!in_array($extGambar, $extGambarV)) {
            echo "<script>
                alert ('Format file doesn't support!!');
            </script>";
            return false;
        }
        
        if($ukuran_file > 5000000) {
            echo "<script>
                alert ('File size is too big!!');
            </script>";
            return false;
        }

        $namaBaru = uniqid() . '.' . $extGambar;

        move_uploaded_file($tmpName, '../assets/img/profile/'.$namaBaru);

        return $namaBaru;
    }

    function cariPasien($keyword) {
        $query = "SELECT * FROM pasien 
                    WHERE
                    nama_pasien like '%$keyword%' OR
                    email_pasien like '%$keyword%' OR
                    telepon_pasien like '%$keyword%'
                ";
        return query($query);
    }