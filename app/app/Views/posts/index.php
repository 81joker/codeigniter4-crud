<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="d-flex justify-content-between py-2">
        <h1 class="fs-3 fw-semibold">Posts List</h1>
    <a href="/post/create" class="btn btn-primary mb-2">Add New Post</a>
    </div>
 
    
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="table-responsive bg-white p-3 rounded-2">
    <table class="table caption-top align-middle">


    <div class="row d-flex justify-content-between pb-3">
        <div class="col-md-3">
            <div>Post Manager <?=  count($posts['posts']) ?></div>

        </div>
        <div class="col-md-3 position-relative">
            <form id="searchForm" action="/posts" method="GET">
                <div class="input-group">
                    <input type="search" name="search" class="form-control z-1" 
                           placeholder="Search by name or email..." 
                           value="<?= esc($posts['search'] ?? '') ?>"
                           id="searchInput"
                           >
                    <input type="hidden" name="sort_field" value="<?= esc($posts['sortField'] ?? '') ?>">
                    <input type="hidden" name="sort_direction" value="<?= esc($posts['sortDirection'] ?? '') ?>">
                    <button type="submit" class="input-group-text btn btn-primary">Search</button>
                </div>


                <!-- ST Spinner -->
                <div id="loadingSpinner"  class="spinner-border text-primary d-none  position-absolute top-50 ms-3 z-3" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
                <!-- En Spinner -->
            </form>
        </div>
    </div>


        <thead class="table-light">
            <tr class="text-center">
                <th>Avatar</th>
                <th>
                    <a href="?sort_field=firstname&sort_direction=<?= ($posts['sortField'] === 'firstname' && $posts['sortDirection'] === 'ASC') ? 'DESC' : 'ASC' ?>&search=<?= esc($posts['search'] ?? '') ?>" class="text-dark">
                        Name 
                        <?php if ($posts['sortField'] === 'firstname'): ?>
                            <?= $posts['sortDirection'] === 'ASC' ? '↑' : '↓' ?>
                        <?php endif; ?>
                    </a>
                </th>
                <th>
                    <a href="?sort_field=title&sort_direction=<?= ($posts['sortField'] === 'title' && $posts['sortDirection'] === 'ASC') ? 'DESC' : 'ASC' ?>&search=<?= esc($posts['search'] ?? '') ?>" class="text-dark">
                        Title 
                        <?php if ($posts['sortField'] === 'title'): ?>
                            <?= $posts['sortDirection'] === 'ASC' ? '↑' : '↓' ?>
                        <?php endif; ?>
                    </a>
                </th>
                <th>
                  Content 
                </th>
                <th>
                Last Updated At 
                </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts['posts'] as $post): ?>
                <tr class="text-center">
                    <?php  if (!    empty($post['image'])): ?>  
                    <td class="w-25 h-25"><img src="<?= base_url(esc($post['avatar'])) ?>" class="img-thumbnail" style="width: 50px;  alt="<?= esc($post['firstname']) ?>"></td>
                    <?php else : ?>
                    <td><img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="img-thumbnail" style="width: 50px; alt="<?= esc($post['firstname']) ?>"></td>
                    <?php endif; ?>
                    <?php $name = $post['firstname']. " " . $post['lastname']; ?>
                    <td><?= esc($name) ?></td>
                    <td><?= esc($post['title']) ?></td>
                    <td><?= esc(substr($post['content'], 0, 50)) ?></td>
                    <td><?= esc(substr($post['created_at'], 0, 50)) ?></td>
                    <td >
                        <div class="dropdown dropstart">
                            <i class="bi bi-three-dots-vertical" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url('post/edit/' . $post['id']) ?>">edit</a></li>
                                <li><hr class="dropdown-divider"><a class="dropdown-item" href="<?= base_url('post/delete/' . $post['id']) ?>">Deltee</a></li>
                            </ul>
                            
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <div class="pagination">
        <?= $posts['pager']->links() ?>
    </div>
</div>

<?= $this->endSection() ?>