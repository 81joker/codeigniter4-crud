<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?php if (session()->has('errors')) : ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach (session('errors') as $error) : ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>
<div class="container mt-5">
    <h1 class="fs-3 fw-semibold">Create New User</h1>

    <form method="post" action="/users/store" enctype="multipart/form-data">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

        <div class="mb-3">
            <label class="form-label">Avatar Image (required)</label>
            <input type="file" name="avatar" class="form-control <?= session('errors.avatar') ? 'is-invalid' : '' ?>">
            <?php if (session('errors.avatar')): ?>
                <div class="invalid-feedback">
                    <?= session('errors.avatar') ?>
                </div>
            <?php endif ?>
        </div>
        <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" name="firstname" class="form-control" value="<?= old('firstname') ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" name="lastname" class="form-control" value="<?= old('lastname') ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?= old('email') ?>">
        </div>
        <div class="mb-3 d-flex">
            <div class="form-check">
                <label class="form-check-label" for="flexCheckChecked">
                    Chooese your Status
                    <input class="form-check-input" type="checkbox" name="status" value="" id="flexCheckChecked" checked>
                </label>
            </div>
        </div>
        <button type="submit px-4" class="btn btn-primary">Save</button>
    </form>
</div>
<?= $this->endSection() ?>