<?php

if (isset($_GET['id'])) {

    $kunden_id = $_GET['id'];

    $sql = "SELECT * FROM kunden WHERE Kunden_ID = $kunden_id";
    $result = query($sql);
    confirm($result);


    foreach ($result as $kunde) {
        $name = $kunde['Name'];
        $vorname = $kunde['Vorname'];
        $strasse = $kunde['Straße'];
        $plz = $kunde['PLZ'];
        $ort = $kunde['Ort'];
    }
    
    kundeUpdate();
}

?>

<div class="col ms-auto mt-5">
    <div class="mt-5 pt-3 text-center">
        <h3 class="page-header">Kunden Bearbeiten</h3>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6 offset-2">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name"  class="form-control mb-3" value='<?php echo $name ?>'>
                </div>
                <div class="form-group">
                    <label for="autor">Vorname</label>
                    <input type="text" name="vorname" class="form-control mb-3" value='<?php echo $vorname ?>''>
                </div>
                <div class="form-group">
                    <label for="strasse">Straße/N.</label>
                    <input type="text" name="strasse" class="form-control mb-3" value='<?php echo $strasse ?>''>
                </div>
                <div class="form-group">
                    <label for="plz">PLZ</label>
                    <input type="text" name="plz" class="form-control mb-3" value='<?php echo $plz ?>'>
                </div>
                <div class="form-group">
                    <label for="ort">Ort</label>
                    <input type="text" name="ort" class="form-control mb-3" value='<?php echo $ort ?>'>
                </div>
                <div class="form-group mt-3">
                    <input type="submit" name="update" class="btn btn-outline" value="Speichern">
                </div>
            </div>
    </form>
</div>