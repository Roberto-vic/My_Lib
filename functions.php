<?php

function query($sql)
{
    global $dbh;

    return $dbh->query($sql);
}

function confirm($result)
{
    global $dbh;

    if (!$result) {
        die("Query failed" . $dbh->errorInfo());
    }
}

function fetch_array($result)
{
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function last_id()
{
    global $dbh;

    return $dbh->lastInsertId();
}

function set_message($msg)
{
    if (!empty($msg)) {
        $_SESSION['message'] = $msg;
    } else {
        $msg = "";
    }
}

function display_message()
{
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

// Autor Liste
function autoren()
{
    $sql = "SELECT Autor_ID, Autoren_Name, Autoren_Vorname FROM autoren";
    $result = query($sql);
    confirm($result);

    $autoren = '';

    foreach ($result as $row) {
        $autoren .= <<<AUTOREN
        <option value="{$row['Autor_ID']}">{$row['Autoren_Vorname']} {$row['Autoren_Name']}</option>
        AUTOREN;
    }

    echo $autoren;
}

// Autor Tabelle
function autorTabelle()
{
    $sql = "SELECT Autor_ID, Autoren_Name, Autoren_Vorname FROM autoren";
    $result = query($sql);
    confirm($result);

    $autoren = '';

    foreach ($result as $row) {
        $autoren .= <<<AUTOREN
        <tr>
            <td>{$row['Autor_ID']}</td>
            <td>{$row['Autoren_Vorname']}</td>
            <td>{$row['Autoren_Name']}</td>
            <td>
            <form method="post" action="">
            <input type="submit" value="Löschen" class="btn btn-outline btn-sm"> 
            <input type='hidden' name='delete' value={$row['Autor_ID']}>
            </form>
            </td>
        </tr>
        AUTOREN;
    }

    echo $autoren;
}

// Autor löschen
function autorLoschen()
{
    if (isset($_POST['delete'])) {
        $autId = $_POST['delete'];
        $sql = "DELETE FROM autoren WHERE Autor_ID = $autId";
        $result = query($sql);
        confirm($result);

        // set_message("Autor wurde gelöscht");
        header("Location: index.php?autoren");
    }
}

// Neue Autor 
function neueAutor()
{
    if (isset($_POST['Add'])) {
        $autorVor = $_POST['autorVor'];
        $autorNam = $_POST['autorNam'];

        $sql = "INSERT INTO autoren (Autoren_Name, Autoren_Vorname) VALUES ('$autorNam', '$autorVor')";
        $result = query($sql);
        confirm($result);

        // set_message("Neue Autor wurde eingefügt");
        header("Location: index.php?autoren");
    }
}

// Tabelle von alles Bücher die wir haben 
function buchListe()
{
    $sql = "SELECT Signatur_ID, Titel, Verlag_Name, ISBN, Autoren_Name, Autoren_Vorname, Kategorie_Name 
    FROM bücher 
    INNER JOIN geschrieben ON Signatur = Signatur_ID 
    INNER JOIN verlage ON Verlag_Nr = Verlag_ID 
    INNER JOIN kategorien ON Kategorie = Kategorie_ID 
    INNER JOIN autoren ON Autor_ID = Autor_Nr;
    GROUP BY 1
    ORDER BY Signatur_ID ASC";
    $result = query($sql);
    confirm($result);

    $buch = '';

    foreach ($result as $row) {

        $buch .= <<<BUCH
        <tr>
            <td>{$row['Signatur_ID']}</td>
            <td>{$row['Titel']}</td>
            <td>{$row['Autoren_Vorname']} {$row['Autoren_Name']}</td>
            <td>{$row['Kategorie_Name']}</td>
            <td>{$row['Verlag_Name']}</td>
            <td>{$row['ISBN']}</td>
            <td><a href="index.php?buchupdate&id={$row['Signatur_ID']}" class="btn btn-outline btn-sm">Edit</a></td>
            <td><a href="index.php?delete_buch&id={$row['Signatur_ID']}" class="btn btn-outline btn-sm">Delete</a></td>
        </tr>
        BUCH;
    }

    echo $buch;
}

// Buch einfugen
function neuesBuch()
{
    if (isset($_POST['einfuegen'])) {

        $titel = $_POST['titel'];
        $autor = $_POST['autoren'];
        $beschreibung = $_POST['beschreibung'];
        $kategorie = $_POST['kategorie'];
        $verlag = $_POST['verlag'];
        $isbn = $_POST['isbn'];
        $anzahl = $_POST['anzahl'];
        $bild = $_FILES['bilder']['name'];
        $tmp_bild = $_FILES['bilder']['tmp_name'];

        move_uploaded_file($tmp_bild, IMG_UPLOADS . DS . $bild);

        $sql = "INSERT INTO bücher (Titel, Beschreibung, Kategorie, Verlag_Nr, ISBN, Anzahl, Bilder) VALUE ('$titel', '$beschreibung', '$kategorie', '$verlag', '$isbn', '$anzahl', '$bild');";
        $result = query($sql);
        confirm($result);

        $buch_id = last_id($result);

        $sql = "INSERT INTO geschrieben (Signatur, Autor_Nr) VALUE ('$buch_id', '$autor');";
        $result = query($sql);
        confirm($result);

        header("Location: index.php?buecher");
    }
}

// lätzte 4 Bücher in Homepage zeigen
function buchHomepage()
{
    $sql = "SELECT Bilder, Titel, Beschreibung FROM bücher ORDER BY Signatur_ID DESC LIMIT 4;";
    $result = query($sql);
    confirm($result);

    $buch = '';
    foreach ($result as $row) {
        $buch .= <<<BUCH
        <div class="card shadow me-1" style="width: 18rem;">
            <img src="./assets/img_art/{$row['Bilder']}" class="card-img-top mx-3" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{$row['Titel']}</h5>
                    <p class="card-text">{$row['Beschreibung']}</p>
                </div>
        </div>
        BUCH;
    }

    echo $buch;
}
//Kategorie Liste fur Buch einfugen und editieren
function kategorieList()
{
    $sql = "SELECT * FROM kategorien";
    $result = query($sql);
    confirm($result);

    $kategorie = '';

    foreach ($result as $row) {

        $kategorie .= <<<KATEGORIE
        <option value="{$row['Kategorie_ID']}">{$row['Kategorie_Name']}</option>
        KATEGORIE;
    }

    echo $kategorie;
}

// Kategorie zeigen
function kategorie()
{
    $sql = "SELECT * FROM Kategorien";
    $result = query($sql);
    confirm($result);

    $kategorien = '';

    foreach ($result as $kategorie) {

        $kategorien .= <<<KATEGORIE
    <tr>
        <td>{$kategorie['Kategorie_ID']}</td>
        <td>{$kategorie['Kategorie_Name']}</td>
        <td>
        <form action="" method="post">
        <input type="submit" value="Löschen" class="btn btn-outline btn-sm"> 
        <input type='hidden' name='delete' value = {$kategorie['Kategorie_ID']}>
        </form>
        
        </td>
    </tr>
    KATEGORIE;
    }

    echo $kategorien;
}

// Kategorie einfugen
function addKategorie()
{
    if (isset($_POST['Add'])) {
        $kategorie = $_POST['kategorie'];

        $sql = "INSERT INTO kategorien (Kategorie_Name) VALUES ('$kategorie')";
        $result = query($sql);
        confirm($result);

        header("Location: index.php?kategorie");
    }
}

// Kategorie löschen
function deleteKat()
{

    if (isset($_POST['delete'])) {

        $katID = $_POST['delete'];

        $sql = "DELETE FROM kategorien WHERE Kategorie_ID = $katID";
        $result = query($sql);
        confirm($result);

        header("Location: index.php?kategorie");
    }
}

// Verlage Liste
function verlagen()
{
    $sql = "SELECT * FROM verlage";
    $result = query($sql);
    confirm($result);

    $verlage = '';

    foreach ($result as $row) {

        $verlage .= <<<VERLAG
        <option value="{$row['Verlag_ID']}">{$row['Verlag_Name']}</option>
        VERLAG;
    }

    echo $verlage;
}

// Verlage zeigen
function verlage()
{
    $sql = "SELECT * FROM verlage";
    $result = query($sql);
    confirm($result);

    $verlageListe = '';
    foreach ($result as $verlag) {

        $verlageListe .= <<<VERLAG
        <tr>
                <td>{$verlag['Verlag_ID']}</td>
                <td>{$verlag['Verlag_Name']}</td>
                <td>{$verlag['Ort']}</td>
            <td>
            <form action="" method="post">
            <input type="submit" value="Löschen" class="btn btn-outline btn-sm"> 
            <input type='hidden' name='delete' value="{$verlag['Verlag_ID']}">
            </form>
            </td>
            <td>          
            <a href="index.php?verlagUpdate&id={$verlag['Verlag_ID']}" class="btn btn-outline btn-sm" role="button">Edit</a>            
            </td>
        </tr>

        VERLAG;
    }

    echo $verlageListe;
}

// Verlage einfugen
function verlageAdd()
{
    if (isset($_POST['Add'])) {
        $verlag = $_POST['verlag'];
        $ort = $_POST['ort'];

        $sql = "INSERT INTO verlage (Verlag_Name, Ort) VALUES ('$verlag', '$ort')";
        $result = query($sql);
        confirm($result);

        header("Location: index.php?verlag");
    }
}

// Verlage löschen

function verlageDelete()
{
    if (isset($_POST['delete'])) {

        $verlagID = $_POST['delete'];

        $sql = "DELETE FROM verlage WHERE Verlag_ID = $verlagID";
        $result = query($sql);
        confirm($result);

        header("Location: index.php?verlag");
    }
}

// Velage updaten

function verlageUpdate()
{
    if (isset($_POST['edit'])) {

        $verlag_name = $_POST['verlag'];
        $ort = $_POST['ort'];

        $sql = "UPDATE verlage SET Verlag_Name = '$verlag_name', Ort = '$ort' WHERE Verlag_ID = {$_GET['id']}";
        $result = query($sql);
        confirm($result);

        header("Location: index.php?verlag");
    }
}
