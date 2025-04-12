<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1 class="fs-3 fw-semibold">Dashboard</h1>


    <div class="row pt-2">
        <div class="col-md-4 mb-4">
            <div class="card bg-white shadow rounded-2 d-flex align-items-center justify-content-center text-center">
                <div class="card-body">
                    <h5 class="card-title">Latest Users</h5>
                    <h1 class="card-text">150</h1>
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

  </div>
</div>
<?= $this->endSection() ?>