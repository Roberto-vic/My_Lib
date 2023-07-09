<div class="col-11 ms-auto mt-5 mb-auto">
    <div class="mt-5 pt-3 text-center mb-3">
        <h3 class="page-header">Verleih Liste</h3>
    </div>
    <div class="row ms-5">
        <div class="col-md-9">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Knd.Nr</th>
                        <th>Nachname</th>
                        <th>Vorname</th>
                        <th>Titel</th>
                        <th>Entleihdatum</th>
                        <th>Rückgabedatum</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php aufreiseTabelle() ?>
                    <?php  ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-2 no-wrap">
            <h3>Neues Buch verleihen</h3>
            <a href="index.php?neueAntrage" class="btn btn-outline btn-sm"><i class="fa-solid fa-plus fa-xs" style="color: #e56815;"></i> Add</a>
        </div>

    </div>
</div>