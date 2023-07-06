<?php neueAutor() ?>
<?php autorLoschen() ?>

<div class="col ms-auto mt-5">
    <div class="mt-5 pt-3 text-center mb-3">
        <h3 class="page-header">Kategorien</h3>
    </div>
    <div class="row">
        <div class="col-md-6 offset-2">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Autor Vorname</th>
                        <th>Autor Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php autorTabelle() ?>

                </tbody>
            </table>
        </div>
        <div class="col-md-2 no-wrap">
            <h3>Neue Autor einfügen</h3>
            <form action="index.php?autoren" method="post">
                <label for="kategorie">Autor Vorname</label>
                <input type="text" name="autorVor" id="">
                <br>               
                <label for="kategorie">Autor Name</label>
                <input type="text" name="autorNam" id="">
                <br>
                <input type="submit" value="Add" name="Add" class="btn btn-outline btn-sm mt-3">
            </form>
        </div>

    </div>
</div>