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
        <div class="row mt-5">
            <h1 class="text-center my-5">Realitätspause - Buchsuche</h1>
            <hr>
            <p class="text-center mb-3">Hier können Sie Ihr Lieblingsbuch suchen, einfach den Titel eingeben und los..</p>
        </div>
        <div class="col-lg-10 offset-2">
            <div class="input-group my-4">
                <form action="" method="post" class="d-flex w-75 me-5" role="search">
                    <input class="form-control me-2" type="search" placeholder="Titel Suchen z.B. Herr der Ringe" aria-label="search" name="search">
                    <button class="btn btn-outline" name="submit" type="submit">Suchen</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 me-auto offset-1">
                <?php
                if (isset($_POST['submit'])) {

                    $search = $_POST['search'];

                    // TODO: Später auslagern
                    $sql = "SELECT Signatur_ID, Titel, Verlag_Name, ISBN, Autoren_Name, Autoren_Vorname, Kategorie_Name, Anzahl, Bilder, Beschreibung 
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
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>Titel</th>
                                        <th>Autor</th>
                                        <th>Kategorie</th>
                                        <th>Verlag</th>
                                        <th>ISBN</th>
                                        <th>Verfügbarkeit</th>
                                        <th>Preview</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php

                                $buch = "";
                                foreach ($ergebnis as $inhalt) {
                                    $verfügbar = $inhalt['Anzahl'];
                                    if ($verfügbar > 0) {
                                        $text = "Verfügbar";
                                    } else {
                                        $text = "Nicht Verfügbar";
                                    }

                                    $beschreibung = htmlspecialchars($inhalt['Beschreibung']);

                                    $buch .= <<<BUCH
                                            <tr>
                                                <td>{$inhalt['Titel']}</td>
                                                <td>{$inhalt['Autoren_Vorname']} {$inhalt['Autoren_Name']}</td>
                                                <td>{$inhalt['Kategorie_Name']}</td>
                                                <td>{$inhalt['Verlag_Name']}</td>
                                                <td>{$inhalt['ISBN']}</td>
                                                <td>{$text}</td>
                                                <td><span class="buch-card"
                                                data-bs-toggle="popover"
                                                data-bs-trigger="hover"
                                                data-bs-placement="left"
                                                data-bs-html="true"
                                                data-bs-content="
                                                  <div class='card shadow me-1' style='width: 25rem;'>
                                                    <img src='./assets/img_art/{$inhalt['Bilder']}' class='card-img-top mx-3' alt='...'>
                                                    <div class='card-body'>
                                                      <h5 class='card-title'>{$inhalt['Titel']}</h5>
                                                      <p class='card-text'>{$beschreibung}</p>
                                                    </div>
                                                  </div>
                                                "><i class="fa-solid fa-eye" style="color: #ff9224;"></i>
                                                </span></td>
                                            </tr>
                                            BUCH;
                                }

                                echo $buch;
                            } ?>
                                </tbody>
                            </table>
            </div>
    <?php
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                }
    ?>
        </div>
    </div>
    </div>



    <!-- /section -->

    <!-- footer -->
    <div class="container-fluid mt-5 py-5" style="background-color: #0d3b66;">
        <?php
        include(FRONT_END . DS . "footer.php");
        ?>
    </div>
    <!-- /footer -->
</body>