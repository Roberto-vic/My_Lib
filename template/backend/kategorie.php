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
                        <th>Kategorie</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php kategorie(); ?>

                    <!-- <tr>
                        <td>6</td>
                        <td>Fantasy</td>
                        <td>
                            <a href="" class="btn btn-outline btn-sm"><i class="fa-regular fa-trash-can fa-xs" style="color: #e56815;"></i> Delete</a>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
        <div class="col-md-3 no-wrap">
            <h3>Neue Kategorie einfügen</h3>
            <input type="text" name="kategorie" id="">
            <br>
            <input type="submit" value="Add" class="btn btn-outline btn-sm mt-3">
        </div>

    </div>
</div>