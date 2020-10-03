<?= $this->extend('layout/menu_layout'); ?>

<?= $this->section('content'); ?>
<!-- Navbar Supervisor -->
<nav class="navbar navbar-expand-lg navbar-light bg-light nav-sup">
    <div class="container">
        <a class="navbar-brand font-weight-bold" style="font-size: 30px;" href="#">INVENTORY</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="navbar-item">
                    <i class="fas fa-sign-out-alt"><a href="/KasirLogin/logout" style="color:black; font-family:Arial, Helvetica, sans-serif" class="sup-out"> Log Out</a></i>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End of Navbar Supervisor -->

<!-- Supervisor Content -->
<div class="row">
    <div class="col-md-9">
        <button class="btn btn-primary mb-2 ml-4 mt-3" style="border: 1px black solid; border-radius:40px; width:408px;" data-target="#tambah" data-toggle="modal"><span class="text-center" style="color: white;">Tambah Data</span></button>
        <form>
            <div class="form-group">
                <div class="row">
                    <div class="input-group mb-3 ml-4">
                        <form action="" method="post">
                            <input type="text" class="form-control" placeholder="masukkan nama barang..." name="kunci" style="border-radius: 12px;">
                            <button type="submit" class="btn btn-warning ml-2" style="width: 60px;" style="border-radius: 0;">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </form>
        <table class="table table-bordered ml-3 invent" style="border: 3px solid black;">
            <thead>
                <th class="text-center" style="width: 50px; vertical-align:middle;">No</th>
                <th class="text-center" style="vertical-align:middle;">Kode Barang</th>
                <th class="text-center" style="width: 100px; vertical-align:middle;">Stok</th>
                <th class="text-center" style="width:650px; vertical-align:middle;">Nama Barang</th>
                <th class="text-center" style="width: 250px; vertical-align:middle;">Harga</th>
                <th class="text-center" style="width: 250px; vertical-align:middle;">Aksi</th>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($isi_barang as $isi) : ?>
                    <tr>
                        <td class="text-center"><?= $i++; ?></td>
                        <td class="text-center"><?= $isi['barang_id']; ?></td>
                        <td class="text-center"><?= $isi['barang_stock']; ?></td>
                        <td><?= $isi['barang_nama']; ?></td>
                        <td class="text-center"><?= $isi['barang_harga']; ?></td>
                        <td class="text-center">
                            <div class="row ml-4">
                                <a href="/MenuSupervisor/<?= $isi['barang_id']; ?>" class="btn btn-warning mr-1">Edit</a>
                                <form action="/MenuSupervisor/delete/<?= $isi['barang_id']; ?>" method="post">
                                    <button class="btn btn-danger ml-1" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-3">
        <div class="row">
            <div class="col-md-4">
                <img src="/img/person.png" alt="person.png" style="width: 100px;" class="mt-3">
            </div>
            <div class="col-md-8">
                <h2 class="font-weight-bold mt-4"><?= $nickname; ?></h2>
                <h3 class="font-weight-bold">Supervisor</h3>
            </div>
        </div>
        <hr class="hr1" style="margin-top: -4px; width:290px; border:2px black solid;">
        <hr class="hr2" style="margin-top: -2px; border:2px black solid;">
        <br>
        <ul class="list-group ml-5" style="display:block;">
            <li class="list-item">
                <a href="/MenuSupervisor" style="color: black; font-size:20px;" class="font-weight-bold">Tampil Inventory</a>
            </li>
            <li class="list-item">
                <a href="/MenuSupervisor/rekap" style="color: black; font-size:20px;" class="font-weight-bold">Rekap Penjualan</a>
            </li>
            <li class="list-item">
                <a href="/MenuKasir/super" style="color: black; font-size:20px;" class="font-weight-bold">Point of Sales</a>
            </li>
        </ul>
    </div>
</div>
<!-- End of Supervisor Content -->

<!-- Modal Tambah -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahInvent">Tambah Inventory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/MenuSupervisor/tambah" method="post">
                    <div class="form-group">
                        <input type="text" name="barang_id" id="barang_id" placeholder="Masukkan id barang..." class="form-control mb-2">
                        <input type="text" name="barang_nama" class="form-control mb-2" placeholder="Masukkan nama barang...">
                        <input type="text" name="barang_stock" class="form-control" placeholder="Masukkan jumlah stock barang...">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="submit">Tambahkan Barang</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Tambah -->
<?= $this->endSection(); ?>