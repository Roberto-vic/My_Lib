<?php mitarbeiterLoeschen() ?>

<div class="col-11 ms-auto mt-5 mb-auto">
    <div class="mt-5 pt-3 text-center mb-3">
        <h3 class="page-header">Mitarbeiter</h3>
    </div>
    <div class="row ms-5">
    <div class="col-md-9">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Ma.Nr</th>
                    <th>Name</th>
                    <th>Vorname</th>
                    <th>Ort</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php mitarbeiterListe() ?>

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
        <h3>Neue Mitarbeiter hinzufügen</h3>
        <a href="index.php?neueMitarbeiter" class="btn btn-outline btn-sm"><i class="fa-solid fa-plus fa-xs" style="color: #e56815;"></i> Add</a>
        </div>
        
    </div>
</div>