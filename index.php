<!doctype html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My_Lib</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/96e9023ea2.js" crossorigin="anonymous"></script>

    <!-- Style -->
    <link rel="stylesheet" href="./assets/css/stayle.css">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg pb-5 position-sticky top-0 position-relative" style="background-color: #F4D35E;">
        <div class="container-fluid">
            <i class="fa-solid fa-book-open-reader" style="color: #e56815;"></i>
            <a class="navbar-brand my-auto" href="#" style="color: #e56815;">My_Lib</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#neu">Neuogkeiten</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#zeit">Öffnungszeiten</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontakt">Kontakt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- /Navigation -->

    <!-- header -->
    <div class="container-fluid header py-5 mb-5" id="home">
        <div class="row">
            <div class="col-lg-4 offset-lg-2" style="color: #0d3b66">
                <h2 class="mt-5 pt-3">Willkommen in My_Lib</h2>
                <p class="mt-5">
                    Hier findest du alle Informationen über die Leihbücherei: Öffnungszeiten, Ausleihbestimmungen,...
                    Sie können in unserem Katalog mit mehr als 7000 Titeln nach Büchern suchen und viele andere Dinge tun
                </p>
                <div class="btn btn-lg border rounded-pill">Buch suchen</div>
                <p class="mt-2">oder besuche uns !!!</p>
            </div>
            <div class="col-lg-4 text-center">
                <img src="./assets/img/1.png" alt="">
            </div>
        </div>
    </div>

    <!-- /header -->

    <!-- Neues -->

    <div class="container my-5 py-5" style="color: #0d3b66">
        <div class="row">
            <div class="col-lg-6 offset-3 text-center" id="neu">
                <h2 class="mt-5 pt-4">Letzte Einkäufe und Neuigkeiten</h2>
                <hr>
                <p>Wir zeigen die neuesten Bücher im Katalog</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-group mx-5 my-3">
                    <div class="card shadow me-1" style="width: 18rem;">
                        <img src="./assets/img/2.jpeg" class="card-img-top mx-3" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                    <div class="card shadow me-1" style="width: 18rem;">
                        <img src="./assets/img/3.jpeg" class="card-img-top mx-3" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                    <div class="card shadow me-1" style="width: 18rem;">
                        <img src="./assets/img/4.jpeg" class="card-img-top mx-3" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        </div>
                    </div>
                    <div class="card shadow" style="width: 18rem;">
                        <img src="./assets/img/5.jpeg" class="card-img-top mx-3" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- /Neues -->

    <!-- Öffnungszeit -->

    <div class="container-fluid my-5 py-5" style="background-color: #0d3b66;">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center" id="zeit">
                <h2 class="mt-5 pt-4" style="color:#F4D35E">Öffnungszeiten</h2>
                <hr>
                <p style="color: #F4D35E;">Wir sind von Montag bis Samstag für sie da !!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 offset-lg-4 my-5">
                <table class="table table-borderless text-center mt-3 mb-5">
                    <thead>
                        <tr>
                            <th>Öffnungszeit</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="col">Montag</th>
                            <th> 9 - 18 </th>
                        </tr>
                        <tr>
                            <th scope="col">Dienstag</th>
                            <th> 9 - 18 </th>
                        </tr>
                        <tr>
                            <th scope="col">Mittwoch</th>
                            <th> 9 - 18 </th>
                        </tr>
                        <tr>
                            <th scope="col">Donnerstag</th>
                            <th> 9 - 18 </th>
                        </tr>
                        <tr>
                            <th scope="col">Freitag</th>
                            <th> 9 - 18 </th>
                        </tr>
                        <tr>
                            <th scope="col">Samstag</th>
                            <th> 9 - 15 </th>
                        </tr>
                        <tr>
                            <th scope="col">Sonntag</th>
                            <th> Geschlossen </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- /Öffnungszeit -->

    <!-- Kontakt -->

    <div class="container-fluid my-5 py-4">
        <div class="row">
            <div class="col-lg-4 offset-lg-1 my-5" id="kontakt">
                <div class="mb-3">
                    <label for="" class="form-label">Name: </label>
                    <input type="text" class="form-control" id="" placeholder="name" require>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email: </label>
                    <input type="email" class="form-control" id="" placeholder="name@example.com" require>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Nachricht: </label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" require></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Senden" class="btn btn-lg border rounded-pill">
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1 text-center my-5">
                <h2 style="color: #0d3b66;">Kontakt</h2>
                <hr>
                <p style="color: #0d3b66;">Schreiben Sie uns Ihre Eindrücke, Vorschläge und/oder Ratschläge, wenn Sie etwas wissen möchten oder Informationen erhalten möchten</p>
                <br>
                <p style="color: #0d3b66;" class="py-3">Unser Hauptsitz befindet sich in: <br>
                    Steintorwall 234 <br>
                    20031 Hamburg <br><br>
                    Telefon: 040/2354367 <br>
                    Mail: my_lib@test.de
                </p>
                <div class="container-fluid">
                    <span class="me-4"><i class="fa-brands fa-facebook fa-xl" style="color: #0b5be5;"></i></span>
                    <span><i class="fa-brands fa-instagram fa-xl" style="color: #ed12be;"></i></span>
                    <span class="ms-4"><i class="fa-brands fa-twitter fa-xl" style="color: #01cff9;"></i></span>
                </div>
            </div>
        </div>
    </div>

    <!-- /Kontakt -->

    <!-- Footer -->

    <div class="container-fluid mt-5 py-5" style="background-color: #0d3b66;">
        <div class="row">
            <div class="col-lg-4 offset-lg-4" style="color: #F4D35E;">
                &copy; Copyright MyLib <?php echo date('Y'); ?> - All Rights Reserved
            </div>
        </div>
    </div>

    <!-- /Footer -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>