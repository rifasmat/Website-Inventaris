<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div>
    <h1>Konfirmasi Hapus Data Suplier</h1>
</div>

<div>
    <h3>Yakin Ingin Menghapus Suplier <?= $suplier['suplier_nama']; ?> Dari Data ?</h3>
</div>

<div class="box-body">
    <h5 class="text-danger">Data Yang Sudah Dihapus Tidak Dapat Dikembalikan</h5>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <td class="table-dark">NAMA SUPLIER</td>
                <td class="table-dark">ALAMAT SUPLIER</td>
                <td class="table-dark">TELEPON SUPLIER</td>
                <td class="table-dark">KETERANGAN</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $suplier['suplier_nama'];  ?></td>
                <td><?php echo $suplier['suplier_alamat']; ?></td>
                <td><?php echo $suplier['suplier_telepon']; ?></td>
                <td><?php echo $suplier['suplier_keterangan']; ?></td>
            </tr>
        </tbody>
    </table>
    <div>
        <a href="<?= base_url('admin/suplier/list'); ?>" class="btn btn-success btn-sm"><i class="fa fa-reply"></i> &nbsp Kembali</a>
        <form method="post" action="<?= base_url('admin/suplier/delete/' . $suplier['suplier_id']); ?>" style="display:inline;">
            <?= csrf_field(); ?>
            <button type="submit" class="btn btn-danger btn-sm pull-right"><i class="fa fa-check"></i> &nbsp Hapus</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>