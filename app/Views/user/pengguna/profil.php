<?= $this->extend('user/layout/template'); ?>

<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success text-center" role="alert">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="text-center">
    <h1>Profil Pengguna</h1>
</div>

<form action="<?= base_url('user/pengguna/updateProfil'); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label><b>Nama</b></label>
        <input type="text" class="form-control" name="nama" autocomplete="off" value="<?= old('nama', $pengguna['pengguna_nama']) ?>">
        <p class="text-danger"><?= validation_show_error('nama'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Username</b></label>
        <input type="text" class="form-control" name="username" autocomplete="off" value="<?= old('username', $pengguna['pengguna_username']) ?>">
        <p class="text-danger"><?= validation_show_error('username'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Email</b></label>
        <input type="email" class="form-control" name="email" autocomplete="off" value="<?= old('email', $pengguna['pengguna_email']) ?>">
        <p class="text-danger"><?= validation_show_error('email'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Password</b></label>
        <input type="password" class="form-control" name="password" autocomplete="off">
        <p class="text-danger">Kosongkan Jika Tidak Ingin Mengganti Password</p>
    </div>
    <div class="form-group">
        <label><b>Level Pengguna</b></label>
        <select class="form-control" name="role">
            <option value="user" <?= old('role', $pengguna['pengguna_role']) == 'user' ? 'selected' : ''; ?>> User </option>
        </select>
        <p class="text-danger"><?= validation_show_error('role'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Foto</b></label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="foto" id="uploadFoto" onchange="previewImage()">
            <label for="uploadFoto"></label>
        </div>
        <img src="<?= base_url('gambar/pengguna/' . $pengguna['pengguna_foto']); ?>" alt="Foto Pengguna" id="previewFoto" style="max-width: 150px; margin-top: 10px;">
    </div>
    <div class="form-group">
        <a href="<?= base_url('admin/pengguna/list'); ?>" class="btn btn-sm btn-danger">Kembali</a>
        <input type="submit" class="btn btn-sm btn-primary" value="Edit">
    </div>
</form>

<?= $this->endSection(); ?>