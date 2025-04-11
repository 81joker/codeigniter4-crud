<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h1>Task Manager</h1>
    <div class="row">
        <div class="col-md-6"> <a href="/user/create" class="btn btn-primary mb-3">New Task</a></div>
        <div class="col-md-6">
        <form action="/users" method="GET">
            <div class="input-group">
                <input type="search" name="search" class="form-control" 
                       placeholder="Search by name or email..." 
                       value="<?= esc($search ?? '') ?>">
                <button type="submit" class="input-group-text btn btn-primary">Search</button>
            </div>
        </form>
        </div>
    </div>
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($search)): ?>
    <p>Showing results for: "<?= esc($search) ?>"</p>
<?php endif; ?>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
  
            <?php foreach ($users['users'] as $user): ?>
                <tr class="text-center">
                    <td><?= $user['firstname'] ?></td>
                    <td><?= $user['lastname'] ?></td>
                    <td><?= $user['email'] ?></td>
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
