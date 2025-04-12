<?= $this->extend('layouts/app') ?>

<?= $this->section('content')?>

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
    <h1>Create New Post</h1>
    <form method="post" action="/users/store" enctype="multipart/form-data">
    <!-- Display general errors -->
    <?php if (session('errors')): ?>
        <div class="alert alert-danger">
            <?php foreach (session('errors') as $error): ?>
                <?= $error ?><br>
            <?php endforeach ?>
        </div>
    <?php endif ?>

    <!-- Avatar Field with Error Display -->
    <div class="mb-3">
        <label class="form-label">Avatar Image (required)</label>
        <input type="file" name="avatar" class="form-control <?= session('errors.avatar') ? 'is-invalid' : '' ?>">
        <?php if (session('errors.avatar')): ?>
            <div class="invalid-feedback">
                <?= session('errors.avatar') ?>
            </div>
        <?php endif ?>
        <small class="text-muted">Max 1MB, JPG/PNG/GIF only</small>
    </div>

    <div class="mb-3">
        <label class="form-label">First Name</label>
        <input type="text" name="firstname" class="form-control <?= session('errors.firstname') ? 'is-invalid' : '' ?>" 
               value="<?= old('firstname') ?>">
        <?php if (session('errors.firstname')): ?>
            <div class="invalid-feedback">
                <?= session('errors.firstname') ?>
            </div>
        <?php endif ?>
    </div>

    <div class="mb-3">
        <label class="form-label">Last Name</label>
        <input type="text" name="lastname" class="form-control <?= session('errors.lastname') ? 'is-invalid' : '' ?>" 
               value="<?= old('lastname') ?>">
        <?php if (session('errors.lastname')): ?>
            <div class="invalid-feedback">
                <?= session('errors.lastname') ?>
            </div>
        <?php endif ?>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>" 
               value="<?= old('email') ?>">
        <?php if (session('errors.email')): ?>
            <div class="invalid-feedback">
                <?= session('errors.email') ?>
            </div>
        <?php endif ?>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>
<?= $this->endSection() ?>
