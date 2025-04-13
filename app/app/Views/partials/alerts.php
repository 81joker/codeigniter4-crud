<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="flash-message">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (session()->has('error')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="flash-message">
        <?= session('error') ?>
    </div>
<?php endif ?>