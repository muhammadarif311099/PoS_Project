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
        <form>
            <div class="form-group">
                <div class="row">
                    <form action="" method="post">
                        <input type="text" class="form-control" placeholder="cari user..." style="width: 300px; margin-left:20px; margin-top:100px;" name="cari">
                        <button type="submit" class="btn btn-primary" style="width: 70px; height:40px; margin-top:100px; margin-left:5px;" name="submit">Cari</button>
                    </form>
                </div>
                <?= $session->getFlashdata('notif'); ?>
                <?= $validation->listErrors(); ?>
            </div>
        </form>
        <table class="table table-bordered table-stripped">
            <thead>
                <th class="text-center" style="vertical-align: middle; width: 100px;">No</th>
                <th class="text-center" style="vertical-align: middle; width: 670px;">Nama User</th>
                <th class="text-center" style="vertical-align: middle;">Role</th>
                <th class="text-center" style="vertical-align: middle;">Aksi</th>
            </thead>
            <tbody>
                <?php $a = 1; ?>
                <?php foreach ($data_user as $d) : ?>
                    <tr>
                        <td class="text-center" style="vertical-align: middle;"><?= $a++; ?></td>
                        <td style="vertical-align: middle;"><?= $d['username']; ?></td>
                        <td class="text-center" style="vertical-align: middle;"><?= $d['role_id']; ?></td>
                        <td class="text-center" style="vertical-align: middle;">
                            <a href="/MenuAdmin/detailPw/<?= $d['user_id']; ?>" class="btn btn-warning">Ubah</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>