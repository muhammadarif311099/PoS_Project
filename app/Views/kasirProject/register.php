<?= $this->extend('layout/kasir_templates'); ?>

<?= $this->section('content'); ?>
<!-- Carousel -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/img/macOS.jpg" class="d-block w-100" alt="macOS.jpg">
            <div class="carousel-caption">
                <div class="container login-box">
                    <div class="login-content">
                        <img src="/img/users.png" alt="users.png" class="users">
                        <h3 class="font-weight-bold">Registration</h3>
                        <form method="post" action="/KasirRegist/register">
                            <div class="input-regist">
                                <input style="display: inline-block;" class="mt-3 <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?> is-invalid " type="text" name="name" id="name" placeholder="Your name here" autofocus>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('name'); ?>
                                </div>
                                <input style="display: inline-block;" class="mt-3 <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?> is-invalid" type="email" name="email" id="email" placeholder="Enter your email here">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('email'); ?>
                                </div>
                                <input class="mt-3 <?= ($validation->hasError('password1')) ? 'is-invalid' : ''; ?> is-invalid" type="password" name="password1" id="password1" placeholder="Enter a password">
                                <input type="password" class="mt-3 <?= ($validation->hasError('password2')) ? 'is-invalid' : ''; ?> is-invalid" name="password2" id="password2" placeholder="Confirm password">
                            </div>
                            <?= $validation->getError('password1'); ?>
                            <?= $validation->getError('password2'); ?>
                            <button type="submit" name="submit" class="btn btn-primary mt-2" id="submit">Register</button>
                        </form>
                        <p>Already have an account? <a href="/KasirLogin">Sign in here!</a></p>
                    </div>
                </div>
                <a href="https://pngtree.com/free-backgrounds" style="color: #f2f2f2;">free background photos from pngtree.com</a>
            </div>
        </div>
    </div>
</div>
<!-- End of Carousel -->
<?= $this->endSection(); ?>