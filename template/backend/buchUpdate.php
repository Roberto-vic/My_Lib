<div class="col ms-auto mt-5">
    <div class="mt-5 pt-3 text-center">
        <h3 class="page-header">Neues Buch hinzufügen</h3>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="titel">Titel </label>
                    <input type="text" name="titel" class="form-control mb-3">
                </div>
                <div class="form-group">
                    <label for="autor">Autor</label>
                    <input type="text" name="autor" class="form-control mb-3">
                </div>

                <div class="form-group">
                    <label for="info">Beschreibung</label>
                    <textarea name="beschreibung" cols="30" rows="8" class="form-control" type="text" id="editor1"></textarea>
                    <script>
                        CKEDITOR.replace('editor2');
                    </script>
                </div>
            </div>

            <!--fine col-8-->

            <div class="col-md-4">

                <div class="form-group">
                    <label for="isbn">ISBN-N.</label>
                    <input type="text" name="isbn" class="form-control mb-3">
                </div>
                <div class="form-group">
                    <label for="verlag">Verlag</label>
                    <input type="text" name="verlag" class="form-control mb-3">
                </div>
                <div class="form-group">
                    <label for="kategorie">Kategorie</label>
                    <select name="kategorie" class="form-control mb-3">
                        <option value="">Kategorie wählen</option>
                        <?php //mostraCatAdmin();  
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="anzahl">Anzahl</label>
                    <input type="number" name="quantita_pdt" class="form-control mb-3" min="0">
                </div>

                <div class="form-group mt-3">
                    <label for="bilder">Bilder</label>
                    <input type="file" name="bilder">
                </div>

                <div class="form-group mt-3">
                    <input type="submit" name="Einfügen" class="btn btn-outline" value="Einfügen">
                </div>

            </div><!--fine col-4-->
        </div>
    </form>
</div>