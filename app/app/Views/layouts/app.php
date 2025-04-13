<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
    <!-- STYLES -->


</head>
<body>
    <?php  echo view(name: 'layouts/sidebar'); ?>
    
<!-- Content Menu -->
    <!-- Main Content -->
    <div class="content">
            <nav class="navbar navbar-light bg-white shadow mb-3">
            <!-- <nav class="navbar navbar-expand-lg navbar-light bg-white shadow mb-2"> -->
                <div class="container-fluid">
                    <button class="btn btn-link p-0 m-0" id="sidebarToggle" >
                        <i class="bi bi-list text-black" style="font-size: 1.5rem;"></i>
                    </button>
                    <div>
                    <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" width="30" height="30" class="rounded-circle me-2">
                     Admin
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
                    </div>
                    <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="bi bi-bell"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="bi bi-envelope"></i></a>
                            </li>
                        </ul>
                        
                    </div> -->
                </div>
            </nav>
            
            <div class="container-fluid">
                <div class="alert alert-primary" role="alert">
                    Welcome to your dashboard! Click the toggle button to show/hide the sidebar.
                </div>
           
                
                <main>
                <?=  $this->renderSection('content');?>

                </main>


            </div>
        </div>
    </div>
<!--/ Content Menu -->






    <script>
// Show loading spinner when form is submitted
document.getElementById('searchInput').addEventListener('input', function () {
        document.getElementById('loadingSpinner').classList.remove('d-none');
    });
    </script>
 

    <!-- HEADER: MENU + HEROE SECTION -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
</body>
</html>
