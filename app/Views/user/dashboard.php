<?= $this->extend('user/layout/template'); ?>


<?= $this->section('content'); ?>

<div>
    <h1>
        Dashboard
    </h1>
</div>

<section id="content" class="p-4 p-md-10 pt-5">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-secondary bg-gradient">
            <div class="inner text-light">
                <h3><?= $totalSemuaBarang; ?></h3>
                <p>Total Semua Barang</p>
            </div>
            <div class="icon">
                <i class="fa fa-calculator"></i>
            </div>
            <a href="<?= base_url('user/dashboard'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-secondary bg-gradient">
            <div class="inner text-light">
                <h3><?= $totalGudangBarang; ?></h3>
                <p>Jumlah Barang Di Gudang</p>
            </div>
            <div class="icon">
                <i class="fas fa-square"></i>
            </div>
            <a href="<?= base_url('user/gudang/list'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-secondary bg-gradient">
            <div class="inner text-light">
                <h3><?= $totalBarangRuangan; ?></h3>
                <p>Jumlah Barang Di Ruangan</p>
            </div>
            <div class="icon">
                <i class="fa fa-th"></i>
            </div>
            <a href="<?= base_url('user/barang/list'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-secondary bg-gradient">
            <div class="inner text-light">
                <h3><?= $totalRuangan; ?></h3>
                <p>Jumlah Ruangan</p>
            </div>
            <div class="icon">
                <i class="fa fa-th"></i>
            </div>
            <a href="<?= base_url('user/ruangan/list'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</section>

<section id="content" class="p-4 p-md-10 pt-5">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-secondary bg-gradient">
            <div class="inner text-light">
                <h3><?= $totalSuplier; ?></h3>
                <p>Suplier</p>
            </div>
            <div class="icon">
                <i class="fa fa-truck"></i>
            </div>
            <a href="<?= base_url('user/suplier/list'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-secondary bg-gradient">
            <div class="inner text-light">
                <h3><?= $totalBarangMasuk; ?></h3>
                <p>Total Barang Masuk</p>
            </div>
            <div class="icon">
                <i class="mdi mdi-cart"></i>
            </div>
            <a href="<?= base_url('user/barang-masuk/list'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-secondary bg-gradient">
            <div class="inner text-light">
                <h3><?= $totalBarangKeluar; ?></h3>
                <p>Total Barang Keluar</p>
            </div>
            <div class="icon">
                <i class="mdi mdi-cart-off"></i>
            </div>
            <a href="<?= base_url('user/barang-keluar/list'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</section>



<?= $this->endSection(); ?>