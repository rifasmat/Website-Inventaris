<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('gagal') || session()->getFlashdata('error')) : ?>
    <?php if (session()->getFlashdata('gagal')) : ?>
        <div class="alert alert-danger text-center" role="alert">
            <?= session()->getFlashdata('gagal') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger text-center" role="alert">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
<?php endif; ?>


<div class="text-center">
    <h1>Tambah Data Barang</h1>
</div>

<form action="<?= base_url('admin/barang/create'); ?>" method="post">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label for="ruangan"><b>Nama Ruangan</b></label>
        <select class="form-control" name="ruangan" id="ruangan" onchange="fillDataRuangan(this)">
            <option value=""> - Pilih Ruangan - </option>
            <?php foreach ($data_ruangan as $ruangan) : ?>
                <option value="<?= $ruangan['ruangan_nama']; ?>" data-kode="<?= $ruangan['ruangan_kode']; ?>"><?= $ruangan['ruangan_nama']; ?></option>
            <?php endforeach; ?>
        </select>
        <p class="text-danger"><?= validation_show_error('ruangan'); ?></p>
    </div>
    <div class="form-group">
        <label for="barang"><b>Nama Barang</b></label>
        <select class="form-control" name="barang" id="barang" onchange="fillData(this)">
            <option value=""> - Pilih Barang - </option>
            <?php foreach ($data_gudang as $gudang) : ?>
                <?php
                $optionText = $gudang['gudang_nama'] . ' - ' . $gudang['gudang_kode'] . ' - ' . $gudang['gudang_pembelian'];
                ?>
                <option value="<?= $gudang['gudang_nama']; ?>" data-kode="<?= $gudang['gudang_kode']; ?>" data-tahun="<?= $gudang['gudang_pembelian']; ?>" data-spesifikasi="<?= $gudang['gudang_spesifikasi']; ?>" data-kondisi="<?= $gudang['gudang_kondisi']; ?>" data-penanggungjawab="<?= $gudang['gudang_penanggungjawab']; ?>">
                    <?= $optionText; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <p class="text-danger"><?= validation_show_error('barang'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Kode Barang</b></label>
        <input type="text" class="form-control" name="kode" id="kode" autocomplete="off" value="<?= old('kode', isset($barang['barang_kode']) ? $barang['barang_kode'] : '') ?>" placeholder="Masukan Kode Barang ..">
        <p class="text-danger"><?= validation_show_error('kode'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Tahun Pembelian Barang</b></label>
        <input type="text" class="form-control" name="pembelian" id="pembelian" autocomplete="off" value="<?= old('pembelian', isset($barang['barang_pembelian']) ? $barang['barang_pembelian'] : '') ?>" placeholder="Masukan Tahun Pembelian Barang..">
    </div>
    <div class="form-group">
        <label><b>Spesifikasi Barang</b></label>
        <input type="text" class="form-control" name="spesifikasi" id="spesifikasi" autocomplete="off" value="<?= old('spesifikasi', isset($barang['barang_spesifikasi']) ? $barang['barang_spesifikasi'] : '') ?>" placeholder="Masukan Spesifikasi Barang..">
    </div>
    <div class="form-group">
        <label><b>Kondisi Barang</b></label>
        <input type="text" class="form-control" name="kondisi" id="kondisi" autocomplete="off" value="<?= old('kondisi', isset($barang['barang_kondisi']) ? $barang['barang_kondisi'] : '') ?>" placeholder="Masukan Kondisi Barang ..">
    </div>
    <div class="form-group">
        <input type="hidden" class="form-control" name="koderuangan" id="koderuangan" autocomplete="off" value="<?= old('koderuangan', isset($barang['barang_koderuangan']) ? $barang['barang_koderuangan'] : '') ?>" placeholder="Masukan Kode Ruangan Barang .." readonly>
    </div>
    <div class="form-group">
        <label><b>Penanggung Jawab</b></label>
        <input type="text" class="form-control" name="penanggungjawab" id="penanggungjawab" autocomplete="off" value="<?= old('penanggungjawab', isset($barang['barang_penanggungjawab']) ? $barang['barang_penanggungjawab'] : '') ?>" placeholder="Masukan Nama Penanggung Jawab..">
        <p class="text-danger"><?= validation_show_error('penanggungjawab'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Jumlah Barang</b></label>
        <input type="number" class="form-control" name="jumlah" autocomplete="off" value="<?= old('jumlah', isset($barang['barang_jumlah']) ? $barang['barang_jumlah'] : '') ?>" placeholder="Masukan Jumlah Barang..">
        <p class="text-danger"><?= validation_show_error('jumlah'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Ketarangan</b></label>
        <input type="text" class="form-control" name="keterangan" autocomplete="off" value="<?= old('keterangan', isset($barang['barang_keterangan']) ? $barang['barang_keterangan'] : '') ?>" placeholder="Masukan Ketarangan ..">
    </div>
    <div class="form-group">
        <a href="<?= base_url('admin/barang/list'); ?>" class="btn btn-danger btn-sm">&nbsp Kembali</a>
        <input type="submit" class="btn btn-sm btn-primary" value="Tambah Data barang">
    </div>
</form>

<?= $this->endSection(); ?>