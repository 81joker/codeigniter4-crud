<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h1>Task Manager</h1>
    <div class="row">
        <div class="col-md-6"><a href="/user/create" class="btn btn-primary mb-3">New Task</a></div>
        <div class="col-md-6">
            <form id="searchForm" action="/users" method="GET" class="position-relative">
                <div class="input-group">
                    <input type="search" name="search" class="form-control" 
                           placeholder="Search by name or email..." 
                           value="<?= esc($users['search'] ?? '') ?>">
                    <input type="hidden" name="sort_field" value="<?= esc($users['sortField'] ?? '') ?>">
                    <input type="hidden" name="sort_direction" value="<?= esc($users['sortDirection'] ?? '') ?>">
                    <button type="submit" class="input-group-text btn btn-primary">Search</button>
                </div>

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
    
    <?php if (!empty($users['search'])): ?>
        <p>Showing results for: "<?= esc($users['search']) ?>"</p>
    <?php endif; ?>
    
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th>Avatar</th>
                <th>
                    <a href="?sort_field=firstname&sort_direction=<?= ($users['sortField'] === 'firstname' && $users['sortDirection'] === 'ASC') ? 'DESC' : 'ASC' ?>&search=<?= esc($users['search'] ?? '') ?>">
                        First Name 
                        <?php if ($users['sortField'] === 'firstname'): ?>
                            <?= $users['sortDirection'] === 'ASC' ? '↑' : '↓' ?>
                        <?php endif; ?>
                    </a>
                </th>
                <th>
                    <a href="?sort_field=lastname&sort_direction=<?= ($users['sortField'] === 'lastname' && $users['sortDirection'] === 'ASC') ? 'DESC' : 'ASC' ?>&search=<?= esc($users['search'] ?? '') ?>">
                        Last Name 
                        <?php if ($users['sortField'] === 'lastname'): ?>
                            <?= $users['sortDirection'] === 'ASC' ? '↑' : '↓' ?>
                        <?php endif; ?>
                    </a>
                </th>
                <th>
                    <a href="?sort_field=email&sort_direction=<?= ($users['sortField'] === 'email' && $users['sortDirection'] === 'ASC') ? 'DESC' : 'ASC' ?>&search=<?= esc($users['search'] ?? '') ?>">
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
                    <td><img src="<?= esc($user['avatar']) ?>" class="img-thumbnail rounded-circle w-25" alt="<?= esc($user['firstname']) ?>"></td>
                    <?php else : ?>
                    <!-- <td><img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="img-thumbnail rounded-circle w-25" alt="<?= esc($user['firstname']) ?>"></td> -->
                    <?php endif; ?>

                    <td><?= esc($user['firstname']) ?></td>
                    <td><?= esc($user['lastname']) ?></td>
                    <td><?= esc($user['email']) ?></td>
                    <td class="d-flex justify-content-around">
                        <a href="/user/edit/<?= $user['id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="/user/delete/<?= $user['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <div class="pagination">
        <?= $users['pager']->links() ?>
    </div>
</div>

<?= $this->endSection() ?>