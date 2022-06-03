<?php 
session_start();
require '../db/functions.php';

$keyword = $_GET['keyword'];

$query = "SELECT * FROM admin 
            WHERE
            username like '%$keyword%' OR
            kode_admin like '%$keyword%'
            ";
$admin = query($query);
$no = 1;
?>

<table class="table table-striped table-borderless">
    <thead class="table-primary text-secondary">
    <th class="text-center">No</th>
    <th>Code</th>
    <th>Username</th>
    <th colspan="2">Action</th>
    </thead>
    <tbody>
    <?php
        foreach($admin as $p) : 
        $nolist = 1;
    ?>
        <tr class="align-middle">
        <td class="text-center"><?= $no++; ?></td>
        <td class="col-3"><?= $p["kode_admin"]; ?></td>
        <td class="col-3"><?= $p["username"]; ?></td>
        <td class="col-3">
            <button class="btn btn-warning my-1" data-bs-toggle="modal" data-bs-target="#editModal<?= $p['id_admin']?>">Edit</button>
            <a href="delete.php?idAdmin=<?= $p["id_admin"]?>" class="btn btn-danger my-1" onclick="return confirm('Are you sure you want to delete it?')">Delete</a>
        </td>
    </tr>

    <!-- Modal Edit-->
    <div class="modal fade" id="editModal<?= $p['id_admin']?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable modal-fullscreen-lg-down">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Admin Data</h5>
            </div>
            <div class="modal-body">
            <form action="edit.php" method="POST">
                <input type="hidden" name="id" value="<?= $p['id_admin']?>">
                <div class="mb-3">
                <label for="code" class="form-label">Admin Code</label>
                <input type="text" class="form-control" id="code" value="<?= $p['kode_admin']?>" name="code" readonly>
                </div>
                <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" value="<?= $p['username']?>" name="username">
                </div>
                <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                <label for="password" class="form-label">Confirm your Password</label>
                <input type="password" class="form-control" id="password" name="confirmPassword">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="submitAdmin" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
        </div>
    </div>

    <?php endforeach; ?>
    <!-- End Foreach -->
    </tbody>
</table>