<?php kontaktFormular() ?>

<div class="row">
    <div class="col-lg-4 offset-lg-1 my-5" id="kontakt">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Name: </label>
                <input type="text" name="Name" class="form-control" placeholder="name" require>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email: </label>
                <input type="email" name="email" class="form-control" placeholder="name@example.com" require>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Nachricht: </label>
                <textarea class="form-control" name="nachricht" rows="5" require></textarea>
            </div>
            <div class="mb-3">
                <input type="submit" name="submit" value="Senden" class="btn btn-lg border rounded-pill">
            </div>
        </form>
    </div>
    <div class="col-lg-4 offset-lg-1 text-center my-5">
        <h2 style="color: #0d3b66;">Kontakt</h2>
        <hr>
        <p style="color: #0d3b66;">schreiben Sie uns Ihre Eindrücke, Vorschläge und/oder Bücherwünsche, wir melden uns Zeitnah bei Ihnen zurück.</p>
        <br>
        <p style="color: #0d3b66;" class="py-3">Unser Hauptsitz befindet sich am: <br>
            Steintorwall 234 <br>
            20031 Hamburg <br><br>
            Telefon: 040 / 23 54 367 <br>
            Mail: realitaetspause@test.de
        </p>
        <div class="container-fluid">
            <span class="me-4"><i class="fa-brands fa-facebook fa-xl" style="color: #0b5be5;"></i></span>
            <span><i class="fa-brands fa-instagram fa-xl" style="color: #ed12be;"></i></span>
            <span class="ms-4"><i class="fa-brands fa-twitter fa-xl" style="color: #01cff9;"></i></span>
        </div>
    </div>
</div>