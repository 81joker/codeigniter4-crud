<!DOCTYPE html>
<html>
<head>
    <title>Users Lists</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Task Manager</h1>
    <a href="/user/create" class="btn btn-primary mb-3">New Task</a>
    
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>    
    <?php endif; ?>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['firstname'] ?></td>
                <td><?= $user['lastname'] ?></td>
                <td>
                    <a href="/user/edit/<?= $user['id'] ?>" class="btn btn-warning">Edit</a>
                    <a href="/user/delete/<?= $user['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>