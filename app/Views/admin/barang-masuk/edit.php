<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="text-center">
    <h1>Edit Data Barang Masuk</h1>
</div>

<form action="<?= base_url('admin/barang-masuk/update/' . $barang['barangmasuk_id']); ?>" method="post">
    <?= csrf_field(); ?>
    <div class="form-group">
        <input type="hidden" class="form-control" name="id" autocomplete="off" value="<?= old('id', $barang['barangmasuk_id']) ?>" readonly>
    </div>
    <div class="form-group">
        <label><b>Nama Barang</b></label>
        <select class="form-control" name="barang" required="required">
            <option value=""> - Pilih Barang - </option>
            <?php foreach ($data_gudang as $gudang) : ?>
                <option value="<?= $gudang['gudang_nama']; ?>" <?= ($barang['barangmasuk_nama'] == $gudang['gudang_nama']) ? 'selected' : ''; ?>><?= $gudang['gudang_nama']; ?></option>
            <?php endforeach; ?>
        </select>
        <p class="text-danger"><?= validation_show_error('barang'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Tanggal Masuk</b></label>
        <input type="text" class="form-control" name="tanggal" autocomplete="off" value="<?= old('tanggal', $barang['barangmasuk_tanggal']) ?>">
        <p class="text-danger"><?= validation_show_error('tanggal'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Jumlah</b></label>
        <input type="text" class="form-control" name="jumlah" autocomplete="off" value="<?= old('jumlah', $barang['barangmasuk_jumlah']) ?>">
        <p class="text-danger"><?= validation_show_error('jumlah'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Nama Suplier</b></label>
        <select class="form-control" name="suplier" required="required">
            <option value=""> - Pilih Barang - </option>
            <?php foreach ($data_suplier as $suplier) : ?>
                <option value="<?= $suplier['suplier_nama']; ?>" <?= ($barang['barangmasuk_suplier'] == $suplier['suplier_nama']) ? 'selected' : ''; ?>><?= $suplier['suplier_nama']; ?></option>
            <?php endforeach; ?>
        </select>
        <p class="text-danger"><?= validation_show_error('suplier'); ?></p>
    </div>
    <div class="form-group">
        <a href="<?= base_url('admin/barang-masuk/list'); ?>" class="btn btn-sm btn-danger">Kembali</a>
        <input type="submit" class="btn btn-sm btn-primary" value="Edit">
    </div>
</form>

<?= $this->endSection(); ?>