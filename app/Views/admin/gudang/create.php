<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="text-center">
    <h1>Tambah Data Gudang</h1>
</div>

<form action="<?= base_url('admin/gudang/create'); ?>" method="post">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label for="barang"><b>Nama Barang</b></label>
        <select class="form-control" name="barang" id="barang">
            <option value=""> - Pilih Barang - </option>
            <?php foreach ($data_barangmasuk as $barangmasuk) : ?>
                <option value="<?= $barangmasuk['barangmasuk_nama']; ?>"><?= $barangmasuk['barangmasuk_nama'] . ' - ' . date('d/m/Y', strtotime($barangmasuk['barangmasuk_tanggal'])); ?></option>
            <?php endforeach; ?>
        </select>
        <p class="text-danger"><?= validation_show_error('barang'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Kode Barang</b></label>
        <input type="text" class="form-control" name="kode" autocomplete="off" value="<?= old('kode', isset($gudang['gudang_kode']) ? $gudang['gudang_kode'] : '') ?>" placeholder="Masukan Kode Barang ..">
        <p style="color: red;"><?= validation_show_error('kode'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Spesifikasi Barang</b></label>
        <input type="text" class="form-control" name="spesifikasi" autocomplete="off" value="<?= old('spesifikasi', isset($gudang['gudang_spesifikasi']) ? $gudang['gudang_spesifikasi'] : '') ?>" placeholder="Masukan Spesifikasi Barang..">
    </div>
    <div class="form-group">
        <label><b>Kondisi Barang</b></label>
        <input type="text" class="form-control" name="kondisi" autocomplete="off" value="<?= old('kondisi', isset($gudang['gudang_kondisi']) ? $gudang['gudang_kondisi'] : '') ?>" placeholder="Masukan Kondisi Barang ..">
        <p class="text-danger"><?= validation_show_error('kondisi'); ?></p>

    </div>
    <div class="form-group">
        <label><b>Tahun Pembelian Barang</b></label>
        <input type="text" class="form-control" name="pembelian" autocomplete="off" value="<?= old('pembelian', isset($gudang['gudang_pembelian']) ? $gudang['gudang_pembelian'] : '') ?>" placeholder="Masukan Tahun Pembelian Barang..">
        <p class="text-danger"><?= validation_show_error('pembelian'); ?></p>

    </div>
    <div class="form-group">
        <input type="hidden" class="form-control" name="ruangan" autocomplete="off" value="Gudang" readonly>
    </div>
    <div class="form-group">
        <label><b>Penanggung Jawab</b></label>
        <input type="text" class="form-control" name="penanggungjawab" autocomplete="off" value="<?= old('penanggungjawab', isset($gudang['gudang_penanggungjawab']) ? $gudang['gudang_penanggungjawab'] : '') ?>" placeholder="Masukan Nama Penanggung Jawab..">
        <p class="text-danger"><?= validation_show_error('penanggungjawab'); ?></p>

    </div>
    <div class="form-group">
        <label><b>Jumlah Barang</b></label>
        <input type="number" class="form-control" name="jumlah" autocomplete="off" value="<?= old('jumlah', isset($gudang['gudang_jumlah']) ? $gudang['gudang_jumlah'] : '') ?>" placeholder="Masukan Jumlah Barang..">
    </div>
    <div class="form-group">
        <label><b>Ketarangan</b></label>
        <input type="text" class="form-control" name="keterangan" autocomplete="off" value="<?= old('keterangan', isset($gudang['gudang_keterangan']) ? $gudang['gudang_keterangan'] : '') ?>" placeholder="Masukan Ketarangan ..">
    </div>
    <div class="form-group">
        <a href="<?= base_url('admin/gudang/list'); ?>" class="btn btn-danger btn-sm">&nbsp Kembali</a>
        <input type="submit" class="btn btn-sm btn-primary" value="Tambah Data Gudang">
    </div>
</form>

<?= $this->endSection(); ?>