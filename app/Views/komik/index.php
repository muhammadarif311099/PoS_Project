<?= $this->extend('layout/templates'); ?>
<!-- csrf -->
<?= $this->section('isi'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="font-weight-bold mt-2">Daftar Komik</h2>
            <a href="/komik/create" class="btn btn-primary my-2">Tambah Data Komik</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($komik as $k) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/<?= $k['gambar']; ?>" alt="<?= $k['gambar']; ?>"></td>
                            <td><?= $k['judul']; ?></td>
                            <td>
                                <a href="/komik/<?= $k['slug']; ?>" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>