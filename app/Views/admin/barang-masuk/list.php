<?= $this->extend('admin/layout/template'); ?>


<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success text-center" role="alert">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="text-center">
    <h1>Barang Masuk</h1>
</div>

<div class="box-header">
    <span class="btn-group pull-right mr-5">
        <a href="<?= base_url('admin/barang-masuk/create'); ?>" class="btn btn-secondary" target="_blank">
            <i class="fa fa-plus"></i> &nbsp; Tambah Data Barang Masuk
        </a>
    </span>
</div>

<table class="table">
    <thead class="table-dark">
        <tr>
            <td class="table-dark">NO</td>
            <td class="table-dark">NAMA BARANG</td>
            <td class="table-dark">TANGGAL MASUK</td>
            <td class="table-dark">JUMLAH</td>
            <td class="table-dark">NAMA SUPLIER</td>
            <td class="table-dark">ACTION</td>
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
                <td>
                    <a class="btn btn-secondary btn-sm" href="<?= base_url('admin/barang-masuk/edit/' . $barang_masuk['barangmasuk_id']); ?>"><i class="fa fa-cog"></i></a>
                    <a class="btn btn-danger btn-sm" href="<?= base_url('admin/barang-masuk/konfirmasi/'); ?><?= $barang_masuk['barangmasuk_id'] ?>"><i class="fa fa-trash"></i></a>
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