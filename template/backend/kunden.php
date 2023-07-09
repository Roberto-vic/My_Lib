<?php neueKunde() ?>
<?php kundeLoschen() ?>

<div class="col-11 ms-auto mt-5 mb-auto">
    <div class="mt-5 pt-3 text-center mb-3">
        <h3 class="page-header">Kunden</h3>
    </div>
    <div class="row ms-5">
    <div class="col-md-9">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Knd.Nr</th>
                    <th>Name</th>
                    <th>Vorname</th>
                    <th>Straße</th>
                    <th>PLZ</th>
                    <th>Ort</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php kundenTabelle()  ?>

         <!--       <tr>
                    <td>1001</td>
                    <td>Max</td>
                    <td>Muster</td>
                    <td>Kurzweg 12</td>
                    <td>20034</td>
                    <td>Halle</td>
                    <td>
                        <a href="index.php?kundeUpdate&id=" class="btn btn-outline btn-sm"><i class="fa-solid fa-xs fa-pencil" style="color: #e56815;"></i> Edit</a>
                        <a href="index.php?kundeUpdate&id=" class="btn btn-outline btn-sm"><i class="fa-regular fa-trash-can fa-xs" style="color: #e56815;"></i> Delete</a>
                    </td>
 </tr>
   -->         </tbody>
        </table>
</div>
        <div class="col-md-2 no-wrap">
        <h3>Kunden hinzufügen</h3>
        <a href="index.php?neueKunde" class="btn btn-outline btn-sm"><i class="fa-solid fa-plus fa-xs" style="color: #e56815;"></i> Add</a>
        </div>
        
    </div>
</div>