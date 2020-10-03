<?= $this->extend('layout/menu_layout'); ?>

<?= $this->section('content'); ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light nav-pos" style="border: 2px solid black;">
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
            <th class="text-center" style="width: 10px;">No</th>
            <th class="text-center" style="width: 10px;">Id</th>
            <th class="text-center" style="width: 900px;">Nama Barang</th>
            <th class="text-center" style="width: 10px;">Qty</th>
            <th class="text-center">Harga</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="text-center item">1.</td>
            <td class="text-center item">001</td>
            <td class="item">Rokok GG Surya 12</td>
            <td class="text-center item">1</td>
            <td class="text-center item">Rp.18000,-</td>
        </tr>
        <tr>
            <td class="text-center item">2.</td>
            <td class="text-center item">002</td>
            <td class="item">Rokok Djarum Super 12</td>
            <td class="text-center item">1</td>
            <td class="text-center item">Rp.19000,-</td>
        </tr>
        <tr>
            <td class="text-center item">3.</td>
            <td class="text-center item">003</td>
            <td class="item">Aqua 1L</td>
            <td class="text-center item">1</td>
            <td class="text-center item">Rp.5000,-</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3">
                <h2>Total Harga : </h2>
            </td>
            <td colspan="2" class="total text-center">
                <h2>Rp. 42000,-</h2>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="background-color: #3078e4;">
                <form action="/MenuKasir" method="post">
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
                        <input type="text" class="form-control mr-2" style="width: 870px; background-color:#aaa;" readonly value="<?= $hasil_cari['barang_nama']; ?>" name="input_barang">
                        <input type="text" class="form-control" placeholder="qty..." value="0" name="qty">
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-success mt-2" name="masuk_list" style="width: 80%; margin-left:auto; margin-right: auto;">Tambahkan barang</button>
                    </div>
                </form>
                <div class="row ml-2">
                    <a href="#" class="text-center btn btn-warning mt-3 ml-1" style="color: white;">Edit</a>
                    <a href="#" class="text-center btn btn-danger mt-3 ml-1">Hapus</a>
                </div>
            </td>
            <td colspan="2" style="background-color: #0C387A;">
                <form>
                    <label for="bayar" style="color: white;">Bayar</label>
                    <div class="input-group">
                        <input type="text" class="form-control mb-1" style="border: 1px solid black;" id="bayar">
                    </div>
                    <label for="kembalian" style="color: white;">Kembalian</label>
                    <div class="input-group">
                        <input type="text" class="form-control mb-1" readonly style="background-color: #999; border: 1px black solid;" value="Rp.8000,-" id="kembalian">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2" style="border: 1px solid black;">Cetak Nota</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>
<!-- End of Content -->
<?= $this->endSection(); ?>