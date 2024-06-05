<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div>
    <h1>Konfirmasi Hapus Data Barang Masuk</h1>
</div>

<div>
    <h3>Yakin Ingin Menghapus Barang <?= $barang['barangmasuk_nama']; ?> Dari Barang Masuk ?</h3>
</div>

<div class="box-body">
    <h5 class="text-danger">Data Yang Sudah Dihapus Tidak Dapat Dikembalikan</h5>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <td class="table-dark">NAMA BARANG</td>
                <td class="table-dark">TANGGAL MASUK</td>
                <td class="table-dark">JUMLAH BARANG</td>
                <td class="table-dark">NAMA SUPLIER</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $barang['barangmasuk_nama'];  ?></td>
                <td><?php echo $barang['barangmasuk_tanggal'];  ?></td>
                <td><?php echo $barang['barangmasuk_jumlah']; ?></td>
                <td><?php echo $barang['barangmasuk_suplier']; ?></td>
            </tr>
        </tbody>
    </table>
    <div>
        <a href="<?= base_url('admin/barang-masuk/list'); ?>" class="btn btn-success btn-sm"><i class="fa fa-reply"></i> &nbsp Kembali</a>
        <form method="post" action="<?= base_url('admin/barang-masuk/delete/' . $barang['barangmasuk_id']); ?>" style="display:inline;">
            <?= csrf_field(); ?>
            <button type="submit" class="btn btn-danger btn-sm pull-right"><i class="fa fa-check"></i> &nbsp Hapus</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>