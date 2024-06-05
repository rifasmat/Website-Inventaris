<?= $this->extend('user/layout/template'); ?>


<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success text-center" role="alert">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="text-center">
    <h1>Pengguna</h1>
</div>

<table class="table">
    <thead class="table-dark">
        <tr>
            <td class="table-dark">NO</td>
            <td class="table-dark">NAMA</td>
            <td class="table-dark">USERNAME</td>
            <td class="table-dark">EMAIL</td>
            <td class="table-dark">LEVEL PENGGUNA</td>
            <td class="table-dark">FOTO</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1; // Nomor urutan
        foreach ($data_pengguna as $pengguna) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $pengguna['pengguna_nama']; ?></td>
                <td><?= $pengguna['pengguna_username']; ?></td>
                <td><?= $pengguna['pengguna_email']; ?></td>
                <td><?= $pengguna['pengguna_role']; ?></td>
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
        <?php
        }
        ?>
    </tbody>
</table>

<!-- Pagination -->
<div class="text-center">
    <?= $pager->links() ?>
</div>

<?= $this->endSection(); ?>