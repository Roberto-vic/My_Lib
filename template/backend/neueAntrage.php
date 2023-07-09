<?php
 $vorname = '';
 $name = '';
 $kundenNr = '';
 $adresse = '';
 
if(isset($_POST['kunde'])){

    $sql = "SELECT Name, Vorname, Kunden_ID, Straße FROM kunden WHERE Kunden_ID = {$_POST['kunde']};";
    $result = query($sql);
    confirm($result);

   

    foreach($result as $kunde){
        $vorname = $kunde['Vorname'];
        $name = $kunde['Name'];
        $kundenNr = $kunde['Kunden_ID'];
        $adresse = $kunde['Straße'];
    }

    echo $vorname;
    echo $name;
    echo $kundenNr;
    echo $adresse;
}

?>

<?php ausleihen() ?>

<div class="col-11 ms-auto mt-5 mb-auto">
    <div class="row ms-5">
        <div class="mt-5 pt-3 text-center mb-4">
            <h3 class="page-header">Neues Buch verlehien</h3>
        </div>
        <form action="" method="post">
            <div class="row ms-5">
                <div class="col-md-10 offset-2">
                    <div class="form-group mb-4">
                        <label for="titel">Kundennummer </label>
                        <select name="kunde" id="">
                            <?php kundeNr() ?>
                        </select>
                        <input type="submit" value="Auswählen" class="btn btn-outline btn-sm ms-4">
                    </div>
                    <div class="form-group mb-4">
                        <label for="">Kundennummer: </label>
                        <input type="text" name="kundennummer" class="form-control w-50" value='<?php echo $kundenNr ?>'>
                    </div>
                    <div class="form-group mb-4">
                        <label for="">Vorname: </label>
                        <input type="text" name="vorname" class="form-control w-50" value='<?php echo $vorname ?>'>
                    </div>
                    <div class="form-group mb-4">
                        <label for="">Nachname: </label>
                        <input type="text" name="nachname" class="form-control w-50" value='<?php echo $name ?>'>
                    </div>
                    <div class="form-group mb-4">
                        <label for="">Adresse: </label>
                        <input type="text" name="adresse" class="form-control w-50" value='<?php echo $adresse ?>'>
                    </div>
                    <div class="form-group mb-4">
                        <label for="autor">Buch</label>
                        <select name="buch" id="">
                            <?php buchLei() ?>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="">Start Datum: </label>
                        <input type="date" name="start" id="">
                    </div>
                    <div class="form-group mb-4">
                        <input type="submit" name="verleihen" value="Verleihen" class="btn btn-outline btn-md">
                    </div>
                </div>
            </div>
    </div>
    </form>
</div>
</div>