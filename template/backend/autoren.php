<?php neueAutor() ?>
<?php autorLoschen() ?>

<div class="col ms-auto mt-5">
    <div class="mt-5 pt-3 text-center mb-3">
        <h3 class="page-header">Autoren</h3>
    </div>
    <div class="row">
        <div class="col-md-7 offset-2">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Vorname</th>
                        <th>Nachname</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php autorTabelle() ?>

                </tbody>
            </table>
        </div>
        <div class="col-md-1 no-wrap">
            <h3>Autor hinzufügen</h3>
            <form action="index.php?autoren" method="post">
                <label for="kategorie">Vorname:</label>
                <input type="text" name="autorVor" id="">
                <br>               
                <label for="kategorie">Nachname:</label>
                <input type="text" name="autorNam" id="">
                <br>
                <input type="submit" value="Add" name="Add" class="btn btn-outline btn-sm mt-3">
            </form>
        </div>

    </div>
</div>