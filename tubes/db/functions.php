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

    // Fungsi Pasien
    
    function tambahPasien($data) {
        $connect = connect();
        
        $nama = htmlspecialchars($data["name"]);
        $email = htmlspecialchars($data["email"]);
        $telephone = htmlspecialchars($data["telephone"]);
        $password = htmlspecialchars($data["password"]);
        
        
        $gambar = upload();
        if(!$gambar) {
            $gambar = 'nophoto.png';
        }
        
        $query = "INSERT INTO pasien VALUES (NULL, '$nama', '$email', SHA1('$password'), '$telephone', '$gambar')";
        
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
    
    function hitungPasien() {
        $connect = connect();

        $query = "SELECT COUNT(id_pasien) as Total FROM pasien";

        $result = mysqli_query($connect, $query);
        $data = mysqli_fetch_assoc($result);
        return $data['Total'];
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

    

    // Fungsi Dokter

    function tambahDokter($data) {
        $connect = connect();
        
        $nama = htmlspecialchars($data["name"]);
        $email = htmlspecialchars($data["email"]);
        $telephone = htmlspecialchars($data["telephone"]);
        $password = htmlspecialchars($data["password"]);
        
        
        $gambar = upload();
        if(!$gambar) {
            $gambar = 'nophoto.png';
        }
        
        $query = "INSERT INTO dokter VALUES (NULL, '$nama', '$email', SHA1('$password'), '$telephone', '$gambar')";
        
        mysqli_query($connect, $query) or die(mysqli_error($connect));
        
        return mysqli_affected_rows($connect);
    }
    
    function hapusDokter($id) {
        $connect = connect();
        
        mysqli_query($connect, "DELETE FROM konsultasi WHERE id_dokter = $id") or die(mysqli_error($connect));
        mysqli_query($connect, "DELETE FROM dokter WHERE id_dokter = $id") or die(mysqli_error($connect));
        
        return mysqli_affected_rows($connect);
    }

    function editDokter($id, $edit) {
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
        
        $query = "UPDATE dokter SET nama_dokter = '$nama', email_dokter = '$email', telepon_dokter = '$telepon', foto_dokter = '$gambar' WHERE id_dokter = $id";
        
        mysqli_query($connect, $query) OR DIE(mysqli_error($connect));
        
        return mysqli_affected_rows(($connect));
    }

    function cariDokter($keyword) {
        $query = "SELECT * FROM dokter 
                    WHERE
                    nama_dokter like '%$keyword%' OR
                    email_dokter like '%$keyword%' OR
                    telepon_dokter like '%$keyword%'
                ";
        return query($query);
    }

    function hitungDokter() {
        $connect = connect();

        $query = "SELECT COUNT(id_dokter) as Total FROM dokter";

        $result = mysqli_query($connect, $query);
        $data = mysqli_fetch_assoc($result);
        return $data['Total'];
    }
    

    
    // Fungsi Admin

    function tambahAdmin($data) {
        $connect = connect();
        
        $username = htmlspecialchars($data["username"]);
        $password = htmlspecialchars($data["password"]);
        $id = query("SELECT id_admin FROM admin ORDER BY id_admin DESC")[0]['id_admin'] + 1;
        
        
        $query = "INSERT INTO admin VALUES (NULL, 'admin$id', '$username', SHA1('$password'))";
        
        mysqli_query($connect, $query) or die(mysqli_error($connect));
        
        return mysqli_affected_rows($connect);
    }

    function hapusAdmin($id) {
        $connect = connect();
        
        mysqli_query($connect, "DELETE FROM admin WHERE id_admin = $id") or die(mysqli_error($connect));
        
        return mysqli_affected_rows($connect);
    }
    
    function editAdmin($id, $edit) {
        $connect = connect();
        
        $username = htmlspecialchars($edit['username']);
        $password = htmlspecialchars($edit['password']);
        
        $query = "UPDATE admin SET username = '$username', password = SHA1('$password') WHERE id_admin = $id";
        
        mysqli_query($connect, $query) OR DIE(mysqli_error($connect));
        
        return mysqli_affected_rows(($connect));
    }

    function cariAdmin($keyword) {
        $query = "SELECT * FROM admin 
                    WHERE
                    username like '%$keyword%' OR
                    kode_admin like '%$keyword%'
                ";
        return query($query);
    }


    // Password change
    
    function passwordSAdmin($id, $edit) {
        $connect = connect();
        $password = $edit['password'];
        $confirm = $edit['confirmPassword'];

        if($password === $confirm) {
            $query = "UPDATE superadmin SET password = SHA1('$password') WHERE id = $id";
            
            mysqli_query($connect, $query) OR DIE(mysqli_error($connect));

            return mysqli_affected_rows($connect);
        }
    }

    function passwordAdmin($id, $edit) {
        $connect = connect();
        $password = $edit['password'];
        $confirm = $edit['confirmPassword'];

        if($password === $confirm) {
            $query = "UPDATE admin SET password = SHA1('$password') WHERE id_admin = $id";
            
            mysqli_query($connect, $query) OR DIE(mysqli_error($connect));

            return mysqli_affected_rows($connect);
        }
    }

    function passwordDokter($id, $edit) {
        $connect = connect();
        $password = $edit['password'];
        $confirm = $edit['confirmPassword'];

        if($password === $confirm) {
            $query = "UPDATE dokter SET password = SHA1('$password') WHERE id_dokter = $id";
            
            mysqli_query($connect, $query) OR DIE(mysqli_error($connect));

            return mysqli_affected_rows($connect);
        }
    }

    function passwordPasien($id, $edit) {
        $connect = connect();
        $password = $edit['password'];
        $confirm = $edit['confirmPassword'];

        if($password === $confirm) {
            $query = "UPDATE pasien SET password = SHA1('$password') WHERE id_pasien = $id";
            
            mysqli_query($connect, $query) OR DIE(mysqli_error($connect));

            return mysqli_affected_rows($connect);
        }
    }


    // Extra

    function tambahKonsultasi($data) {
        $connect = connect();
        
        $tanggal = htmlspecialchars($data["date"]);
        $media = htmlspecialchars($data["media"]);
        $idPasien = htmlspecialchars($data["patientid"]);
        $idDokter = htmlspecialchars($data["doctorid"]);
        $keluhan = htmlspecialchars($data["complaint"]);
        
        
        $query = "INSERT INTO konsultasi VALUES (NULL, '$keluhan', '$tanggal', '$media', '$idPasien', '$idDokter')";
        
        mysqli_query($connect, $query) or die(mysqli_error($connect));
        
        return mysqli_affected_rows($connect);
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

    function cariHistory($keyword) {
        if($_SESSION['status'] === "USER") {
            $query = "SELECT * FROM konsultasi k
                    NATURAL JOIN dokter d 
                WHERE
                (keluhan LIKE '%$keyword%' OR
                tgl_konsultasi LIKE '%$keyword%' OR
                media_konsultasi LIKE '%$keyword%' OR
                d.nama_dokter LIKE '%$keyword%') AND
                k.id_pasien = $_SESSION[id]
            ";
        }
        else if($_SESSION['status'] === "DOCTOR") {
            $query = "SELECT * FROM konsultasi k
                    NATURAL JOIN pasien p
                WHERE
                (keluhan LIKE '%$keyword%' OR
                tgl_konsultasi LIKE '%$keyword%' OR
                media_konsultasi LIKE '%$keyword%' OR
                p.nama_pasien LIKE '%$keyword%') AND
                k.id_dokter = $_SESSION[id]
            ";
        }
        else {
            $query = "SELECT * FROM konsultasi k
                    JOIN pasien p ON p.id_pasien = k.id_pasien
                    JOIN dokter d ON d.id_dokter = k.id_dokter 
                WHERE
                keluhan LIKE '%$keyword%' OR
                tgl_konsultasi LIKE '%$keyword%' OR
                media_konsultasi LIKE '%$keyword%' OR
                p.nama_pasien LIKE '%$keyword%' OR
                d.nama_dokter LIKE '%$keyword%'
            ";
        }
        return query($query);
    }