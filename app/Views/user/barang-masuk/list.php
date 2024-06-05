<?= $this->extend('user/layout/template'); ?>


<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success text-center" role="alert">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="text-center">
    <h1>Barang Masuk</h1>
</div>

<table class="table">
    <thead class="table-dark">
        <tr>
            <td class="table-dark">NO</td>
            <td class="table-dark">NAMA BARANG</td>
            <td class="table-dark">TANGGAL MASUK</td>
            <td class="table-dark">JUMLAH</td>
            <td class="table-dark">NAMA SUPLIER</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1; // Nomor urutan
        foreach ($data_barang_masuk as $barang_masuk) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $barang_masuk['barangmasuk_nama']; ?></td>
                <td><?= $barang_masuk['barangmasuk_tanggal']; ?></td>
                <td><?= $barang_masuk['barangmasuk_jumlah']; ?></td>
                <td><?= $barang_masuk['barangmasuk_suplier']; ?></td>
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