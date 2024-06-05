<?= $this->extend('user/layout/template'); ?>


<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success text-center" role="alert">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="text-center">
    <h1>Barang</h1>
</div>

<table class="table">
    <thead class="table-dark">
        <tr>
            <td class="table-dark">NO</td>
            <td class="table-dark">KODE RUANGAN</td>
            <td class="table-dark">NAMA BARANG</td>
            <td class="table-dark">KODE BARANG</td>
            <td class="table-dark">TAHUN PEMBELIAN</td>
            <td class="table-dark">SPESIFIKASI BARANG</td>
            <td class="table-dark">KONDISI BARANG</td>
            <td class="table-dark">RUANGAN</td>
            <td class="table-dark">PENANGGUNG JAWAB</td>
            <td class="table-dark">JUMLAH</td>
            <td class="table-dark">KETERANGAN</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1; // Nomor urutan
        foreach ($data_barang as $barang) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $barang['barang_koderuangan']; ?></td>
                <td><?= $barang['barang_nama']; ?></td>
                <td><?= $barang['barang_kode']; ?></td>
                <td><?= $barang['barang_pembelian']; ?></td>
                <td><?= $barang['barang_spesifikasi']; ?></td>
                <td><?= $barang['barang_kondisi']; ?></td>
                <td><?= $barang['barang_ruangan']; ?></td>
                <td><?= $barang['barang_penanggungjawab']; ?></td>
                <td><?= $barang['barang_jumlah']; ?></td>
                <td><?= $barang['barang_keterangan']; ?></td>
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