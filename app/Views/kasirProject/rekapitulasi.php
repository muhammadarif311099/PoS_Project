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
        <h1 class="text-center">Rekapitulasi Penjualan</h1>
        <h5 class="ml-4">September 2020</h5>
        <table class="table table-bordered ml-3 invent mt-1" style="border: 3px solid black;">
            <tr>
                <th class="text-center" style="vertical-align: middle; width:20px;" rowspan="2">No</th>
                <th class="text-center" rowspan="2" style="vertical-align: middle; width:700px;">Nama Barang</th>
                <th class="text-center" colspan="2">Keterangan</th>
            </tr>
            <tr>
                <td class="text-center">Terjual</td>
                <td class="text-center">Sisa Stok</td>
            </tr>
            <tr>
                <td class="text-center">1.</td>
                <td>Rokok GG Surya 12</td>
                <td class="text-center">1</td>
                <td class="text-center">99</td>
            </tr>
            <tr>
                <td class="text-center">2.</td>
                <td>Rokok GG Surya 16</td>
                <td class="text-center">10</td>
                <td class="text-center">190</td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary ml-4" style="width: 40%;">Cetak Rekapitulasi</button>
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
<!-- End of Supervisor Content -->
<?= $this->endSection(); ?>