<?= $this->extend('layouts/app') ?>

<?= $this->section('content')?>
<div class="container mt-5">
    <h1 class="fs-3 fw-semibold">Create Post</h1>


    <form method="post" action="/post/store" enctype="multipart/form-data"> 
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

        <div class="mb-3">
            <label class="form-label">Choose Customer</label>
            <select name="user_id" class="form-select">
                <option value="">Select Customer</option>
                <?php if (isset($users) && is_array($users)): ?>
                <?php foreach ($users as $user): ?>
                    <?php $name = $user['firstname'] . ' ' . $user['lastname']; ?>
                    <option value="<?= $user['id'] ?>"><?= $name; ?></option>
                <?php endforeach; ?>
            </select>   
            <?php endif; ?>

        </div>
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control <?= session('errors.image') ? 'is-invalid' : '' ?>">
            <?php if (session('errors.image')): ?>
                <div class="invalid-feedback">
                    <?= session('errors.image') ?>
                </div>
            <?php endif ?>
        </div>

        <button type="submit" class="btn btn-primary px-4">Update</button>
    </form>
</div>
<?= $this->endSection() ?>
