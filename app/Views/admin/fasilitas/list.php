<?= $this->extend('admin/layout/template'); ?>


<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success text-center" role="alert">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="text-center">
    <h1>Fasilitas</h1>
</div>

<div class="box-header">
    <span class="btn-group pull-right mr-5">
        <a href="<?= base_url('admin/fasilitas/create'); ?>" class="btn btn-secondary" target="_blank">
            <i class="fa fa-plus"></i> &nbsp; Tambah Data Fasilitas
        </a>
    </span>
</div>

<table class="table">
    <thead class="table-dark">
        <tr>
            <td class="table-dark">NO</td>
            <td class="table-dark">FOTO</td>
            <td class="table-dark">KETERANGAN</td>
            <td class="table-dark">ACTION</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1; // Nomor urutan
        foreach ($data_fasilitas as $fasilitas) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td>
                    <?php
                    if (!empty($fasilitas['fasilitas_foto'])) {
                        $fotoPath = base_url('gambar/fasilitas/' . $fasilitas['fasilitas_foto']);
                    ?>
                        <img src="<?= $fotoPath; ?>" alt="Foto Fasilitas" class="img-fluid landscape-image" style="max-width: 300px; max-height: 300px">
                    <?php
                    } else {
                        echo "Tidak ada foto";
                    }
                    ?>
                </td>
                <td><?= $fasilitas['fasilitas_keterangan']; ?></td>

                <td>
                    <a class="btn btn-secondary btn-sm" href="<?= base_url('admin/fasilitas/edit/' . $fasilitas['fasilitas_id']); ?>"><i class="fa fa-cog"></i></a>
                    <a class="btn btn-danger btn-sm" href="<?= base_url('admin/fasilitas/konfirmasi/'); ?><?= $fasilitas['fasilitas_id'] ?>"><i class="fa fa-trash"></i></a>
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