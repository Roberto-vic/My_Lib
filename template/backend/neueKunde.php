<?php neueKunde() ?>

<div class="col ms-auto mt-5">
    <div class="mt-5 pt-3 text-center">
        <h3 class="page-header">Neuen Kunden hinzufügen</h3>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6 offset-2">
                <div class="form-group">
                    <label for="name">Nachname</label>
                    <input type="text" name="name" class="form-control mb-3">
                </div>
                <div class="form-group">
                    <label for="autor">Vorname</label>
                    <input type="text" name="vorname" class="form-control mb-3">
                </div>
                <div class="form-group">
                    <label for="strasse">Straße/N.</label>
                    <input type="text" name="strasse" class="form-control mb-3">
                </div>
                <div class="form-group">
                    <label for="plz">PLZ</label>
                    <input type="text" name="plz" class="form-control mb-3">
                </div>
                <div class="form-group">
                    <label for="ort">Ort</label>
                    <input type="text" name="ort" class="form-control mb-3">
                </div>
                <div class="form-group">
                    <label for="ort">Email</label>
                    <input type="email" name="mail" class="form-control mb-3">
                </div>
                <div class="form-group mt-3">
                    <input type="submit" name="Einfügen" class="btn btn-outline" value="Einfügen">
                </div>
            </div>
    </form>
</div>