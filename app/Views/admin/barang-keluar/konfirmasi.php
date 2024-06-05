<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div>
    <h1>Konfirmasi Hapus Data Barang Keluar</h1>
</div>

<div>
    <h3>Yakin Ingin Menghapus Barang <?= $barang['barangkeluar_nama']; ?> Dari Barang Keluar ?</h3>
</div>

<div class="box-body">
    <h5 class="text-danger">Data Yang Sudah Dihapus Tidak Dapat Dikembalikan</h5>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <td class="table-dark">NAMA BARANG</td>
                <td class="table-dark">KODE BARANG</td>
                <td class="table-dark">RUANGAN</td>
                <td class="table-dark">JUMLAH</td>
                <td class="table-dark">TANGGAL KELUAR</td>
                <td class="table-dark">KETERANGAN</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $barang['barangkeluar_nama'];  ?></td>
                <td><?php echo $barang['barangkeluar_kode'];  ?></td>
                <td><?php echo $barang['barangkeluar_ruangan'];  ?></td>
                <td><?php echo $barang['barangkeluar_jumlah'];  ?></td>
                <td><?php echo $barang['barangkeluar_tanggalkeluar'];  ?></td>
                <td><?php echo $barang['barangkeluar_keterangan'];  ?></td>
            </tr>
        </tbody>
    </table>
    <div>
        <a href="<?= base_url('admin/barang-keluar/list'); ?>" class="btn btn-success btn-sm"><i class="fa fa-reply"></i> &nbsp Kembali</a>
        <form method="post" action="<?= base_url('admin/barang-keluar/delete/' . $barang['barangkeluar_id']); ?>" style="display:inline;">
            <?= csrf_field(); ?>
            <button type="submit" class="btn btn-danger btn-sm pull-right"><i class="fa fa-check"></i> &nbsp Hapus</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>