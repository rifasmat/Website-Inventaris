<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="text-center">
    <h1>Tambah Data Fasilitas</h1>
</div>

<form action="<?= base_url('admin/fasilitas/create'); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label><b>Foto</b></label>
        <input type="file" name="foto" id="uploadFoto" onchange="previewImage()">
        <img src="#" alt="Preview Foto" id="previewFoto" style="max-width: 150px; display: none;">
        <p style="color: red;"><?= validation_show_error('foto'); ?></p>
    </div>
    <div class="form-group">
        <label for="keterangan"><b>Keterangan</b></label>
        <input type="text" class="form-control" name="keterangan" id="keterangan" autocomplete="off" value="<?= old('keterangan', isset($fasilitas['fasilitas_keterangan']) ? $fasilitas['fasilitas_keterangan'] : '') ?>" placeholder="Masukan Keterangan Fasilitas ..">
        <p class="text-danger"><?= validation_show_error('keterangan'); ?></p>
    </div>
    <div class="form-group">
        <a href="<?= base_url('admin/fasilitas/list'); ?>" class="btn btn-danger btn-sm">&nbsp Kembali</a>
        <input type="submit" class="btn btn-sm btn-primary" value="Tambah Fasilitas">
    </div>
</form>

<?= $this->endSection(); ?>