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
                            $activaeUser = \App\Enums\UserStatus::Active->value;
                            ?>
                            <a href="<?php echo base_url('/user/show/' . $user['id']) ?>" class="list-group-item list-group-item-action d-flex align-items-center">
                                <div class="position-relative">
                                    <?php if ($user['avatar']): ?>

                                        <img src="<?= (esc($user['avatar'])) ?>" alt="<?= $user['firstname']; ?>" class="rounded-circle" style="width: 40px;">
                                    <?php else: ?>
                                        <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="<?= $name ?>" style="width: 40px;">
                                    <?php endif; ?>
                                    <?php if ($user['status'] == 'active' && $activaeUser): ?>
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
                            <a href="<?php echo base_url('/post/show/' . $post['id']) ?>" class="list-group-item list-group-item-action d-flex align-items-center">

                            <?php if (! empty($post['image'])): ?>
                            <?php
                                $status = $post['status'];
                                $borderClass = ($status == 'active') ? 'border-primary' : 'border-secondary';
                            ?>
                            <img src="<?= base_url(esc($post['image'])) ?>" class="img-thumbnail border border-2 <?= $borderClass ?>" style="width: 100px;"   />                        <?php else : ?>
                           <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="img-thumbnail" style="width: 100px;">
                        <?php endif; ?>

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