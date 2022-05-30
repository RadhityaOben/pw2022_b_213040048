<?php 

    function connect() {
        // Koneksi ke Database
        $connect = mysqli_connect('localhost', 'root', '', 'pw2022_b_213040048') or die('FAILED TO CONNECT!!');
        return $connect;
    }

    function query($sql) {

        $connect = connect();
        // Querry ke tabel mahasiswa
        $result = mysqli_query($connect, $sql) or die(mysqli_error($connect));

        // Siapkan data mahasiswa
        $rows = [];
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data) {
        $connect = connect();

        $npm = htmlspecialchars($data["npm"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambar = htmlspecialchars($data["gambar"]);

        $query = "INSERT INTO mahasiswa VALUES (NULL, '$npm', '$nama', '$email', '$jurusan', '$gambar')";

        mysqli_query($connect, $query) or die(mysqli_error($connect));

        return mysqli_affected_rows($connect);
    }

    function hapus($id) {
        $connect = connect();

        mysqli_query($connect, "DELETE FROM mahasiswa WHERE id = $id") or die(mysqli_error($connect));

        return mysqli_affected_rows($connect);
    }

    function ubah($data) {
        $connect = connect();

        $id = $data["id"];
        $npm = htmlspecialchars($data["npm"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambar = htmlspecialchars($data["gambar"]);

        $query = "UPDATE mahasiswa SET
                    npm = '$npm',
                    nama = '$nama',
                    email = '$email',
                    jurusan = '$jurusan',
                    gambar = '$gambar'
                  WHERE id = $id;
        ";

        mysqli_query($connect, $query) or die(mysqli_error($connect));

        return mysqli_affected_rows($connect);
    }