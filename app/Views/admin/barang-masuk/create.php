<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="text-center">
    <h1>Tambah Data Barang Masuk</h1>
</div>

<form action="<?= base_url('admin/barang-masuk/create'); ?>" method="post">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label for="barang"><b>Nama Barang</b></label>
        <select class="form-control" name="barang" id="barang">
            <option value=""> - Pilih Barang - </option>
            <?php foreach ($data_gudang as $gudang) : ?>
                <option value="<?= $gudang['gudang_nama']; ?>"><?= $gudang['gudang_nama']; ?></option>
            <?php endforeach; ?>
        </select>
        <p class="text-danger"><?= validation_show_error('barang'); ?></p>
    </div>
    <div class="form-group">
        <label for="tanggal"><b>Tanggal Masuk</b></label>
        <input type="text" class="form-control" name="tanggal" id="tanggal" autocomplete="off" value="<?= old('tanggal', isset($barangmasuk['barangmasuk_tanggal']) ? $barangmasuk['barangmasuk_tanggal'] : '') ?>" placeholder="Masukan Tanggal Barang ..">
        <p style="color: red;"><?= validation_show_error('tanggal'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Jumlah Barang</b></label>
        <input type="number" class="form-control" name="jumlah" autocomplete="off" value="<?= old('jumlah', isset($barangmasuk['barangmasuk_jumlah']) ? $barangmasuk['barangmasuk_jumlah'] : '') ?>" placeholder="Masukan Jumlah Barang..">
        <p style="color: red;"><?= validation_show_error('jumlah'); ?></p>
    </div>
    <div class="form-group">
        <label for="suplier"><b>Nama Suplier</b></label>
        <select class="form-control" name="suplier" id="suplier">
            <option value=""> - Pilih Suplier - </option>
            <?php foreach ($data_suplier as $suplier) : ?>
                <option value="<?= $suplier['suplier_nama']; ?>"><?= $suplier['suplier_nama']; ?></option>
            <?php endforeach; ?>
        </select>
        <p class="text-danger"><?= validation_show_error('ruangan'); ?></p>
    </div>
    <div class="form-group">
        <a href="<?= base_url('admin/barang-masuk/list'); ?>" class="btn btn-danger btn-sm">&nbsp Kembali</a>
        <input type="submit" class="btn btn-sm btn-primary" value="Tambah Data Barang Masuk">
    </div>
</form>

<?= $this->endSection(); ?>