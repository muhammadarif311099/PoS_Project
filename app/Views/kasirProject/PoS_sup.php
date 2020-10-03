<?= $this->extend('layout/menu_layout'); ?>

<?= $this->section('content'); ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light nav-pos" style="border: 2px solid black;">
    <button class="btn btn-danger">Cetak Nota</button>
    <div class="container">
        <h3><a href="#" class="font-weight-bold title" style="color: black; font-size:30px;">KasirApp</a></h3>
        <i class="fas fa-user ml-auto"><a class="navbar-brand ml-2" href="#" style="font-family:arial;"> Andi's Profile</a></i>
        <a href="/KasirLogin/logout"><i class="fas fa-sign-out-alt" style="color: black;"></i></a>
    </div>
</nav>
<!-- End of Navbar -->
<!-- Table Content -->
<table class="table table-bordered" style="margin-bottom:0px;">
    <thead>
        <tr>
            <th class="text-center" style="width: 10px; vertical-align:middle;">No</th>
            <th class="text-center" style="width: 10px; vertical-align:middle;">Id</th>
            <th class="text-center" style="width: 10px; vertical-align:middle;">Qty</th>
            <th class="text-center" style="width: 900px; vertical-align:middle;">Nama Barang</th>
            <th class="text-center" style="width: 300px; vertical-align:middle;">Harga Satuan</th>
            <th class="text-center" style="width: 400px; vertical-align:middle;">Jumlah Harga</th>
            <th class="text-center" style="width: 400px; vertical-align:middle;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $a = 1; ?>
        <?php foreach ($isi as $i) : ?>
            <tr>
                <td class="text-center"><?= $a++; ?></td>
                <td class="text-center"><?= $i['barang_id']; ?></td>
                <td class="text-center"><?= $i['banyak_beli']; ?></td>
                <td><?= $i['barang_nama']; ?></td>
                <td class="text-center"><?= $i['barang_harga']; ?></td>
                <td class="text-center"><?= $i['total_bayar']; ?></td>
                <td style="width: 400px;">
                    <div class="row ml-5">
                        <a href="/MenuKasir/delete/<?= $i['transaksi_id']; ?>" class="btn btn-danger">Delete</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4">
                <h2>Total : </h2>
            </td>
            <td colspan="3" class="total text-center">
                <?php
                foreach ($isi as $b) {
                    $total_bayar += $b['total_bayar'];
                }
                ?>
                <h2>Rp. <?= $total_bayar; ?>,-</h2>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="background-color: #3078e4;">
                <form action="/MenuKasir/input_jual" method="post">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="masukkan id barang..." name="cari_barang">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary" name="list_cari">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                </form>
                <form action="/MenuKasir/input_jual" method="post">
                    <div class="input-group">
                        <div class="row">
                            <div class="col-md-11">
                                <input type="text" class="form-control mr-2" style="width: 830px; background-color:#aaa;" readonly value="<?= $hasil_cari['barang_nama']; ?>" name="input_barang">
                            </div>
                            <div class="col-md-1">
                                <input type="text" class="form-control" placeholder="qty..." name="qty" width="20px;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-success mt-2" name="masuk_list" style="width: 80%; margin-left:auto; margin-right: auto;">Tambahkan barang</button>
                    </div>
                </form>
                <div class="row ml-2">
                    <a href="/MenuKasir/hapusTransaksi" class="text-center btn btn-secondary mt-3 ml-1">Reset</a>
                </div>
            </td>
            <td colspan="3" style="background-color: #0C387A;">
                <form action="" method="post">
                    <?php
                    if ($bayar) {
                        $bayar = $bayar;
                    } else {
                        $bayar = 0;
                    }
                    ?>
                    <label for="bayar" style="color: white;">Bayar</label>
                    <div class="input-group">
                        <input type="text" class="form-control mb-1" style="border: 1px solid black;" id="bayar" name="bayar" value="<?= $bayar; ?>">
                    </div>
                    <label for="kembalian" style="color: white;">Kembalian</label>
                    <div class="input-group">
                        <input type="text" class="form-control mb-1" readonly style="background-color: #999; border: 1px black solid;" value="<?= $bayar - $total_bayar; ?>" id="kembalian" name="kembalian">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2" style="border: 1px solid black;" name="bayar_submit">Lakukan transaksi</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>
<!-- End of Content -->
<?= $this->endSection(); ?>