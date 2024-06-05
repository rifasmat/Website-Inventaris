<?= $this->extend('user/layout/template'); ?>


<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success text-center" role="alert">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="text-center">
    <h1>Fasilitas</h1>
</div>

<table class="table">
    <thead class="table-dark">
        <tr>
            <td class="table-dark">NO</td>
            <td class="table-dark">FOTO</td>
            <td class="table-dark">KETERANGAN</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1; // Nomor urutan
        foreach ($data_fasilitas as $fasilitas) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td>
                    <?php
                    if (!empty($fasilitas['fasilitas_foto'])) {
                        $fotoPath = base_url('gambar/fasilitas/' . $fasilitas['fasilitas_foto']);
                    ?>
                        <img src="<?= $fotoPath; ?>" alt="Foto Fasilitas" class="img-fluid landscape-image" style="max-width: 300px; max-height: 300px">
                    <?php
                    } else {
                        echo "Tidak ada foto";
                    }
                    ?>
                </td>
                <td><?= $fasilitas['fasilitas_keterangan']; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<!-- Pagination -->
<div class="text-center">
    <?= $pager->links() ?>
</div>

<?= $this->endSection(); ?>