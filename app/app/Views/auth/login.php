<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<?php 
helper('html');

?>
    <div class="container mt-5" style="max-width: 500px;">
        <h2 class="mb-4">Login</h2>
        
        <?= view('partials/alerts') ?>
        
        <form action="<?= route_to('login') ?>" method="post">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

        
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        
        <div class="mt-3">
            Don't have an account? <a href="<?= route_to('register') ?>">Register here</a>
        </div>
    </div>

<?= $this->endSection() ?>