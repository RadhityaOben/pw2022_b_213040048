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

        // Cek apakah user tidak mengupload gambar
        if($_FILES['gambar']['error'] === 4) {
            // Pilih gambar default
            $gambar = 'nophoto.png';
        }
        else {
            // Jalankan fungsi upload
            $gambar = upload();
            // Cek jika upload gagal
            if(!$gambar) {
                return false;
            }
        }

        $npm = htmlspecialchars($data["npm"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        // $gambar = htmlspecialchars($data["gambar"]);

        $query = "INSERT INTO mahasiswa VALUES (NULL, '$npm', '$nama', '$email', '$jurusan', '$gambar')";

        mysqli_query($connect, $query) or die(mysqli_error($connect));

        return mysqli_affected_rows($connect);
    }

    function hapus($id) {
        $connect = connect();

        // Query mahasiswa berdasarkan id
        $mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

        // Cek jika gambar default
        if($mahasiswa['gambar'] !== 'nophoto.png') {
            // Hapus gambar
            unlink('img/' . $mahasiswa['gambar']);
        }

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

    function upload() {
        // Siapkan data gambar
        $namafile = $_FILES['gambar']['name'];
        $namafiletmp = $_FILES['gambar']['tmp_name'];
        $ukuranfile = $_FILES['gambar']['size'];
        $tipefile = pathinfo($namafile, PATHINFO_EXTENSION);
        $tipefileok = ['jpg', 'jpeg', 'png'];

        // Cek apakah yang diupload bukan gambar
        if(!in_array(strtolower($tipefile), $tipefileok)) {
            echo "<script>
                    alert('Tipe file tidak support!');
                  </script>";
            return false;
        }
        
        // Cek apakah gambar terlalu besar
        if($ukuranfile > 3000000) {
            echo "<script>
                    alert('Ukuran file terlalu besar!');
                  </script>";
            return false;
        }

        // Proses upload gambar
        $namafilebaru = uniqid() . $namafile;
        move_uploaded_file($namafiletmp, "img/" . $namafilebaru);

        return $namafilebaru;
    }