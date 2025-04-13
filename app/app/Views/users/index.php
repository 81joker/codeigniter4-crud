<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="d-flex justify-content-between py-2">
        <h1 class="fs-3 fw-semibold">Users</h1>
    <a href="/user/create" class="btn btn-primary mb-2">Add New User</a>
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
            <div>User Manager <?=  count($users['users']) ?></div>

        </div>
        <div class="col-md-3 position-relative">
            <form id="searchForm" action="/users" method="GET">
                <div class="input-group">
                    <input type="search" name="search" class="form-control z-1" 
                           placeholder="Search by name or email..." 
                           value="<?= esc($users['search'] ?? '') ?>"
                           id="searchInput"
                           >
                    <input type="hidden" name="sort_field" value="<?= esc($users['sortField'] ?? '') ?>">
                    <input type="hidden" name="sort_direction" value="<?= esc($users['sortDirection'] ?? '') ?>">
                    <button type="submit" class="input-group-text btn btn-primary">Search</button>
                </div>
    
                <?php 
                /*
                 if (!empty($users['search'])):  
                    esc($users['search']) 
                    */
                    ?>

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
                    <a href="?sort_field=firstname&sort_direction=<?= ($users['sortField'] === 'firstname' && $users['sortDirection'] === 'ASC') ? 'DESC' : 'ASC' ?>&search=<?= esc($users['search'] ?? '') ?>" class="text-dark">
                        First Name 
                        <?php if ($users['sortField'] === 'firstname'): ?>
                            <?= $users['sortDirection'] === 'ASC' ? '↑' : '↓' ?>
                        <?php endif; ?>
                    </a>
                </th>
                <th>
                    <a href="?sort_field=lastname&sort_direction=<?= ($users['sortField'] === 'lastname' && $users['sortDirection'] === 'ASC') ? 'DESC' : 'ASC' ?>&search=<?= esc($users['search'] ?? '') ?>" class="text-dark">
                        Last Name 
                        <?php if ($users['sortField'] === 'lastname'): ?>
                            <?= $users['sortDirection'] === 'ASC' ? '↑' : '↓' ?>
                        <?php endif; ?>
                    </a>
                </th>
                <th>
                    <a href="?sort_field=email&sort_direction=<?= ($users['sortField'] === 'email' && $users['sortDirection'] === 'ASC') ? 'DESC' : 'ASC' ?>&search=<?= esc($users['search'] ?? '') ?>" class="text-dark">
                        Email 
                        <?php if ($users['sortField'] === 'email'): ?>
                            <?= $users['sortDirection'] === 'ASC' ? '↑' : '↓' ?>
                        <?php endif; ?>
                    </a>
                </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users['users'] as $user): ?>
                <tr class="text-center">
                    <?php  if (!    empty($user['avatar'])): ?>  
                    <td class="w-25 h-25"><img src="<?= base_url(esc($user['avatar'])) ?>" class="img-thumbnail rounded-circle w-25"  alt="<?= esc($user['firstname']) ?>"></td>
                    <?php else : ?>
                    <td><img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="img-thumbnail rounded-circle w-25" alt="<?= esc($user['firstname']) ?>"></td>
                    <?php endif; ?>

                    <td><?= esc($user['firstname']) ?></td>
                    <td><?= esc($user['lastname']) ?></td>
                    <td><?= esc($user['email']) ?></td>
                    <td >
                        <div class="dropdown dropstart">
                            <i class="bi bi-three-dots-vertical" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url('user/edit/' . $user['id']) ?>">edit</a></li>
                                <li><hr class="dropdown-divider"><a class="dropdown-item" href="<?= base_url('user/delete/' . $user['id']) ?>">Deltee</a></li>
                            </ul>
                            
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pagination">
        <?= $users['pager']->links() ?>
    </div>
    </div>
</div>
<?= $this->endSection() ?>