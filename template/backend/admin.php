<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/img/favicon/favicon-32x32.png" type="image/x-icon">
    <title>My_Lib</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/96e9023ea2.js" crossorigin="anonymous"></script>

    <!-- Style -->
    <link rel="stylesheet" href="../../assets/css/styleAdmin.css" />

</head>

<body>
    <div class="container">
        <!-- Top Nav -->
        <nav class="navbar navbar-expand-lg py-3 fixed-top px-4" style="background-color: #f4d35e;">
            <div class="d-flex ms-auto">
                <button class="navbar-toggler mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="search-form d-flex w-50 ms-auto mt-1 mb-0" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn border rounded-pill" type="submit">Search</button>
                </form>
                <ul class="navbar-nav flex-column align-items-end ms-auto mb-2 mb-lg-0 mt-2">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hello Admin
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="#">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /Top Nav -->
        <div class="row">
            <!-- Sidebar -->
            <div class="col-1">
                <div class="col sidebar" id="sidebar">
                    <a class="navbar-brand ms-3" href="../../index.php"><i class="fa-solid fa-book-open-reader mt-4 me-2" style="color: #e56815;"></i>My_Lib</a>
                    <ul class="nav flex-column vertical-nav">
                        <li class="nav-item">
                            <a class="nav-link active mt-5" aria-current="page" href="#"><i class="fa-solid fa-house fa-sm me-2" style="color: #e56815;"></i>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-boxes-stacked fa-sm me-2" style="color: #e56815;"></i>Artikeln</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-user fa-sm me-2" style="color: #e56815;"></i>Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-screwdriver-wrench fa-sm me-2" style="color: #e56815;"></i>Verwaltung</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-shop fa-sm me-2" style="color: #e56815;"></i>Bestellungen</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- /Sidebar -->
        </div>



        <!-- Footer -->
        <div class="footer container-fluid mt-5 py-2 fixed-bottom" style="background-color: #0d3b66;">
            <div class="row">
                <div class="col-lg-4 offset-lg-4" style="color: #F4D35E;">
                    &copy; Copyright MyLib <?php echo date('Y'); ?> - All Rights Reserved
                </div>
            </div>
        </div>
        <!-- /Footer -->
    </div>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>