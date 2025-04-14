<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1 class="fs-3 fw-semibold">Dashboard</h1>


    <div class="row pt-2">
        <div class="col-md-4 mb-4">
            <div class="card bg-white shadow rounded-2 d-flex align-items-center justify-content-center text-center">
                <div class="card-body">
                    <h5 class="card-title">Active Users</h5>
                    <h1 class="card-text"><?= $activeUsers ?></h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card bg-white shadow rounded-2 d-flex align-items-center justify-content-center text-center">
                <div class="card-body">
                    <h5 class="card-title">Latest Posts</h5>
                    <h1 class="card-text"><?= $activePosts; ?></h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card bg-white shadow rounded-2 d-flex align-items-center justify-content-center text-center">
                <div class="card-body">
                    <h5 class="card-title">Latest Orders</h5>
                    <h1 class="card-text">150</h1>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card bg-white shadow rounded-2 ">
                <div class="card-body">
                    <h5 class="card-title">Latest Users</h5>
                    <ul class="list-group list-group-flush">
                    <?php foreach ($latestUsers as $user): ?>
                    <?php
                    $name = $user['firstname'] . ' ' . $user['lastname'];
                    $activae = \App\Enums\UserStatus::Active->value;
                    // base_url(esc($user['avatar']))
                    ?>
                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                        <div class="position-relative" >
                            <?php if($user['avatar']): ?>
                        
                            <img src="<?= (esc($user['avatar'])) ?>"  alt="<?= $user['firstname']; ?>" class="rounded-circle"  style="width: 40px;">
                            <?php else: ?>
                            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="<?= $name ?>"  style="width: 40px;">
                            <?php endif; ?>
                            <?php if ($user['state'] == 1 && $activae): ?>
                            <span class="position-absolute  start-100 translate-middle p-1 bg-success border border-light rounded-circle" style="top: 10%;">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                            <?php else: ?>
                                <span class="position-absolute  start-100 translate-middle p-1 bg-secondary border border-light rounded-circle" style="top: 10%;">
                                    <span class="visually-hidden">New alerts</span>
                                </span>
                            <?php endif; ?>
                        </div>  
                    <div class="ps-4">
                        <span class="fw-semibold d-flex"><?= $name ?></span>
                        <span class="text-muted"><?= $user['email'] ?></span>
                        </div>
                    </a>
                    <?php endforeach; ?>

                    </ul>
                </div>
            </div>
        </div>


        <!-- Latest Posts -->
        <div class="col-md-6 mb-4">
            <div class="card bg-white shadow rounded-2 ">
                <div class="card-body">
                    <h5 class="card-title">Latest Users</h5>
                    <ul class="list-group list-group-flush">

                    <?php foreach ($latestPosts as $post): ?>                    
                
                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                        
                    <div class="ps-4">
                        <span class="fw-semibold d-flex"><?= $post['title'] ?></span>
                        <span class="text-muted"><?= $post['content'] ?></span>
                        </div>
                    </a>
                    <?php endforeach; ?>

                    </ul>
                </div>
            </div>
        </div>

   

  </div>
</div>
<?= $this->endSection() ?>