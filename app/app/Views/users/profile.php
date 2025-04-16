<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<div class="container py-4">
    <div class="card shadow-sm p-4">
        <div class="row align-items-center">
            <div class="col-md-3 text-center">
                <img src="<?= base_url($user['avatar'] ?? 'https://github.com/mdo.png') ?>" 
                     alt="User Avatar" 
                     class="rounded-circle img-fluid" 
                     width="150">
            </div>
            <div class="col-md-9">
                <h3><?= esc($user['firstname']) ?></h3>
                <p class="text-muted mb-1"><strong>Email:</strong> <?= esc($user['email']) ?></p>
                <a href="#" class="btn btn-outline-primary mt-3">Edit Profile</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
