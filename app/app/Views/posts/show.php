<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
  <h1 class="fs-3 fw-semibold">View Post</h1>
  <div class="row">

    <div class="col-lg-4">
      <div class="card mb-4">
        <div class="card-body text-center">
          <?php if (!empty($post['avatar'])): ?>
            <img src="<?= base_url(esc($post['avatar'])) ?>" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
          <?php else : ?>
            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
          <?php endif; ?>
          <?php $name = $post['firstname'] . ' ' . $post['lastname']; ?>
          <h5 class="my-3">Ich bin <?= $name ?> </h5>
          <p class="text-muted mb-1">Full Stack Developer</p>
          <p class="text-muted mb-4">Vienna, CA</p>
          <div class="d-flex justify-content-center mb-2">
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-8">
      <div class="card mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-6 d-flex justify-content-end pe-3 border-end">
               <?php if (!empty($post['image'])): ?>
                 <img src="<?= base_url(esc($post['image'])) ?>" alt="image"
                   class="rounded mx-auto d-block img-thumbnail img-fluid w-75" >
                 <?php else : ?>
                 <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="avatar"
                 class="rounded mx-auto d-block img-thumbnail img-fluid w-75" >
                <?php endif; ?>
            </div>
            <div class="col-6 ps-3 text-center">
            <h3 class="mb-3 text-capitalize"><?= esc($post['title']) ?></h3>
              <p><?= esc($post['content']) ?></p>
              <a href="<?= base_url('post/edit/' . $post['id']) ?>" class="btn btn-outline-primary mt-3 px-4">Edit Post</a>
            </div>
          </div>

        </div>
      </div>

    </div>

  </div>
  <?= $this->endSection() ?>