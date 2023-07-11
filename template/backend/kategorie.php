<?php addKategorie() ?>
<?php deleteKat() ?>
<div class="col ms-auto mt-5">
    <div class="mt-5 pt-3 text-center mb-3">
        <h3 class="page-header">Kategorien</h3>
    </div>
    <div class="row">
        <div class="col-md-7 offset-2">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kategorie</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php kategorie(); ?>

                </tbody>
            </table>
        </div>
        <div class="col-md-2 no-wrap">
            <h3>Kategorie <br> hinzufügen</h3>
            <form action="index.php?kategorie" method="post">
                <label for="kategorie">Kategorie Name:</label>
                <input type="text" name="kategorie" id="">
                <br>
                <input type="submit" value="Add" name="Add" class="btn btn-outline btn-sm mt-3">
            </form>
        </div>

    </div>
</div>