<?= $this->extend('admin/layout/template'); ?>


<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success text-center" role="alert">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="text-center">
    <h1>Gudang</h1>
</div>

<div class="box-header">
    <span class="btn-group pull-right mr-5">
        <a href="<?= base_url('admin/gudang/create'); ?>" class="btn btn-secondary" target="_blank">
            <i class="fa fa-plus"></i> &nbsp; Tambah Data Barang
        </a>
    </span>
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
            <td class="table-dark">ACTION</td>
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

                <td>
                    <a class="btn btn-secondary btn-sm" href="<?= base_url('admin/gudang/edit/' . $gudang['gudang_id']); ?>"><i class="fa fa-cog"></i></a>
                    <a class="btn btn-danger btn-sm" href="<?= base_url('admin/gudang/konfirmasi/'); ?><?= $gudang['gudang_id'] ?>"><i class="fa fa-trash"></i></a>
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