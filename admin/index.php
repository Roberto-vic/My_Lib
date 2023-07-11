<?php include('../config.php'); ?>

<!doctype html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/img/favicon/favicon-32x32.png" type="image/x-icon">
    <title>Realitätspause Admin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/96e9023ea2.js" crossorigin="anonymous"></script>

    <!-- Style -->
    <link rel="stylesheet" href="../assets/css/styleAdmin.css">

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>

</head>

<body>
    <div class="container-fluid">
        <!-- Top nav -->
        <div class="container-fluid">
            <nav class="navbar fixed-top">
                <a class="navbar-brand ms-4" href="../index.php"><i class="fa-solid fa-book-open-reader" style="color: #e56815;"> RP Dashboard</i></a>
                <form action="index.php?buecherSuchen" method="post" class="d-flex w-50 me-5" role="search">
                    <input class="form-control me-2" type="search" placeholder="Titel Suchen z.B. Herr der Ringe" aria-label="search" name="search">
                    <button class="btn btn-outline" name="submit" type="submit">Suchen</button>
                </form>
                <div class="btn-group dropstart ms-auto">
                    <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropstart</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
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
    <div class="container-fluid" style="overflow: scroll; margin-bottom: auto;">
        <div class="row">
            <div class="col side justify-content-center" style="position: fixed; z-index:0; top:0; bottom: 0; float:left;">
                <ul class="nav flex-column ms-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?buecher">Bücher</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?autoren">Autoren</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?kategorie">Kategorien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?kunden">Kunden</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?verlag">Verlag</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?aufreise">Auf Reise</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?nachrichte">Nachrichten</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?mitarbeiter">Mitarbeiter</a>
                    </li>
                </ul>
            </div>


            <!-- /Sidebar -->

            <!-- Main -->
            <?php

            if(isset($_GET['neueMitarbeiter'])){
                include(BACK_END . DS . 'neueMitarbeiter.php');
            }
            if(isset($_GET['mitarbeiter'])){
                include(BACK_END . DS . 'mitarbeiter.php');
            }
            if(isset($_GET['nachrichte'])){
                include(BACK_END . DS . 'nachrichte.php');
            }
            if(isset($_GET['neueAntrage'])){
                include(BACK_END . DS .'neueAntrage.php');
            }
            if (isset($_GET['buecher'])) {
                include(BACK_END . DS . 'buecher.php');    
            }
            if (isset($_GET['kategorie'])) {
                include(BACK_END . DS . 'kategorie.php');
            }
            if (isset($_GET['verlag'])) {
                include(BACK_END . DS . 'verlag.php');
            }
            if (isset($_GET['kunden'])) {
                include(BACK_END . DS . 'kunden.php');
            }
            if (isset($_GET['neueKunde'])) {
                include(BACK_END . DS . 'neueKunde.php');
            }
            if (isset($_GET['verlagUpdate'])) {
                include(BACK_END . DS . 'verlagUpdate.php');
            }
            if (isset($_GET['aufreise'])) {
                include(BACK_END . DS . 'aufreise.php');
            }
            if (isset($_GET['kundeUpdate'])) {
                include(BACK_END . DS . 'kundeUpdate.php');
            }
            if (isset($_GET['prodEinfuegen'])) {
                include(BACK_END . DS . 'prodEinfuegen.php');
            }
            if (isset($_GET['verleihen'])) {
                include(BACK_END . DS . 'verleihen.php');
            }
            if (isset($_GET['autoren'])) {
                include(BACK_END . DS . 'autoren.php');
            }
            if (isset($_GET['buchUpdate'])) {
                include(BACK_END . DS . 'buchUpdate.php');
            }
            if (isset($_GET['buecherSuchen'])) {
                include(BACK_END . DS . 'buecherSuchen.php');
            }
            ?>

            <!-- /Main -->

        </div>
    </div>

    <!-- Footer -->

    <div class="container-fluid mt-5 py-5" style="background-color: #0d3b66; height: 50px; z-index: 4; position: static; bottom: 0;">
        <div class="row">
            <div class="col-lg-4 offset-lg-4" style="color: #F4D35E;">
                &copy; Copyright Realitätspause <?php echo date('Y'); ?> - All Rights Reserved
            </div>
        </div>
    </div>

    <!-- /Footer -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- wisywyg -->
    <script>
        ClassicEditor
            .create(document.querySelector('#editor1'))
            .catch(error => {
                console.error(error);
            });
    </script>

</body>

</html>