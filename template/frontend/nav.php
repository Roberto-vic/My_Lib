<?php
function is_home(){
    if(isset($_GET['home'])){
        return true;
    }else{
        return false;
    }
}
?>

<!doctype html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="./assets/img/favicon/favicon-32x32.png" type="image/x-icon">
    <title>Realitätspause</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/96e9023ea2.js" crossorigin="anonymous"></script>

    <!-- Style -->
    <link rel="stylesheet" href="./assets/css/stayle.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg pb-3 fixed-top" style="background-color: #F4D35E;">
        <div class="container-fluid">

            <a class="navbar-brand my-auto" href="index.php" style="color: #e56815;"><i class="fa-solid fa-book-open-reader mx-3" style="color: #e56815;"></i>Realitätspause</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo is_home() ? '#home' : 'index.php#home'; ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo is_home() ? '#neu' : 'index.php#neu'; ?>">Neuigkeiten</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo is_home() ? '#zeit' : 'index.php#zeit'; ?>">Öffnungszeiten</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo is_home() ? '#kontakt' : 'index.php#kontakt'; ?>">Kontakt</a>
                    </li>
                    <li class="nav-item">  
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>