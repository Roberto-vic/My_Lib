<?php verlageAdd() ?>
<?php verlageDelete() ?>
<div class="col ms-auto mt-5">
    <div class="mt-5 pt-3 text-center mb-3">
        <h3 class="page-header">Verlage</h3>
    </div>
    <div class="row">
        <div class="col-md-6 offset-2">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Firma</th>
                        <th>Ort</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php verlage() ?>

                </tbody>
            </table>
        </div>
        <div class="col-md-3 no-wrap">
            <h3>Verlag hinzufügen</h3>
            <form action="index.php?verlag" method="post">
                <div class="form-group">
                    <label for="verlag">Verlag</label>
                    <input type="text" name="verlag" id="" class="form-control mb-3">
                </div>
                <div class="form-group">
                    <label for="ort">Ort</label>
                    <input type="text" name="ort" id="" class="form-control mb-3">
                </div>
                <input type="submit" value="Add" name="Add" class="btn btn-outline btn-sm mt-3">
            </form>
        </div>

    </div>
</div>