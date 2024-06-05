<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div>
    <h1>Konfirmasi Hapus Data Fasilitas</h1>
</div>

<div>
    <h3>Yakin Ingin Menghapus Data Fasilitas ? </h3>
</div>

<div class="box-body">
    <h5 class="text-danger">Data Yang Sudah Dihapus Tidak Dapat Dikembalikan</h5>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <td class="table-dark">FOTO FASILITAS</td>
                <td class="table-dark">KETERANGAN</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <?php
                    if (!empty($fasilitas['fasilitas_foto'])) {
                        $fotoPath = base_url('gambar/fasilitas/' . $fasilitas['fasilitas_foto']);
                    ?>
                        <img src="<?= $fotoPath; ?>" alt="Foto Fasilitas" class="img-fluid landscape-image" style="max-width: 300px; max-height: 300px">
                    <?php
                    } else {
                        echo "Tidak ada foto";
                    }
                    ?>
                </td>
                <td><?php echo $fasilitas['fasilitas_keterangan']; ?></td>
            </tr>
        </tbody>
    </table>
    <div>
        <a href="<?= base_url('admin/fasilitas/list'); ?>" class="btn btn-success btn-sm"><i class="fa fa-reply"></i> &nbsp Kembali</a>
        <form method="post" action="<?= base_url('admin/fasilitas/delete/' . $fasilitas['fasilitas_id']); ?>" style="display:inline;">
            <?= csrf_field(); ?>
            <button type="submit" class="btn btn-danger btn-sm pull-right"><i class="fa fa-check"></i> &nbsp Hapus</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>