<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div>
    <h1>Konfirmasi Hapus Data Barang</h1>
</div>

<div>
    <h3>Yakin Ingin Menghapus Barang <?= $barang['barang_nama']; ?> Dari Barang ?</h3>
</div>

<div class="box-body">
    <h5 class="text-danger">Data Yang Sudah Dihapus Tidak Dapat Dikembalikan</h5>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <td class="table-dark">KODE RUANGAN</td>
                <td class="table-dark">NAMA BARANG</td>
                <td class="table-dark">KODE BARANG</td>
                <td class="table-dark">SPESIFIKASI BARANG</td>
                <td class="table-dark">KONDISI BARANG</td>
                <td class="table-dark">TAHUN PEMBELIAN BARANG</td>
                <td class="table-dark">RUANGAN</td>
                <td class="table-dark">PENANGGUNG JAWAB</td>
                <td class="table-dark">JUMLAH BARANG</td>
                <td class="table-dark">KETERANGAN</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $barang['barang_koderuangan'];  ?></td>
                <td><?php echo $barang['barang_nama'];  ?></td>
                <td><?php echo $barang['barang_kode']; ?></td>
                <td><?php echo $barang['barang_spesifikasi']; ?></td>
                <td><?php echo $barang['barang_kondisi']; ?></td>
                <td><?php echo $barang['barang_pembelian']; ?></td>
                <td><?php echo $barang['barang_ruangan']; ?></td>
                <td><?php echo $barang['barang_penanggungjawab']; ?></td>
                <td><?php echo $barang['barang_jumlah']; ?></td>
                <td><?php echo $barang['barang_keterangan']; ?></td>
            </tr>
        </tbody>
    </table>
    <div>
        <a href="<?= base_url('admin/barang/list'); ?>" class="btn btn-success btn-sm"><i class="fa fa-reply"></i> &nbsp Kembali</a>
        <form method="post" action="<?= base_url('admin/barang/delete/' . $barang['barang_id']); ?>" style="display:inline;">
            <?= csrf_field(); ?>
            <button type="submit" class="btn btn-danger btn-sm pull-right"><i class="fa fa-check"></i> &nbsp Hapus</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>