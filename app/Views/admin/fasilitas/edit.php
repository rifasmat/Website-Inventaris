<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="text-center">
    <h1>Edit Data Fasilitas</h1>
</div>

<form action="<?= base_url('admin/fasilitas/update/' . $fasilitas['fasilitas_id']); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label><b>Foto</b></label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="foto" id="uploadFoto" onchange="previewImage()">
            <label for="uploadFoto"></label>
        </div>
        <img src="<?= base_url('gambar/fasilitas/' . $fasilitas['fasilitas_foto']); ?>" alt="Foto Fasilitas" id="previewFoto" style="max-width: 150px; margin-top: 10px;">
    </div>
    <div class="form-group">
        <label><b>Keterangan</b></label>
        <input type="text" class="form-control" name="keterangan" autocomplete="off" value="<?= old('keterangan', $fasilitas['fasilitas_keterangan']) ?>">
        <p class="text-danger"><?= validation_show_error('keterangan'); ?></p>
    </div>
    <div class="form-group">
        <a href="<?= base_url('admin/fasilitas/list'); ?>" class="btn btn-sm btn-danger">Kembali</a>
        <input type="submit" class="btn btn-sm btn-primary" value="Edit">
    </div>
</form>

<?= $this->endSection(); ?>