<?= $this->extend('admin/layout/template'); ?>


<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success text-center" role="alert">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="text-center">
    <h1>Barang</h1>
</div>

<div class="box-header">
    <span class="btn-group pull-right mr-5">
        <a href="<?= base_url('admin/barang/create'); ?>" class="btn btn-secondary" target="_blank">
            <i class="fa fa-plus"></i> &nbsp; Tambah Data Barang
        </a>
    </span>
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
            <td class="table-dark">ACTION</td>
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
                <td>
                    <a class="btn btn-secondary btn-sm" href="<?= base_url('admin/barang/edit/' . $barang['barang_id']); ?>"><i class="fa fa-cog"></i></a>
                    <a class="btn btn-danger btn-sm" href="<?= base_url('admin/barang/konfirmasi/'); ?><?= $barang['barang_id'] ?>"><i class="fa fa-trash"></i></a>
                </td>
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