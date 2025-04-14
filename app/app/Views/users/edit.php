<?= $this->extend('layouts/app') ?>

<?= $this->section('content')?>

<div class="container mt-5">
    <h1 class="fs-3 fw-semibold">Edit User</h1>

    <form method="post" action="/users/update/<?= $user['id'] ?>" enctype="multipart/form-data"> 
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

        <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" name="firstname" class="form-control" value="<?= $user['firstname'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" name="lastname" class="form-control" value="<?= $user['lastname'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Avatar</label>
            <input type="file" name="avatar" class="form-control"  value="<?= $user['avatar'] ?>" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary px-4">Update</button>
    </form>
</div>
<?= $this->endSection() ?>
