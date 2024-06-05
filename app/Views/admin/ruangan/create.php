<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="text-center">
    <h1>Tambah Data Ruangan</h1>
</div>

<form action="<?= base_url('admin/ruangan/create'); ?>" method="post">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label><b>Kode Ruangan</b></label>
        <input type="text" class="form-control" name="kode" autocomplete="off" value="<?= old('kode', isset($ruangan['ruangan_kode']) ? $ruangan['ruangan_kode'] : '') ?>" placeholder="Masukan Kode Ruangan..">
    </div>
    <div class="form-group">
        <label><b>Nama Ruangan</b></label>
        <input type="text" class="form-control" name="nama" autocomplete="off" value="<?= old('nama', isset($ruangan['ruangan_nama']) ? $ruangan['ruangan_nama'] : '') ?>" placeholder="Masukan Nama Ruangan ..">
        <p style="color: red;"><?= validation_show_error('nama'); ?></p>
    </div>
    <div class="form-group">
        <a href="<?= base_url('admin/ruangan/list'); ?>" class="btn btn-danger btn-sm">&nbsp Kembali</a>
        <input type="submit" class="btn btn-sm btn-primary" value="Tambah Ruangan">
    </div>
</form>

<?= $this->endSection(); ?>