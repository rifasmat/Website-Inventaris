<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="text-center">
    <h1>Tambah Data Pengguna</h1>
</div>

<form action="<?= base_url('admin/pengguna/create'); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label for="nama"><b>Nama</b></label>
        <input type="text" class="form-control" name="nama" id="nama" autocomplete="off" value="<?= old('nama', isset($pengguna['pengguna_nama']) ? $pengguna['pengguna_nama'] : '') ?>" placeholder="Masukan Nama Pengguna ..">
        <p class="text-danger"><?= validation_show_error('nama'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Username</b></label>
        <input type="text" class="form-control" name="username" autocomplete="off" value="<?= old('username', isset($pengguna['pengguna_username']) ? $pengguna['pengguna_username'] : '') ?>" placeholder="Masukan Username ..">
        <p style="color: red;"><?= validation_show_error('username'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Email</b></label>
        <input type="email" class="form-control" name="email" autocomplete="off" value="<?= old('email', isset($pengguna['pengguna_email']) ? $pengguna['pengguna_email'] : '') ?>" placeholder="Masukan Email..">
        <p style="color: red;"><?= validation_show_error('email'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Password</b></label>
        <input type="password" class="form-control" name="password" autocomplete="off" value="<?= old('password', isset($pengguna['pengguna_password']) ? $pengguna['pengguna_password'] : '') ?>" placeholder="Masukan Password ..">
        <p style="color: red;"><?= validation_show_error('username'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Level Pengguna</b></label>
        <select class="form-control" name="role">
            <option value="" <?= old('role', isset($pengguna['pengguna_role']) ? $pengguna['pengguna_role'] : '') == '' ? 'selected' : ''; ?>> - Pilih Level - </option>
            <option value="admin" <?= old('role', isset($pengguna['pengguna_role']) ? $pengguna['pengguna_role'] : '') == 'admin' ? 'selected' : ''; ?>> Admin </option>
            <option value="user" <?= old('role', isset($pengguna['pengguna_role']) ? $pengguna['pengguna_role'] : '') == 'user' ? 'selected' : ''; ?>> User </option>
        </select>
        <p style="color: red;"><?= validation_show_error('role'); ?></p>
    </div>
    <div class="form-group">
        <label><b>Foto</b></label>
        <input type="file" name="foto" id="uploadFoto" onchange="previewImage()">
        <img src="#" alt="Preview Foto" id="previewFoto" style="max-width: 150px; display: none;">
        <p style="color: red;"><?= validation_show_error('foto'); ?></p>
    </div>
    <div class="form-group">
        <a href="<?= base_url('admin/pengguna/list'); ?>" class="btn btn-danger btn-sm">&nbsp Kembali</a>
        <input type="submit" class="btn btn-sm btn-primary" value="Tambah Pengguna">
    </div>
</form>

<?= $this->endSection(); ?>