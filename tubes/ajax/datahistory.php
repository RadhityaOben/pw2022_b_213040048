<?php 
session_start();
require '../db/functions.php';

$keyword = $_GET['keyword'];

if($_SESSION['status'] === "USER") {
  $query = "SELECT * FROM konsultasi k
          JOIN pasien p ON p.id_pasien = k.id_pasien
          JOIN dokter d ON d.id_dokter = k.id_dokter 
      WHERE
      (keluhan like '%$keyword%' OR
      tgl_konsultasi like '%$keyword%' OR
      media_konsultasi like '%$keyword%' OR
      p.nama_pasien like '%$keyword%' OR
      d.nama_dokter like '%$keyword%') AND
      k.id_pasien = $_SESSION[id]
  ";
}
else if($_SESSION['status'] === "DOCTOR") {
  $query = "SELECT * FROM konsultasi k
          JOIN pasien p ON p.id_pasien = k.id_pasien
          JOIN dokter d ON d.id_dokter = k.id_dokter 
      WHERE
      (keluhan like '%$keyword%' OR
      tgl_konsultasi like '%$keyword%' OR
      p.nama_pasien like '%$keyword%' OR
      d.nama_dokter like '%$keyword%') AND
      k.id_dokter = $_SESSION[id]
  ";
}
else {
  $query = "SELECT * FROM konsultasi k
          JOIN pasien p ON p.id_pasien = k.id_pasien
          JOIN dokter d ON d.id_dokter = k.id_dokter 
      WHERE
      keluhan like '%$keyword%' OR
      tgl_konsultasi like '%$keyword%' OR
      media_konsultasi like '%$keyword%' OR
      p.nama_pasien like '%$keyword%' OR
      d.nama_dokter like '%$keyword%'
  ";
}

$history = query($query);
$no = 1;
?>

<table class="table table-striped table-borderless">
              <thead class="table-primary text-secondary">
                <th class="text-center col-1">No</th>
                <th>Complaint</th>
                <?php if($_SESSION['status'] === "USER") {?>
                <th>Doctor</th>
                <?php } else if($_SESSION['status'] === "DOCTOR") {?>
                <th>Patient</th>
                <?php } else {?>
                <th>Patient</th>
                <th>Doctor</th>
                <?php } ?>
                <th>Date</th>
                <th>Media</th>
              </thead>
              <tbody>
                <?php
                  foreach($history as $p) :
                    $namaDokter = query("SELECT * FROM dokter where id_dokter = $p[id_dokter]")[0]["nama_dokter"];
                    $namaPasien = query("SELECT * FROM pasien where id_pasien = $p[id_pasien]")[0]["nama_pasien"];
                    ?>
                  <tr class="align-middle">
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="col-5"><?= $p["keluhan"]; ?></td>
                    <?php if($_SESSION['status'] === "USER"){ ?>
                    <td class="col-3"><?= $namaDokter; ?></td>
                    <?php } else if($_SESSION['status'] === "DOCTOR"){ ?>
                    <td class="col-3"><?= $namaPasien; ?></td>
                    <?php } else {?>
                    <td class="col-2"><?= $namaPasien; ?></td>
                    <td class="col-2"><?= $namaDokter; ?></td>
                    <?php } ?>
                    <td class="col-1"><?= $p["tgl_konsultasi"]; ?></td>
                    <td class="col-1"><?= $p["media_konsultasi"]; ?></td>
                </tr>

              <?php endforeach; ?>
              <!-- End Foreach -->
              </tbody>
            </table>