<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="text-center">
    <h1>Tambah Data Suplier</h1>
</div>

<form action="<?= base_url('admin/suplier/create'); ?>" method="post">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label for="nama"><b>Nama Suplier</b></label>
        <input type="text" class="form-control" name="nama" id="nama" autocomplete="off" value="<?= old('nama', isset($suplier['suplier_nama']) ? $suplier['suplier_nama'] : '') ?>" placeholder="Masukan Nama Suplier ..">
        <p class="text-danger"><?= validation_show_error('nama'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Alamat Suplier</b></label>
        <input type="text" class="form-control" name="alamat" autocomplete="off" value="<?= old('alamat', isset($suplier['suplier_alamat']) ? $suplier['suplier_alamat'] : '') ?>" placeholder="Masukan Alamat Suplier..">
        <p style="color: red;"><?= validation_show_error('alamat'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Telepon Suplier</b></label>
        <input type="number" class="form-control" name="telepon" autocomplete="off" value="<?= old('telepon', isset($suplier['suplier_telepon']) ? $suplier['suplier_telepon'] : '') ?>" placeholder="Masukan Telepon Suplier..">
        <p style="color: red;"><?= validation_show_error('telepon'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Ketarangan</b></label>
        <input type="text" class="form-control" name="keterangan" autocomplete="off" value="<?= old('keterangan', isset($suplier['suplier_keterangan']) ? $suplier['suplier_keterangan'] : '') ?>" placeholder="Masukan Ketarangan ..">
    </div>
    <div class="form-group">
        <a href="<?= base_url('admin/suplier/list'); ?>" class="btn btn-danger btn-sm">&nbsp Kembali</a>
        <input type="submit" class="btn btn-sm btn-primary" value="Tambah Suplier">
    </div>
</form>

<?= $this->endSection(); ?>