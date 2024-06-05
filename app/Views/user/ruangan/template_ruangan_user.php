<?= $this->extend('user/layout/template'); ?>

<?= $this->section('content') ?>

<div class="content-header mb-4">
    <h1 class="text-center mb-5">
        Data Barang <?php echo $ruangan_nama; ?>
    </h1>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <td class="table-dark">NO</td>
                <td class="table-dark">KODE RUANGAN</td>
                <td class="table-dark">NAMA BARANG</td>
                <td class="table-dark">KODE BARANG</td>
                <td class="table-dark">TAHUN PEMBELIAN</td>
                <td class="table-dark">SPESIFIKASI BARANG</td>
                <td class="table-dark">KONDISI BARANG</td>
                <td class="table-dark">RUANGAN</td>
                <td class="table-dark">JUMLAH BARANG</td>
                <td class="table-dark">KETERANGAN</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1; // Nomor urutan

            if (!empty($data_barang)) {
                foreach ($data_barang as $barang) {
            ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $barang['barang_koderuangan']; ?></td>
                        <td><?php echo $barang['barang_nama']; ?></td>
                        <td><?php echo $barang['barang_kode']; ?></td>
                        <td><?php echo $barang['barang_pembelian']; ?></td>
                        <td><?php echo $barang['barang_spesifikasi']; ?></td>
                        <td><?php echo $barang['barang_kondisi']; ?></td>
                        <td><?php echo $barang['barang_ruangan']; ?></td>
                        <td><?php echo $barang['barang_jumlah']; ?></td>
                        <td><?php echo $barang['barang_keterangan']; ?></td>
                    </tr>
            <?php
                }
            } else {
                // Tampilkan pesan jika data kosong
                echo '<tr><td colspan="9" class="text-center">Data Ruangan Kosong</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>