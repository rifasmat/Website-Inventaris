<?= $this->extend('user/layout/template'); ?>

<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success text-center" role="alert">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger text-center" role="alert">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<div class="text-center">
    <h1>Ruangan</h1>
</div>

<section id="content" class="p-4 p-md-10 pt-5">
    <div class="row">
        <?php foreach ($data_ruangan as $ruangan) : ?>
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-secondary bg-gradient">
                    <div class="inner text-light">
                        <div>
                            <p>Kode Ruangan : <?= esc($ruangan['ruangan_kode']); ?></p>
                            <h4><b>Ruangan</b></h4>
                        </div>
                        <h2><?= esc($ruangan['ruangan_nama']); ?></h2>
                    </div>
                    <div class="icon">
                        <i class="fa fa-th"></i>
                    </div>
                    <?php
                    $file_name = str_replace(' ', '_', strtolower($ruangan['ruangan_nama']));
                    ?>
                    <div class="small-box-footer">
                        <a href="<?= esc($file_name); ?>" class="btn btn-secondary btn-sm text-light">
                            <i class="fa fa-arrow-circle-right"></i> Lihat Ruangan
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>



<!-- Pagination -->
<div class="text-center">
    <?= $pager->links() ?>
</div>

<?= $this->endSection(); ?>