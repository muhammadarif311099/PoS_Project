<?= $this->extend('layout/templates'); ?>

<?= $this->section('isi'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3>Contact Us</h3>
            <?php foreach ($kontak as $k) : ?>
                <ul>
                    <li><?= $k['tipe']; ?></li>
                    <li><?= $k['alamat']; ?></li>
                    <li><?= $k['kota']; ?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>