<div class="col-11 ms-auto mt-5 mb-auto">
    <div class="mt-5 pt-3 text-center mb-3">
        <h3 class="page-header">Verfügbare Werke</h3>
    </div>
    <div class="row ms-5">
        <div class="col-md-9">
            <?php
            if (isset($_POST['submit'])) {
    $search = filter_var($_POST['search']);
    // TODO: Später auslagern
        $sql = "SELECT Signatur_ID, Titel, Verlag_Name, ISBN, Autoren_Name, Autoren_Vorname, Kategorie_Name, verfügbar
        FROM bücher 
        INNER JOIN geschrieben ON Signatur = Signatur_ID 
        INNER JOIN verlage ON Verlag_Nr = Verlag_ID 
        INNER JOIN kategorien ON Kategorie = Kategorie_ID 
        INNER JOIN autoren ON Autor_ID = Autor_Nr
        WHERE Titel LIKE '%$search%'
        GROUP BY Signatur_ID
        ORDER BY Signatur_ID ASC;";

    try {
        $dbh = new PDO("mysql:dbname=Projekt_Realitätspause;host=localhost", "root", "");
        $rueckgabe = $dbh->query($sql);
        $ergebnis = $rueckgabe->fetchAll(PDO::FETCH_ASSOC);

        if (!$ergebnis) {
            echo "Kein Ergebnis gefunden.";
        } else { ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Titel</th>
                    <th>Autor</th>
                    <th>Kategorie</th>
                    <th>Verlag</th>
                    <th>ISBN</th>
                    <th>Verfügbar</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody> 
                <?php
                    $buch = "";
                    foreach ($ergebnis as $inhalt) {
                        $verfügbar = $inhalt['verfügbar'];
                        if($verfügbar){
                            $text = "Verfügbar";
                        } else {
                            $text = "Nicht Verfügbar";
                        }
                        $buch .= <<<BUCH
                        <tr>
                            <td>{$inhalt['Titel']}</td>
                            <td>{$inhalt['Autoren_Vorname']} {$inhalt['Autoren_Name']}</td>
                            <td>{$inhalt['Kategorie_Name']}</td>
                            <td>{$inhalt['Verlag_Name']}</td>
                            <td>{$inhalt['ISBN']}</td>
                            <td>{$text}</td>
                            
                            <td><a href="index.php?buchUpdate&id={$inhalt['Signatur_ID']}" class="btn btn-outline btn-sm" role="button">Edit</a></td>
                            <td>
                            <form action="" method="post">
                            <input type="submit" value="Löschen" class="btn btn-outline btn-sm"> 
                            <input type='hidden' name='delete' value = {$inhalt['Signatur_ID']}>
                        </tr>
                        BUCH;
                    }
                    echo $buch;
                } 
                ?>
            </tbody>
        </table>
        </div>
</div>
<?php
} catch (PDOException $e) {
    echo $e->getMessage();
}
}
?>