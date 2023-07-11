<?php mitarbeiterNeue() ?>

<div class="col ms-auto mt-5">
    <div class="mt-5 pt-3 text-center mb-4">
        <h3 class="page-header">Neuen Kunden hinzufügen</h3>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="form-group">
                    <label for="name">Nachname</label>
                    <input type="text" name="name" class="form-control mb-3">
                </div>
                <div class="form-group">
                    <label for="autor">Vorname</label>
                    <input type="text" name="vorname" class="form-control mb-3">
                </div>
                <div class="form-group">
                    <label for="ort">Ort</label>
                    <input type="text" name="ort" class="form-control mb-3">
                </div>
                <div class="form-group">
                    <label for="ort">Username</label>
                    <input type="text" name="username" class="form-control mb-3">
                </div>
                <div class="form-group">
                    <label for="ort">Password</label>
                    <input type="password" name="pass" class="form-control mb-3">
                </div>
                <div class="form-group">
                    <label for="ort">Email</label>
                    <input type="email" name="mail" class="form-control mb-3">
                </div>
                <div class="form-group">
                    <select name="role" id="">
                        <option value="admin">Admin</option>
                        <option value="ausbilder">Ausbilder</option>
                        <option value="assistent">Bibbliothekassistent</option>
                        <option value="chef">Chef</option>
                        <option value="archivare">Archivare</option>
                        <option value="receptionist">Receptionist</option>                        
                        <option value="techniker">Bibbliothektechniker</option>
                    </select>
                <div class="form-group mt-3">
                    <input type="submit" name="Einfügen" class="btn -outline" value="Einfügen">
                </div>
            </div>
    </form>
</div>