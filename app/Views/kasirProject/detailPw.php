<?= $this->extend('layout/menu_layout'); ?>

<?= $this->section('content'); ?>
<?php
$session = \Config\Services::session();
$session = session();
?>
<div class="row">
    <div class="col-md-3 admin">
        <h1 style="color: white; margin-left:10px; margin-top: 20px;">KasirApp</h1>
        <hr style="border: 3px solid black; margin-left:10px;">
        <hr style="border: 3px solid black; margin-left:10px;">
        <div class="row" style="margin-top: -20px;">
            <div class="col-md-4">
                <img src="/img/person.png" alt="person.png" style="width: 100px;" class="mt-3">
            </div>
            <div class="col-md-8">
                <h2 class="font-weight-bold mt-4"><?= $nickname; ?></h2>
                <h3 class="font-weight-bold">Admin</h3>
            </div>
        </div>
        <ul class="list-group">
            <li class="list-group-item">
                <div class="row">
                    <img src="/img/home.png" alt="home.png" style="width: 20px; height:20px; margin-top:5px; margin-right:4px;">
                    <a href="/MenuAdmin" style="color: black; font-size:20px;" class="font-weight-bold">Home</a>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <img src="/img/lock.png" alt="lock.png" style="width: 20px; height:20px; margin-top:5px; margin-right:4px;">
                    <a href="/MenuAdmin/gantiPw" style="color: black; font-size:20px;" class="font-weight-bold">Change User Password</a>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <img src="/img/logout.png" alt="lockout.png" style="width: 20px; height:20px; margin-top:5px; margin-right:4px;">
                    <a href="/KasirLogin/logout" style="color: black; font-size:20px;" class="font-weight-bold">Log Out</a>
                </div>
            </li>
        </ul>
    </div>
    <div class="col-md-9">
        <div class="seminavbar">
        </div>
        <h1 class="text-center font-weight-bold mt-5">Detail User</h1>
        <?php
        if ($isi_detail['role_id'] == 1) {
            $isi_detail['role_id'] = 'Admin';
        } else if ($isi_detail['role_id'] == 2) {
            $isi_detail['role_id'] = 'Supervisor';
        } else if ($isi_detail['role_id'] == 3) {
            $isi_detail['role_id'] = 'Cashier';
        }
        ?>
        <table class="table table-borderless">
            <tr>
                <td style="width:100px;">Nama : </td>
                <td><?= $isi_detail['username']; ?></td>
            </tr>
            <tr>
                <td>Email : </td>
                <td><?= $isi_detail['user_email']; ?></td>
            </tr>
            <tr>
                <td>Role : </td>
                <td><?= $isi_detail['role_id']; ?></td>
            </tr>
            <tr>
                <td>
                    <button class="btn btn-success" data-toggle="modal" data-target="#edit_pw">Ganti Password</button>
                </td>
            </tr>
        </table>

    </div>
</div>
<!-- Modal Change Pw -->
<div class="modal fade" id="edit_pw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/MenuAdmin/changePw" method="post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="#pw_old">Old Password:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" name="pw_old" id="pw_old" class="form-control mb-2">
                            </div>
                            <div class="col-md-4">
                                <label for="#pw_new">New Password:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" name="pw_new" id="pw_new" class="form-control mb-2">
                            </div>
                            <div class="col-md-4">
                                <label for="#pw_confirm">Confirm password:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" name="pw_confirm" id="pw_confirm" class="form-control mb-2">
                            </div>
                            <input type="hidden" name="id_user" id="id_user" value="<?= $isi_detail['user_id']; ?>">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Change Pw -->
<?php $this->endSection(); ?>