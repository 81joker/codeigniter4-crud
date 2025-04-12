<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- STYLES -->


</head>
<body>
    <?php  echo view('layouts/nav'); ?>
<div class="content">
        <?= $this->renderSection('content') ?>
    </div>

    <footer>
        <p>Footer &copy; <?= date('Y') ?></p>
    </footer>
<!-- HEADER: MENU + HEROE SECTION -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
<script>
    document.getElementById('searchForm').addEventListener('submit', function () {
        document.getElementById('loadingSpinner').classList.remove('d-none');
    });
</script>
</body>
</html>
