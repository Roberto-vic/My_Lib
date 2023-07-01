<?php
// Ich hole die Daten von der Datenbank

if (isset($_GET['id'])) {

    $verlag_id = $_GET['id'];

    $sql = "SELECT * FROM verlage WHERE Verlag_ID = $verlag_id";
    $result = query($sql);
    confirm($result);


    foreach ($result as $verlag) {
        $verlag_name = $verlag['Verlag_Name'];
        $ort = $verlag['Ort'];
    }
    
    verlageUpdate();
}
?>

<div class="col ms-auto mt-5">
    <div class="mt-5 pt-3 text-center mb-3">
        <h3 class="page-header">Verlage</h3>
    </div>
    <div class="row">
        <div class="col-md-6 offset-3 mt-4">
            <h3 class="text-center mb-3">Verlag daten ändern</h3>
            <form action="" method="post">
                <div class="form-group mb-3">
                    <label for="verlag">Verlag</label>
                    <input type="text" name="verlag" class="form-control mb-3" value='<?php echo $verlag_name ?>'>
                </div>
                <div class="form-group">
                    <label for="ort">Ort</label>
                    <input type="text" name="ort" class="form-control mb-3" value='<?php echo $ort ?>'>
                </div>
                <input type="submit" value="Aktualisieren" name="edit" class="btn btn-outline btn-sm mt-3">
            </form>
        </div>
    </div>
</div>