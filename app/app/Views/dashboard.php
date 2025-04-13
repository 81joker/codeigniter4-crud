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
                    <h1 class="card-text">150</h1>
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
                    ?>
 <?php
                            ?>
                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                        <div class="position-relative" >
                            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt=""  style="width: 40px;">
                            <?php if (\App\Enums\UserStatus::Active->value == $user['state']): ?>
                           
                            <span class="position-absolute  start-100 translate-middle p-1 bg-success border border-light rounded-circle" style="top: 10%;">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                            <?php endif; ?>
                            <!-- <span class="position-absolute  start-100 translate-middle p-1 bg-danger border border-light rounded-circle" style="top: 10%;">
                                <span class="visually-hidden">New alerts</span>
                            </span> -->
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

        <div class="col-md-6 mb-4">
            <div class="card bg-white shadow rounded-2 ">
                <div class="card-body">
                    <h5 class="card-title">Latest Posts</h5>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                    <li class="list-group-item">A fourth item</li>
                    <li class="list-group-item">And a fifth one</li>
                    </ul>
                </div>
            </div>
        </div>

  </div>
</div>
<?= $this->endSection() ?>