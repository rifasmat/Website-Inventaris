<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="text-center">
    <h1>Edit Data Barang</h1>
</div>

<form action="<?= base_url('admin/barang/update/' . $barang['barang_id']); ?>" method="post">
    <?= csrf_field(); ?>
    <div class="form-group">
        <input type="hidden" class="form-control" id="inputKodeRuangan" name="koderuangan" autocomplete="off" value="<?= old('koderuangan', $barang['barang_koderuangan']) ?>" readonly>
        <p class="text-danger"><?= validation_show_error('koderuangan'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Nama Barang</b></label>
        <input type="text" class="form-control" name="nama" autocomplete="off" value="<?= old('nama', $barang['barang_nama']) ?>">
        <p class="text-danger"><?= validation_show_error('nama'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Kode Barang</b></label>
        <input type="text" class="form-control" name="kode" autocomplete="off" value="<?= old('kode', $barang['barang_kode']) ?>">
        <p class="text-danger"><?= validation_show_error('kode'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Tahun Pembelian</b></label>
        <input type="text" class="form-control" name="pembelian" autocomplete="off" value="<?= old('pembelian', $barang['barang_pembelian']) ?>">
        <p class="text-danger"><?= validation_show_error('pembelian'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Spesifikasi Barang</b></label>
        <input type="text" class="form-control" name="spesifikasi" autocomplete="off" value="<?= old('spesifikasi', $barang['barang_spesifikasi']) ?>">
        <p class="text-danger"><?= validation_show_error('spesifikasi'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Kondisi</b></label>
        <input type="text" class="form-control" name="kondisi" autocomplete="off" value="<?= old('kondisi', $barang['barang_kondisi']) ?>">
        <p class="text-danger"><?= validation_show_error('kondisi'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Ruangan</b></label>
        <select class="form-control" name="ruangan" id="selectRuangan" onchange="updateKodeRuangan()" required="required">
            <?php foreach ($data_ruangan as $ruangan) : ?>
                <?php
                $locationRuangan = $ruangan['ruangan_nama'];
                $locationName = $ruangan['ruangan_nama'];
                $kodeRuangan = $ruangan['ruangan_kode'];

                if ($barang['barang_ruangan'] == $locationRuangan) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                }

                echo '<option value="' . $locationRuangan . '" ' . $selected . ' data-kode="' . $kodeRuangan . '">' . $locationName . '</option>';
                ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label><b>Penanggung Jawab</b></label>
        <input type="text" class="form-control" name="penanggungjawab" autocomplete="off" value="<?= old('penanggungjawab', $barang['barang_penanggungjawab']) ?>">
        <p class="text-danger"><?= validation_show_error('penanggungjawab'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Jumlah Barang</b></label>
        <input type="number" class="form-control" name="jumlah" autocomplete="off" value="<?= old('jumlah', $barang['barang_jumlah']) ?>">
        <p class="text-danger"><?= validation_show_error('jumlah'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Keterangan</b></label>
        <input type="text" class="form-control" name="keterangan" autocomplete="off" value="<?= old('keterangan', $barang['barang_keterangan']) ?>">
    </div>
    <div class="form-group">
        <a href="<?= base_url('admin/barang/list'); ?>" class="btn btn-sm btn-danger">Kembali</a>
        <input type="submit" class="btn btn-sm btn-primary" value="Edit">
    </div>
</form>

<?= $this->endSection(); ?>