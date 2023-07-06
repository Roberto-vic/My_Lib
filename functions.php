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

// Neuer Autor 
function neueAutor()
{
    if (isset($_POST['Add'])) {
        $autorVor = $_POST['autorVor'];
        $autorNam = $_POST['autorNam'];

        $sql = "INSERT INTO autoren (Autoren_Name, Autoren_Vorname) VALUES ('$autorNam', '$autorVor')";
        $result = query($sql);
        confirm($result);

        // set_message("Neuer Autor wurde eingefügt");
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
            <td><a href="index.php?buchUpdate&id={$row['Signatur_ID']}" class="btn btn-outline btn-sm" role="button">Edit</a></td>
            <td>
            <form action="" method="post">
            <input type="submit" value="Löschen" class="btn btn-outline btn-sm"> 
            <input type='hidden' name='delete' value = {$row['Signatur_ID']}>
            </form>
            </td>
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

// buch editieren 
function buchUpdate()
{

    if (isset($_POST['edit'])) {

        $titel = $_POST['titel'];
        $autor = $_POST['autor'];
        $beschreibung = $_POST['beschreibung'];
        $isbn = $_POST['isbn'];
        $kategorie = $_POST['kategorie'];
        $verlag = $_POST['verlag'];
        $anzahl = $_POST['anzahl'];
        $bild = $_FILES['bilder']['name'];
        $tmp_bild = $_FILES['bilder']['tmp_name'];

        if (empty($bild)) {
            $sql = "SELECT Bilder FROM bücher WHERE Signatur_ID = {$_GET['id']};";
            $result = query($sql);
            confirm($result);

            $bilder = $result;

            foreach ($bilder as $bild) {
                $bild = $bild['Bilder'];
            }
        }
        move_uploaded_file($tmp_bild, IMG_UPLOADS . DS . $bild);

        if (empty($verlag)) {
            $sql = "SELECT Verlag_Nr FROM bücher WHERE Signatur_ID = {$_GET['id']};";
            $result = query($sql);
            confirm($result);

            $verlage = $result;

            foreach ($verlage as $verlag) {
                $verlag = $verlag['Verlag_Nr'];
            }
        }

        if (empty($kategorie)) {
            $sql = "SELECT Kategorie FROM bücher WHERE Signatur_ID = {$_GET['id']};";
            $result = query($sql);
            confirm($result);

            $kategorien = $result;

            foreach ($kategorien as $kategorie) {
                $kategorie = $kategorie['Kategorie'];
            }
        }

        if (empty($autor)) {
            $sql = "SELECT Autor_Nr FROM geschrieben WHERE Signatur = {$_GET['id']};";
            $result = query($sql);
            confirm($result);

            $autoren = $result;

            foreach ($autoren as $autor) {
                $autor = $autor['Autor_Nr'];
            }
        }

        $sql = "UPDATE bücher 
        SET Titel = '$titel', Beschreibung = '$beschreibung', Anzahl = '$anzahl', ISBN = '$isbn', 
            Bilder = '$bild', Kategorie = (SELECT Kategorie_ID FROM kategorien WHERE Kategorie_ID = '$kategorie'), 
            Verlag_Nr = (SELECT Verlag_ID FROM verlage WHERE Verlag_ID = '$verlag')
        WHERE Signatur_ID = {$_GET['id']};";

        $result = query($sql);
        confirm($result);

        $sql = "UPDATE geschrieben 
        SET Autor_Nr = (SELECT Autor_ID FROM autoren WHERE Autor_ID = '$autor')
        WHERE Signatur = {$_GET['id']};";

        $result = query($sql);
        confirm($result);

        header("Location: index.php?buecher");
    }
}

// Buch löschen
function buchDelete()
{
    if (isset($_POST['delete'])) {

        $sql = "DELETE FROM bücher WHERE Signatur_ID = {$_POST['delete']};";
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
    $maxLenght = 400;
    foreach ($result as $row) {
        $beschreibung = substr($row['Beschreibung'], 0, $maxLenght);
        $beschreibung .= '...';
        $buch .= <<<BUCH
        <div class="card shadow me-1" style="width: 18rem;">
            <img src="./assets/img_art/{$row['Bilder']}" class="card-img-top mx-3" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{$row['Titel']}</h5>
                    <p class="card-text">{$beschreibung}</p>
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

// Kunden Liste
function kunden()
{
    $sql = "SELECT Kunden_ID, Vorname, Name, PLZ, Straße, Ort FROM kunden";
    $result = query($sql);
    confirm($result);

    $kunden = '';

    foreach ($result as $row) {
        $kunden .= <<<KUNDEN
        <option value="{$row['Kunden_ID']}">{$row['Vorname']} {$row['Name']} {$row['PLZ']} {$row['Straße']} {$row['Ort']} </option>
        KUNDEN;
    }

    echo $kunden;
}


// Kunden Tabelle
function kundenTabelle()
{
    $sql = "SELECT Kunden_ID, Vorname, Name, PLZ, Straße, Ort FROM kunden";
    $result = query($sql);
    confirm($result);

    $kunden = '';

    foreach ($result as $row) {
        $kunden .= <<<KUNDEN
        <tr>
            <td>{$row['Kunden_ID']}</td>
            <td>{$row['Vorname']}</td>
            <td>{$row['Name']}</td>
            <td>{$row['Straße']}</td>
            <td>{$row['PLZ']}</td>
            <td>{$row['Ort']}</td>
            <td>
            <form method="post" action="">
            <input type="submit" value="Löschen" class="btn btn-outline btn-sm">
            <input type='hidden' name='delete' value={$row['Kunden_ID']}>
            <a href="index.php?kundeUpdate&id={$row['Kunden_ID']}" class="btn btn-outline btn-sm"><i class="fa-solid fa-xs fa-pencil" style="color: #e56815;"></i> Edit</a> 
            
            </form>
            </td>
        </tr>
        KUNDEN;
    }

    echo $kunden;
}

// Kunde löschen
function kundeLoschen()
{
    if (isset($_POST['delete'])) {
        $kunId = $_POST['delete'];
        $sql = "DELETE FROM kunden WHERE Kunden_ID = $kunId";
        $result = query($sql);
        confirm($result);

        // set_message("Kunde wurde gelöscht");
        header("Location: index.php?kunden");
    }
}

// Update Kunde
function kundeUpdate()
{
    if (isset($_POST['update'])) {
        $vorname = $_POST['vorname'];
        $name = $_POST['name'];
        $plz = $_POST['plz'];
        $strasse = $_POST['strasse'];
        $ort = $_POST['ort'];

        $sql = "UPDATE kunden SET Vorname = '$vorname', Name = '$name', PLZ = '$plz', Straße = '$strasse', Ort = '$ort' WHERE Kunden_ID = {$_GET['id']}";
        $result = query($sql);
        confirm($result);

        header("Location: index.php?kunden");
    }
}

// Neuer Kunde 
function neueKunde()
{
    if (isset($_POST['Einfügen'])) {
        $vorname = $_POST['vorname'];
        $name = $_POST['name'];
        $plz = $_POST['plz'];
        $strasse = $_POST['strasse'];
        $ort = $_POST['ort'];

        $sql = "INSERT INTO kunden (Name, Vorname, Straße, PLZ, Ort) VALUES ('$name', '$vorname', '$strasse', '$plz', '$ort')";
        $result = query($sql);
        confirm($result);

        // set_message("Neue Kunde wurde eingefügt");
        header("Location: index.php?kunden");
    }
}
// Such Funktion in Arbeit.


// aufreise Tabelle 
function aufreiseTabelle(){
    $sql = "SELECT * FROM ausleihen 
            INNER JOIN kunden ON Kunden_Nr = Kunden_ID
            INNER JOIN bücher ON Signatur_Nr = Signatur_ID;";
    $result = query($sql);
    confirm($result);

    if(isset($_POST['rueckgabe'])){
        $sql = "INSERT INTO ausleihen VALUE ";
    }

    $liste = '';

    foreach($result as $row){
        $liste .= <<<LIST
            <tr>
                <td>{$row['Kunden_Nr']}</td>
                <td>{$row['Name']}</td>
                <td>{$row['Vorname']}</td>
                <td>{$row['Titel']}</td>
                <td>{$row['Ausleih_Datum']}</td>
                <td>{$row['Rückgabe_Datum']}</td>
                <td>
                <a href="" class="btn btn-outline btn-sm"><i class="fa-solid fa-xs fa-pencil" style="color: #e56815;"></i> Zurück</a>
                <input type="hidden" name="rueckgabe" value="{$row['Kunden_Nr']}">
                </td>
            </tr>
        LIST;
    }

    echo $liste;
}