<?php buchDelete() ?> 

<div class="col ms-auto mt-5">
    <div class="mt-5 pt-3 text-center mb-3">
        <h3 class="page-header">Verfügbare Werke</h3>
    </div>
    <div class="row">
    <div class="col-md-9">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titel</th>
                    <th>Autor</th>
                    <th>Kategorie</th>
                    <th>Verlag</th>
                    <th>ISBN</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>  
            <tbody>
                <?php buchListe() ?>
            </tbody>
        </table>
</div>
        <div class="col-md-2 no-wrap">
        <h3>Neues Buch einfügen</h3>
        <a href="index.php?prodEinfuegen" class="btn btn-outline btn-sm"><i class="fa-solid fa-plus fa-xs" style="color: #e56815;"></i> Add</a>
        </div>
        
    </div>
</div>