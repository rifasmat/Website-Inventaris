<?= $this->extend('admin/layout/template'); ?>


<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success text-center" role="alert">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="text-center">
    <h1>Suplier</h1>
</div>

<div class="box-header">
    <span class="btn-group pull-right mr-5">
        <a href="<?= base_url('admin/suplier/create'); ?>" class="btn btn-secondary" target="_blank">
            <i class="fa fa-plus"></i> &nbsp; Tambah Data Suplier
        </a>
    </span>
</div>

<table class="table">
    <thead class="table-dark">
        <tr>
            <td class="table-dark">NO</td>
            <td class="table-dark">NAMA SUPLIER</td>
            <td class="table-dark">ALAMAT SUPLIER</td>
            <td class="table-dark">TELEPON SUPLIER</td>
            <td class="table-dark">KETERANGAN</td>
            <td class="table-dark">ACTION</td>
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

                <td>
                    <a class="btn btn-secondary btn-sm" href="<?= base_url('admin/suplier/edit/' . $suplier['suplier_id']); ?>"><i class="fa fa-cog"></i></a>
                    <a class="btn btn-danger btn-sm" href="<?= base_url('admin/suplier/konfirmasi/'); ?><?= $suplier['suplier_id'] ?>"><i class="fa fa-trash"></i></a>
                </td>
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