<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div>
    <h1>Konfirmasi Hapus Data Pengguna</h1>
</div>

<div>
    <h3>Yakin Ingin Menghapus Pengguna <?= $pengguna['pengguna_nama']; ?> Dari Data ?</h3>
</div>

<div class="box-body">
    <h5 class="text-danger">Data Yang Sudah Dihapus Tidak Dapat Dikembalikan</h5>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <td class="table-dark">NAMA PENGGUNA</td>
                <td class="table-dark">USERNAME</td>
                <td class="table-dark">EMAIL</td>
                <td class="table-dark">LEVEL PENGGUNA</td>
                <td class="table-dark">FOTO</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $pengguna['pengguna_nama'];  ?></td>
                <td><?php echo $pengguna['pengguna_username']; ?></td>
                <td><?php echo $pengguna['pengguna_email']; ?></td>
                <td><?php echo $pengguna['pengguna_role']; ?></td>
                <td>
                    <?php
                    if (!empty($pengguna['pengguna_foto'])) {
                        $fotoPath = base_url('gambar/pengguna/' . $pengguna['pengguna_foto']);
                    ?>
                        <img src="<?= $fotoPath; ?>" alt="Foto Pengguna" style="width: 100px; height: 100px">
                    <?php
                    } else {
                        echo "Tidak ada foto";
                    }
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
    <div>
        <a href="<?= base_url('admin/pengguna/list'); ?>" class="btn btn-success btn-sm"><i class="fa fa-reply"></i> &nbsp Kembali</a>
        <form method="post" action="<?= base_url('admin/pengguna/delete/' . $pengguna['pengguna_id']); ?>" style="display:inline;">
            <?= csrf_field(); ?>
            <button type="submit" class="btn btn-danger btn-sm pull-right"><i class="fa fa-check"></i> &nbsp Hapus</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>