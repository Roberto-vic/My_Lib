<?php
include_once("config.php");
?>

<body>
    <!-- Navigation -->
    <?php
    include(FRONT_END . DS . "nav.php");
    ?>
    <!-- /navigation -->

    <!-- section -->
    <div class="container-fluid my-5">
        <div class="row">
            <h1 class="text-center my-2">Realitätspause - Buchsuche</h1>
            <hr>
            <p class="text-center mb-3">Hier kannst du das gewünschte Buch nach Titel, Autor oder Genre suchen....</p>
        </div>
        <div class="col-lg-6 offset-lg-3">
            <div class="input-group my-4">
                <form action="" method="post" class="d-flex ms-auto w-50" role="search">
                    <input class="form-control me-2" type="search" placeholder="Titel Suchen" aria-label="search" name="search">
                    <button class="btn btn-outline" name="submit" type="submit">Suchen</button>
                </form>
            </div>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>

    <?php 


    if (isset($_POST['submit'])) {
        
        $search = $_POST['search'];
        
// TODO: Später auslagern
        $sql = "SELECT Signatur_ID, Titel, Verlag_Name, ISBN, Autoren_Name, Autoren_Vorname, Kategorie_Name 
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
            <div class="col-md-9">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Titel</th>
                    <th>Autor</th>
                    <th>Kategorie</th>
                    <th>Verlag</th>
                    <th>ISBN</th>
                </tr>
            </thead>  
            <tbody> <?php
            foreach ($ergebnis as $inhalt) {
                $buch .= <<<BUCH
                <tr>
                    <td>{$inhalt['Titel']}</td>
                    <td>{$inhalt['Autoren_Vorname']} {$inhalt['Autoren_Name']}</td>
                    <td>{$inhalt['Kategorie_Name']}</td>
                    <td>{$inhalt['Verlag_Name']}</td>
                    <td>{$inhalt['ISBN']}</td>

                </tr>
                BUCH;
            }
        
            echo $buch;
        }?>
        </tbody>
        </table>
</div><?php
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

        //require('functions.php');
        //searchBooks($search);
    }
    ?>
    <!-- /section -->

    <!-- footer -->
    <div class="container-fluid mt-5 py-5" style="background-color: #0d3b66;">
        <?php
        include(FRONT_END . DS . "footer.php");
        ?>
    </div>
    <!-- /footer -->
</body>
