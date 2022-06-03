<?php 
session_start();
require '../db/functions.php';

$keyword = $_GET['keyword'];

$query = "SELECT * FROM pasien 
            WHERE
            nama_pasien like '%$keyword%' OR
            email_pasien like '%$keyword%' OR
            telepon_pasien like '%$keyword%'
            ";
$patient = query($query);
$no = 1;
?>

<table class="table table-striped table-borderless">
    <thead class="table-primary text-secondary">
    <th class="text-center">No</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th colspan="2">Action</th>
    </thead>
    <tbody>
    <?php
        foreach($patient as $p) : 
        $nolist = 1;
        $consultant = query("SELECT * FROM konsultasi WHERE id_pasien = $p[id_pasien]");
    ?>
        <tr class="align-middle">
        <td class="text-center"><?= $no++; ?></td>
        <td class="col-3"><?= $p["nama_pasien"]; ?></td>
        <td class="col-3"><?= $p["email_pasien"]; ?></td>
        <td><?= $p["telepon_pasien"]; ?></td>
        <td class="col-3">
            <button class="btn btn-success my-1" data-bs-toggle="modal" data-bs-target="#historyModal<?= $p['id_pasien']?>">More</button>
            <button class="btn btn-warning my-1" data-bs-toggle="modal" data-bs-target="#editModal<?= $p['id_pasien']?>">Edit</button>
            <a href="delete.php?idPatient=<?= $p["id_pasien"]?>" class="btn btn-danger my-1" onclick="return confirm('Are you sure you want to delete it?')">Delete</a>
        </td>
    </tr>
    <tr>
        <td>
        <!-- Modal History -->
        <div class="modal fade" id="historyModal<?= $p['id_pasien']?>" tabindex="-1" aria-labelledby="HistoryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable modal-fullscreen-lg-down">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">More About Patient</h5>
                </div>
                <div class="modal-body">
                <div class="row mb-3">
                    <div class="col">
                    <img src="../assets/img/profile/<?= $p["foto_pasien"]?>" alt="Profile" width="250rem" class="mx-5">
                    </div>
                    <div class="col align-middle">
                    <div class="row">
                        <div class="lh-1">
                        <span>Name</span>
                        <br>
                        <span class="mx-3 fs-4"><b><?= $p["nama_pasien"]; ?></b></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="lh-1">
                        <span>Telephone</span>
                        <br>
                        <span class="mx-3 fs-4"><b><?= $p["telepon_pasien"]; ?></b></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="lh-1">
                        <span>Email</span>
                        <br>
                        <span class="mx-3 fs-4"><b><?= $p["email_pasien"]; ?></b></span>
                        </div>
                    </div>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                    <th class="col-1 text-center">No</th>
                    <th class="col-6">Complaint</th>
                    <th class="col-3">Doctor</th>
                    <th class="col-2">Date</th>
                    </thead>
                    <tbody>
                    <?php foreach($consultant as $c) : ?>
                        <?php $namaDokter = query("SELECT * FROM dokter where id_dokter = $c[id_dokter]")[0] ?>
                        <tr>
                        <td class=" text-center"><?= $nolist++; ?></td>
                        <td><?= $c["keluhan"]; ?></td>
                        <td><?= $namaDokter['nama_dokter']; ?></td>
                        <td><?= $c["tgl_konsultasi"]; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
        <!-- End Modal -->
        </td>
    </tr>

    <!-- Modal Edit-->
    <div class="modal fade" id="editModal<?= $p['id_pasien']?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable modal-fullscreen-lg-down">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Patient Data</h5>
            </div>
            <div class="modal-body">
            <form action="edit.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="gambarLama" value="<?= $p["foto_pasien"]?>">
                <div class="mb-3">
                <div class="row">
                    <div class="col-4">
                    <div class="row">
                        <label for="image" class="form-label">Profile Picture</label>
                    </div>
                    <div class="row">
                        <div class="col">
                        <img src="../assets/img/profile/<?= $p["foto_pasien"]?>" alt="Profile" width="200px" class="mx-5">
                        </div>
                    </div>
                    </div>
                    <div class="col-5 pt-5 mt-5">
                    <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>
                </div>
                <input type="hidden" name="id" value="<?= $p['id_pasien']?>">
                <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" value="<?= $p['nama_pasien']?>" name="name">
                </div>
                <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?= $p['email_pasien']?>" name="email">
                </div>
                <div class="mb-3">
                <label for="telephone" class="form-label">Telephone</label>
                <input type="number" class="form-control" id="telephone" value="<?= $p['telepon_pasien']?>" name="telephone">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="submitPatient" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
        </div>
    </div>

    <?php endforeach; ?>
    <!-- End Foreach -->
    </tbody>
</table>