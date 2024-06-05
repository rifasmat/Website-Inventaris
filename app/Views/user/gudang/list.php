<?= $this->extend('user/layout/template'); ?>


<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success text-center" role="alert">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="text-center">
    <h1>Gudang</h1>
</div>

<table class="table">
    <thead class="table-dark">
        <tr>
            <td class="table-dark">NO</td>
            <td class="table-dark">NAMA BARANG</td>
            <td class="table-dark">KODE BARANG</td>
            <td class="table-dark">SPESIFIKASI BARANG</td>
            <td class="table-dark">KONDISI BARANG</td>
            <td class="table-dark">TAHUN PEMBELIAN</td>
            <td class="table-dark">RUANGAN</td>
            <td class="table-dark">PENANGGUNG JAWAB</td>
            <td class="table-dark">JUMLAH</td>
            <td class="table-dark">KETERANGAN</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1; // Nomor urutan
        foreach ($data_gudang as $gudang) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $gudang['gudang_nama']; ?></td>
                <td><?= $gudang['gudang_kode']; ?></td>
                <td><?= $gudang['gudang_spesifikasi']; ?></td>
                <td><?= $gudang['gudang_kondisi']; ?></td>
                <td><?= $gudang['gudang_pembelian']; ?></td>
                <td><?= $gudang['gudang_ruangan']; ?></td>
                <td><?= $gudang['gudang_penanggungjawab']; ?></td>
                <td><?= $gudang['gudang_jumlah']; ?></td>
                <td><?= $gudang['gudang_keterangan']; ?></td>
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