<?= $this->extend('admin/layout/template'); ?>


<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success text-center" role="alert">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="text-center">
    <h1>Pengguna</h1>
</div>

<div class="box-header">
    <span class="btn-group pull-right mr-5">
        <a href="<?= base_url('admin/pengguna/create'); ?>" class="btn btn-secondary" target="_blank">
            <i class="fa fa-plus"></i> &nbsp; Tambah Data Pengguna
        </a>
    </span>
</div>

<table class="table">
    <thead class="table-dark">
        <tr>
            <td class="table-dark">NO</td>
            <td class="table-dark">NAMA</td>
            <td class="table-dark">USERNAME</td>
            <td class="table-dark">EMAIL</td>
            <td class="table-dark">LEVEL PENGGUNA</td>
            <td class="table-dark">FOTO</td>
            <td class="table-dark">ACTION</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1; // Nomor urutan
        foreach ($data_pengguna as $pengguna) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $pengguna['pengguna_nama']; ?></td>
                <td><?= $pengguna['pengguna_username']; ?></td>
                <td><?= $pengguna['pengguna_email']; ?></td>
                <td><?= $pengguna['pengguna_role']; ?></td>
                <td>
                    <?php
                    if (!empty($pengguna['pengguna_foto'])) {
                        $fotoPath = base_url('gambar/pengguna/' . $pengguna['pengguna_foto']);
                    ?>
                        <img src="<?= $fotoPath; ?>" alt="Foto Pengguna" style="width: 100px; height: 100px">
                    <?php
                    } else {
                        echo "Tidak ada foto";
                    }
                    ?>
                </td>
                <td>
                    <a class="btn btn-secondary btn-sm" href="<?= base_url('admin/pengguna/edit/' . $pengguna['pengguna_id']); ?>"><i class="fa fa-cog"></i></a>
                    <a class="btn btn-danger btn-sm" href="<?= base_url('admin/pengguna/konfirmasi/'); ?><?= $pengguna['pengguna_id'] ?>"><i class="fa fa-trash"></i></a>
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