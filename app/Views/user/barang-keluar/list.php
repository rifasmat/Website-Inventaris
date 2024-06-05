<?= $this->extend('user/layout/template'); ?>


<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success text-center" role="alert">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="text-center">
    <h1>Barang Keluar</h1>
</div>

<table class="table">
    <thead class="table-dark">
        <tr>
            <td class="table-dark">NO</td>
            <td class="table-dark">NAMA BARANG</td>
            <td class="table-dark">KODE BARANG</td>
            <td class="table-dark">RUANGAN</td>
            <td class="table-dark">JUMLAH</td>
            <td class="table-dark">TANGGAL KELUAR</td>
            <td class="table-dark">KETERANGAN</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1; // Nomor urutan
        foreach ($data_barang_keluar as $barang_keluar) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $barang_keluar['barangkeluar_nama']; ?></td>
                <td><?= $barang_keluar['barangkeluar_kode']; ?></td>
                <td><?= $barang_keluar['barangkeluar_ruangan']; ?></td>
                <td><?= $barang_keluar['barangkeluar_jumlah']; ?></td>
                <td><?= $barang_keluar['barangkeluar_tanggalkeluar']; ?></td>
                <td><?= $barang_keluar['barangkeluar_keterangan']; ?></td>
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