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
<!-- Content -->
<div class="row">
    <div class="col-md-9">
        <h1 class="text-center font-weight-bold">Ubah Data Barang</h1>
        <form action="/MenuSupervisor/update" method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-5 text-center">
                        <label for="#barang_id">Id Barang: </label>
                    </div>
                    <div class="col-md-7 text-center">
                        <input type="text" name="barang_id" id="barang_id" class="form-control mb-3" readonly value="<?= $isi_barang['barang_id']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 text-center">
                        <label for="#nama_barang">Nama Barang: </label>
                    </div>
                    <div class="col-md-7 text-center">
                        <input type="text" class="form-control mb-3" name="nama_barang" id="nama_barang" value="<?= $isi_barang['barang_nama']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 text-center">
                        <label for="#stock_barang">Stok Barang: </label>
                    </div>
                    <div class="col-md-7 text-center">
                        <input type="text" class="form-control mb-3" name="stock_barang" id="stock_barang" value="<?= $isi_barang['barang_stock']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 text-center">
                        <label for="#barang_harga">Harga Barang: </label>
                    </div>
                    <div class="col-md-7 text-center">
                        <input type="text" class="form-control" name="barang_harga" id="barang_harga" value="<?= $isi_barang['barang_harga']; ?>">
                    </div>
                </div>
                <input type="hidden" name="barang_id" value="<?= $isi_barang['barang_id']; ?>">
                <button type="submit" class="btn btn-primary mt-4" name="edit_button">Simpan Perubahan</button>
            </div>
        </form>
    </div>
    <div class="col-md-3">
        <div class="row">
            <div class="col-md-4">
                <img src="/img/person.png" alt="person.png" style="width: 100px;" class="mt-3">
            </div>
            <div class="col-md-8">
                <h2 class="font-weight-bold mt-4">Yunia</h2>
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
                <a href="#" style="color: black; font-size:20px;" class="font-weight-bold">Point of Sales</a>
            </li>
        </ul>
    </div>
</div>

<!-- End of Content -->
<?= $this->endSection(); ?>