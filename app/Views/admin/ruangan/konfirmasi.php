<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div>
    <h1>Konfirmasi Hapus Data Ruangan</h1>
</div>

<div>
    <h3>Yakin Ingin Menghapus <?= $ruangan['ruangan_nama']; ?> Dari Data ?</h3>
</div>

<div class="box-body">
    <h5 class="text-danger">Data Yang Sudah Dihapus Tidak Dapat Dikembalikan</h5>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <td class="table-dark">KODE RUANGAN</td>
                <td class="table-dark">NAMA RUANGAN</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $ruangan['ruangan_kode'];  ?></td>
                <td><?php echo $ruangan['ruangan_nama']; ?></td>
            </tr>
        </tbody>
    </table>
    <div>
        <a href="<?= base_url('admin/ruangan/list'); ?>" class="btn btn-success btn-sm"><i class="fa fa-reply"></i> &nbsp Kembali</a>
        <form method="post" action="<?= base_url('admin/ruangan/delete/' . $ruangan['ruangan_id']); ?>" style="display:inline;">
            <?= csrf_field(); ?>
            <button type="submit" class="btn btn-danger btn-sm pull-right"><i class="fa fa-check"></i> &nbsp Hapus</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>