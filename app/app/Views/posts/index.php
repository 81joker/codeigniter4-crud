<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h1>Posts List <?=  count($posts['posts']) ?></h1>
    <div class="row">
        <div class="col-md-6"><a href="/post/create" class="btn btn-primary mb-3">New Post</a></div>
        <div class="col-md-6">
            <form id="searchForm" action="/posts" method="GET" class="position-relative">
                <div class="input-group">
                    <input type="search" name="search" class="form-control" 
                           placeholder="Search by name or email..." 
                           value="<?= esc($posts['search'] ?? '') ?>">
                    <input type="hidden" name="sort_field" value="<?= esc($posts['sortField'] ?? '') ?>">
                    <input type="hidden" name="sort_direction" value="<?= esc($posts['sortDirection'] ?? '') ?>">
                    <button type="submit" class="input-group-text btn btn-primary">Search</button>
                </div>

                <?php 
                // TODO: display message in the post exists 
                if (in_array($posts['search'], $posts['posts'])){
                     var_dump("Entra");
                } else {
                    var_dump("No entra");
                }

                ?>
    
                <?php if (!empty($posts['search'])): ?>
                    <p>Showing results for: "<?= esc($posts['search']) ?>"</p>
                <?php endif; ?>

                <!-- ST Spinner -->
                <div id="loadingSpinner"  class="spinner-border text-primary  position-absolute top-0 ms-3 d-none" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
                <!-- En Spinner -->
            </form>
        </div>
    </div>
    
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th>Avatar</th>
                <th>
                    <a href="?sort_field=firstname&sort_direction=<?= ($posts['sortField'] === 'firstname' && $posts['sortDirection'] === 'ASC') ? 'DESC' : 'ASC' ?>&search=<?= esc($posts['search'] ?? '') ?>">
                        Full Name 
                        <?php if ($posts['sortField'] === 'firstname'): ?>
                            <?= $posts['sortDirection'] === 'ASC' ? '↑' : '↓' ?>
                        <?php endif; ?>
                    </a>
                </th>
                <th>
                   Description
                </th>
                <th>
                    <a href="?sort_field=email&sort_direction=<?= ($posts['sortField'] === 'email' && $posts['sortDirection'] === 'ASC') ? 'DESC' : 'ASC' ?>&search=<?= esc($posts['search'] ?? '') ?>">
                        Email 
                        <?php if ($posts['sortField'] === 'email'): ?>
                            <?= $posts['sortDirection'] === 'ASC' ? '↑' : '↓' ?>
                        <?php endif; ?>
                    </a>
                </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts['posts'] as $post): ?>
                <tr class="text-center">
                    <?php  if (!    empty($post['avatar'])): ?>  
                    <td><img src="<?= esc($post['avatar']) ?>" class="img-thumbnail rounded-circle w-25" alt="<?= esc($post['firstname']) ?>"></td>
                    <?php else : ?>
                    <td class="w-25"><img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="img-thumbnail rounded-circle w-25" alt="<?= esc($post['firstname']) ?>"></td>
                    <?php endif; ?>

                    <td><?= esc($post['firstname']) ?></td>
                    <td><?= esc($post['title']) ?></td>
                    <td><?= esc($post['content']) ?></td>
                    <td class="d-flex justify-content-around">
                        <a href="/post/edit/<?= $post['id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="/post/delete/<?= $post['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <div class="pagination">
        <?= $posts['pager']->links() ?>
    </div>
</div>

<?= $this->endSection() ?>