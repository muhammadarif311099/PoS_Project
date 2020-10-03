<?= $this->extend('layout/kasir_templates'); ?>

<?= $this->section('content'); ?>
<!-- Carousel -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/img/macOS.jpg" class="d-block w-100" alt="macOS.jpg">
            <div class="carousel-caption">
                <div class="caption">
                    <h1 class="font-weight-bold">Kasir App</h1>
                    <p>Aplikasi Kasir Nomor 1 di Indonesia</p>
                    <div class="row">
                        <a href="/KasirLogin" class="btn btn-primary ml-1 login"><span class="font-weight-bold">Login</span></a>
                        <a href="/KasirRegist" class="btn btn-danger ml-1 regist"><span class="font-weight-bold">Register Here</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Carousel -->
<?= $this->endSection(); ?>