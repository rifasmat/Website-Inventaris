<?= $this->extend('user/layout/template'); ?>


<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success text-center" role="alert">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="text-center">
    <h1>Suplier</h1>
</div>

<table class="table">
    <thead class="table-dark">
        <tr>
            <td class="table-dark">NO</td>
            <td class="table-dark">NAMA SUPLIER</td>
            <td class="table-dark">ALAMAT SUPLIER</td>
            <td class="table-dark">TELEPON SUPLIER</td>
            <td class="table-dark">KETERANGAN</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1; // Nomor urutan
        foreach ($data_suplier as $suplier) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $suplier['suplier_nama']; ?></td>
                <td><?= $suplier['suplier_alamat']; ?></td>
                <td><?= $suplier['suplier_telepon']; ?></td>
                <td><?= $suplier['suplier_keterangan']; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<!-- Pagination -->
<div class="text-right">
    <?= $pager->links() ?>
</div>

<?= $this->endSection(); ?>