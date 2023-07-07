<?php

if (isset($_GET['id'])) {

    $buch_id = $_GET['id'];

    $sql = "SELECT Titel, Verlag_Name, ISBN, Autoren_Name, Autoren_Vorname, Kategorie_Name, Bilder, Beschreibung, Anzahl 
        FROM bücher 
        INNER JOIN geschrieben ON Signatur = Signatur_ID 
        INNER JOIN verlage ON Verlag_Nr = Verlag_ID 
        INNER JOIN kategorien ON Kategorie = Kategorie_ID 
        INNER JOIN autoren ON Autor_ID = Autor_Nr
        WHERE Signatur_ID = $buch_id;";

    $result = query($sql);
    confirm($result);

    // die();
    $bucher = $result;
    foreach ($bucher as $buch) {
        $titel = $buch['Titel'];
        $autor = $buch['Autoren_Vorname'] . " " . $buch['Autoren_Name'];
        $isbn = $buch['ISBN'];
        $verlag = $buch['Verlag_Name'];
        $kategorie = $buch['Kategorie_Name'];
        $beschreibung = $buch['Beschreibung'];
        $anzahl = $buch['Anzahl'];
        $bild = $buch['Bilder'];
    }

    buchUpdate();
}

?>

<div class="col-11 ms-auto mt-5 mb-auto">
    <div class="mt-5 pt-3 text-center mb-5">
        <h3 class="page-header">Buch verarbeiten</h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data" class="me-auto">
        <div class="row ms-5">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="titel">Titel </label>
                    <input type="text" name="titel" class="form-control mb-3" value='<?php echo $titel ?>'>
                </div>
                <div class="form-group">
                    <label for="autor">Autor</label>
                    <select name="autor" class="form-control mb-3">
                        <option value=''><?php echo $autor ?></option>
                        <?php autoren() ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="info">Beschreibung</label>
                    <textarea name="beschreibung" cols="30" rows="8" class="form-control" type="text" id="editor1" value=''><?php echo $beschreibung ?></textarea>
                    <script>
                        CKEDITOR.replace('editor2');
                    </script>
                </div>
            </div>

            <!--fine col-8-->

            <div class="col-md-5">

                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" name="isbn" class="form-control mb-3" value='<?php echo $isbn ?>'>
                </div>
                <div class="form-group">
                    <label for="verlag">Verlag</label>
                    <select name="verlag" class="form-control mb-3">
                        <option value=''><?php echo $verlag ?></option>
                        <?php verlagen() ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kategorie">Kategorie</label>
                    <select name="kategorie" class="form-control mb-3">
                        <option value=''><?php echo $kategorie ?></option>
                        <?php kategorieList() ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="anzahl">Anzahl</label>
                    <input type="number" name="anzahl" class="form-control mb-3" min="0" value='<?php echo $anzahl ?>'>
                </div>

                <div class="form-group mt-3">
                    <label for="bilder">Bilder</label>
                    <input type="file" name="bilder">
                    <p></p>
                    <img src='../assets/img_art/<?php echo $bild ?>' alt="" style="width: 50%;">
                </div>

                <div class="form-group mt-3">
                    <input type="submit" name="edit" class="btn btn-outline" value="Einfügen">
                    
                </div>

            </div><!--fine col-4-->
        </div>
    </form>
</div>