<?= $this->extend('layout/kasir_templates'); ?>

<?= $this->section('content'); ?>
<!-- Carousel -->
<?php $session = session(); ?>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/img/macOS.jpg" class="d-block w-100" alt="macOS.jpg">
            <div class="carousel-caption">
                <div class="container login-box">
                    <div class="login-content">
                        <img src="/img/users.png" alt="users.png" class="users">
                        <h3 class="font-weight-bold">Login</h3>
                        <?= $session->getFlashdata('err'); ?>
                        <?= $session->getFlashdata('kasir_verif'); ?>
                        <?= $session->getFlashdata('kasir_verif2'); ?>
                        <form method="post" action="/KasirLogin/login">
                            <div class="input-login">
                                <input style="display: inline-block;" class="mt-3" type="email" name="email" id="email" placeholder="email here" autofocus autocomplete="off">
                                <input style="display: inline-block;" class="mt-3" type="password" name="password" id="password" placeholder="password">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary mt-2" id="submit">Login</button>
                        </form>
                        <p class="mt-2">Don't have an account? <a href="/KasirRegist">Create your account now!</a></p>
                        <p class="forgot-pass">Forgot your password? <a href="/KasirLupaPass">Contact our admin.</a></p>
                    </div>
                </div>
                <a href="https://pngtree.com/free-backgrounds" style="color: #f2f2f2;">free background photos from pngtree.com</a>
            </div>
        </div>
    </div>
</div>
<!-- End of Carousel -->
<?= $this->endSection(); ?>