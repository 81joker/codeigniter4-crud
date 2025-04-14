<?= $this->extend('layouts/app') ?>

<?= $this->section('content')?>

<div class="container mt-5">
    <h1 class="fs-3 fw-semibold">Edit Post</h1>

    <form method="post" action="/posts/update/<?= $post['id'] ?>" enctype="multipart/form-data"> 
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="<?= $post['title'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content" class="form-control" rows="4" required><?= $post['content'] ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary px-4">Update</button>
    </form>
</div>
<?= $this->endSection() ?>
