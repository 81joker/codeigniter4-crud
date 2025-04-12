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
        <div class="mb-3">
            <label class="form-label">Image</label>
            <!-- <input type="file" name="avatar" class="form-control"  value="<?= old('avatar') ?>"> -->
        </div>
        <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" name="firstname" class="form-control"  value="<?= old('firstname') ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" name="lastname" class="form-control" value="<?= old('lastname') ?>" >
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control"  value="<?= old('email') ?>">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
<?= $this->endSection() ?>
