<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="text-center">
    <h1>Edit Data Suplier</h1>
</div>

<form action="<?= base_url('admin/suplier/update/' . $suplier['suplier_id']); ?>" method="post">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label><b>Nama Suplier</b></label>
        <input type="text" class="form-control" name="nama" autocomplete="off" value="<?= old('nama', $suplier['suplier_nama']) ?>">
        <p class="text-danger"><?= validation_show_error('nama'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Alamat</b></label>
        <input type="text" class="form-control" name="alamat" autocomplete="off" value="<?= old('alamat', $suplier['suplier_alamat']) ?>">
        <p class="text-danger"><?= validation_show_error('alamat'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Telepon</b></label>
        <input type="text" class="form-control" name="telepon" autocomplete="off" value="<?= old('telepon', $suplier['suplier_telepon']) ?>">
        <p class="text-danger"><?= validation_show_error('telepon'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Keterangan</b></label>
        <input type="text" class="form-control" name="keterangan" autocomplete="off" value="<?= old('keterangan', $suplier['suplier_keterangan']) ?>">
    </div>
    <div class="form-group">
        <a href="<?= base_url('admin/suplier/list'); ?>" class="btn btn-sm btn-danger">Kembali</a>
        <input type="submit" class="btn btn-sm btn-primary" value="Edit">
    </div>
</form>

<?= $this->endSection(); ?>