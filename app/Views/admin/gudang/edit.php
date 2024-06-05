<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="text-center">
    <h1>Edit Data Gudang</h1>
</div>

<form action="<?= base_url('admin/gudang/update/' . $gudang['gudang_id']); ?>" method="post">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label><b>Nama Barang</b></label>
        <input type="text" class="form-control" name="barang" autocomplete="off" value="<?= old('barang', $gudang['gudang_nama']) ?>">
        <p class="text-danger"><?= validation_show_error('barang'); ?></p>
    </div>
    <div class=" form-group">
        <label><b>Kode Barang</b></label>
        <input type="text" class="form-control" name="kode" autocomplete="off" value="<?= old('kode', $gudang['gudang_kode']) ?>">
        <p class="text-danger"><?= validation_show_error('kode'); ?></p>
    </div>
    <div class=" form-group">
        <label><b>Spesifikasi Barang</b></label>
        <input type="text" class="form-control" name="spesifikasi" autocomplete="off" value="<?= old('spesifikasi', $gudang['gudang_spesifikasi']) ?>">
    </div>
    <div class=" form-group">
        <label><b>Kondisi Barang</b></label>
        <input type="text" class="form-control" name="kondisi" autocomplete="off" value="<?= old('kondisi', $gudang['gudang_kondisi']) ?>">
        <p class="text-danger"><?= validation_show_error('kondisi'); ?></p>
    </div>
    <div class=" form-group">
        <label><b>Tahun Pembelian Barang</b></label>
        <input type="text" class="form-control" name="pembelian" autocomplete="off" value="<?= old('pembelian', $gudang['gudang_pembelian']) ?>">
        <p class="text-danger"><?= validation_show_error('pembelian'); ?></p>
    </div>
    <input type="hidden" class="form-control" name="ruangan" autocomplete="off" value="Gudang">
    <div class=" form-group">
        <label><b>Penanggung Jawab</b></label>
        <input type="text" class="form-control" name="penanggungjawab" autocomplete="off" value="<?= old('penanggungjawab', $gudang['gudang_penanggungjawab']) ?>">
        <p class="text-danger"><?= validation_show_error('penanggungjawab'); ?></p>
    </div>
    <div class=" form-group">
        <label><b>Jumlah</b></label>
        <input type="number" class="form-control" name="jumlah" autocomplete="off" value="<?= old('jumlah', $gudang['gudang_jumlah']) ?>">
    </div>
    <div class=" form-group">
        <label><b>Keterangan</b></label>
        <input type="text" class="form-control" name="keterangan" autocomplete="off" value="<?= old('keterangan', $gudang['gudang_keterangan']) ?>">
    </div>
    <div class=" form-group">
        <a href="<?= base_url('admin/gudang/list'); ?>" class="btn btn-sm btn-danger">Kembali</a>
        <input type="submit" class="btn btn-sm btn-primary" value="Edit">
    </div>
</form>

<?= $this->endSection(); ?>