<?php include('../config.php'); ?>

<!doctype html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="./assets/img/favicon/favicon-32x32.png" type="image/x-icon">
    <title>Realitätspause Admin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/96e9023ea2.js" crossorigin="anonymous"></script>

    <!-- Style -->
    <link rel="stylesheet" href="../assets/css/styleAdmin.css">

</head>

<body>
    <div class="container-fluid">
        <!-- Top nav -->
        <div class="container-fluid">
            <nav class="navbar fixed-top">
                <a class="navbar-brand ms-4" href="../index.php"><i class="fa-solid fa-screwdriver-wrench" style="color: #e56815;"> RP Dashboard</i></a>
                <form class="d-flex ms-auto w-50" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline" type="submit">Suchen</button>
                </form>
                <div class="btn-group dropstart ms-auto">
                    <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropstart</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                    <button type="button" class="btn">
                        Hallo, Admin
                    </button>
                </div>
            </nav>
        </div>
    </div>
    <!-- /Top nav -->

    <!-- Sidebar -->
    <div class="container-fluid">
        <div class="row">
            <div class="col side justify-content-center">
                <ul class="nav flex-column ms-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Büchern</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Kategorien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kunden</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Verlag</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Auf reise</a>
                    </li>
                </ul>
            </div>


            <!-- /Sidebar -->

            <!-- Main -->
            <div class="container d-flex float-end">

                <div class="row">
                <div class="col">
                    <h1 class="text-center">
                        Pannello di amministrazione
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="material-icons">dashboard</i> Dashboard
                        </li>
                    </ol>
                </div>
            </div>
            <?php include(BACK_END . DS . 'prodeinfuegen.php') ?>

            <!-- /Main -->

        </div>
    </div>
    </div>

    <!-- Footer -->

    <div class="container-fluid mt-5 py-5 fixed-bottom" style="background-color: #0d3b66; height: 60px;">
        <div class="row">
            <div class="col-lg-4 offset-lg-4" style="color: #F4D35E;">
                &copy; Copyright Realitätspause <?php echo date('Y'); ?> - All Rights Reserved
            </div>
        </div>
    </div>

    <!-- /Footer -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>