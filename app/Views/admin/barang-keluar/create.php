<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger text-center">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

<div class="text-center">
    <h1>Tambah Data Barang Keluar</h1>
</div>

<form action="<?= base_url('admin/barang-keluar/create'); ?>" method="post">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label for="ruangan"><b>Nama Ruangan</b></label>
        <select class="form-control" name="ruangan" id="ruangan">
            <option value=""> - Pilih Ruangan - </option>
            <?php foreach ($data_ruangan as $ruangan) : ?>
                <option value="<?= $ruangan['ruangan_nama']; ?>"><?= $ruangan['ruangan_kode']; ?></option>
            <?php endforeach; ?>
        </select>
        <p class="text-danger"><?= validation_show_error('ruangan'); ?></p>
    </div>
    <div class="form-group">
        <label for="barang"><b>Nama Barang</b></label>
        <select class="form-control" name="barang" id="barang">
            <option value=""> - Pilih Barang - </option>
        </select>
        <p class="text-danger"><?= validation_show_error('barang'); ?></p>
    </div>
    <div class="form-group">
        <label for="kode"><b>Kode Barang</b></label>
        <input type="text" class="form-control" name="kode" id="kode" autocomplete="off" value="<?= old('kode', isset($barangkeluar['barangkeluar_kode']) ? $barangkeluar['barangkeluar_kode'] : '') ?>" placeholder="Masukan Kode Barang .." readonly>
        <p style="color: red;"><?= validation_show_error('kode'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Jumlah Barang</b></label>
        <input type="number" class="form-control" name="jumlah" autocomplete="off" value="<?= old('jumlah', isset($barangkeluar['barangkeluar_jumlah']) ? $barangkeluar['barangkeluar_jumlah'] : '') ?>" placeholder="Masukan Jumlah Barang..">
        <p style="color: red;"><?= validation_show_error('jumlah'); ?></p>
    </div>
    <div class="form-group">
        <label for="tanggalkeluar"><b>Tanggal Keluar</b></label>
        <input type="text" class="form-control" name="tanggalkeluar" id="tanggalkeluar" autocomplete="off" value="<?= old('tanggalkeluar', isset($barangkeluar['barangkeluar_tanggalkeluar']) ? $barangkeluar['barangkeluar_tanggalkeluar'] : '') ?>" placeholder="Masukan Tanggal Keluar Barang ..">
        <p style="color: red;"><?= validation_show_error('tanggalkeluar'); ?></p>
    </div>
    <div class="form-group">
        <label for="keterangan"><b>Keterangan</b></label>
        <input type="text" class="form-control" name="keterangan" id="keterangan" autocomplete="off" value="<?= old('keterangan', isset($barangkeluar['barangkeluar_keterangan']) ? $barangkeluar['barangkeluar_keterangan'] : '') ?>" placeholder="Masukan Keterangan Barang ..">
        <p style="color: red;"><?= validation_show_error('keterangan'); ?></p>
    </div>
    <div class="form-group">
        <a href="<?= base_url('admin/barang-keluar/list'); ?>" class="btn btn-danger btn-sm">&nbsp Kembali</a>
        <input type="submit" class="btn btn-sm btn-primary" value="Tambah Data Barang Keluar">
    </div>
</form>

<?= $this->endSection(); ?>