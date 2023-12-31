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

// ----------------------------------------------------------------- //
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
            <td>A.Nr-00{$row['Autor_ID']}</td>
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
        $autorVor = htmlspecialchars($_POST['autorVor']);
        $autorNam = htmlspecialchars($_POST['autorNam']);

        $sql = "INSERT INTO autoren (Autoren_Name, Autoren_Vorname) VALUES ('$autorNam', '$autorVor')";
        $result = query($sql);
        confirm($result);

        // set_message("Neuer Autor wurde eingefügt");
        header("Location: index.php?autoren");
    }
}

// ------------------------------------------------------------- //
// Tabelle von allen Bücher die wir haben 
function buchListe()
{
    $sql = "SELECT Signatur_ID, Titel, Verlag_Name, ISBN, Autoren_Name, Autoren_Vorname, Kategorie_Name 
    FROM bücher 
    INNER JOIN geschrieben ON Signatur = Signatur_ID 
    INNER JOIN verlage ON Verlag_Nr = Verlag_ID 
    INNER JOIN kategorien ON Kategorie = Kategorie_ID 
    INNER JOIN autoren ON Autor_ID = Autor_Nr
    GROUP BY 1
    ORDER BY Signatur_ID ASC;";
    $result = query($sql);
    confirm($result);

    $buch = '';

    foreach ($result as $row) {

        $buch .= <<<BUCH
        <tr>
            <td>B-10{$row['Signatur_ID']}</td>
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

        $titel = htmlspecialchars($_POST['titel']);
        $autor = $_POST['autoren'];
        $beschreibung = $_POST['beschreibung'];
        $kategorie = $_POST['kategorie'];
        $verlag = $_POST['verlag'];
        $isbn = htmlspecialchars($_POST['isbn']);
        $anzahl = htmlspecialchars($_POST['anzahl']);
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

        $titel = htmlspecialchars($_POST['titel']);
        $autor = $_POST['autor'];
        $beschreibung = $_POST['beschreibung'];
        $isbn = htmlspecialchars($_POST['isbn']);
        $kategorie = $_POST['kategorie'];
        $verlag = $_POST['verlag'];
        $anzahl = htmlspecialchars($_POST['anzahl']);
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

// ---------------------------------------------------------------//
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

// -------------------------------------------------------------- //
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
        <td>Kt.Nr-00{$kategorie['Kategorie_ID']}</td>
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
        $kategorie = htmlspecialchars($_POST['kategorie']);

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

// ------------------------------------------------------- //
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
                <td>V.Nr-0/{$verlag['Verlag_ID']}</td>
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
        $verlag = htmlspecialchars($_POST['verlag']);
        $ort = htmlspecialchars($_POST['ort']);

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

        $verlag_name = htmlspecialchars($_POST['verlag']);
        $ort = htmlspecialchars($_POST['ort']);

        $sql = "UPDATE verlage SET Verlag_Name = '$verlag_name', Ort = '$ort' WHERE Verlag_ID = {$_GET['id']}";
        $result = query($sql);
        confirm($result);

        header("Location: index.php?verlag");
    }
}

// ---------------------------------------------------------------- //
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
    $sql = "SELECT * FROM kunden";
    $result = query($sql);
    confirm($result);

    $kunden = '';

    foreach ($result as $row) {
        $kunden .= <<<KUNDEN
        <tr>
            <td>K-100{$row['Kunden_ID']}</td>
            <td>{$row['Vorname']}</td>
            <td>{$row['Name']}</td>
            <td>{$row['Straße']}</td>
            <td>{$row['PLZ']}</td>
            <td>{$row['Ort']}</td>            
            <td>{$row['Mail']}</td>
            <td>
            <form method="post" action="">
            <input type="submit" value="Löschen" class="btn btn-outline btn-sm">
            <input type='hidden' name='delete' value={$row['Kunden_ID']}>
            </td>
            <td>
            <a href="index.php?kundeUpdate&id={$row['Kunden_ID']}" class="btn btn-outline btn-sm"> Edit</a> 
            
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
        $vorname = htmlspecialchars($_POST['vorname']);
        $name = htmlspecialchars($_POST['name']);
        $plz = htmlspecialchars($_POST['plz']);
        $strasse = htmlspecialchars($_POST['strasse']);
        $ort = htmlspecialchars($_POST['ort']);
        $mail = htmlspecialchars($_POST['mail']);

        $sql = "UPDATE kunden SET Vorname = '$vorname', Name = '$name', PLZ = '$plz', Straße = '$strasse', Ort = '$ort', Mail = '$mail' WHERE Kunden_ID = {$_GET['id']}";
        $result = query($sql);
        confirm($result);

        header("Location: index.php?kunden");
    }
}

// Neuer Kunde 
function neueKunde()
{
    if (isset($_POST['Einfügen'])) {
        $vorname = htmlspecialchars($_POST['vorname']);
        $name = htmlspecialchars($_POST['name']);
        $plz = htmlspecialchars($_POST['plz']);
        $strasse = htmlspecialchars($_POST['strasse']);
        $ort = htmlspecialchars($_POST['ort']);
        $mail = htmlspecialchars($_POST['mail']);

        $sql = "INSERT INTO kunden (Name, Vorname, Straße, PLZ, Ort, Mail) VALUES ('$name', '$vorname', '$strasse', '$plz', '$ort', '$mail')";
        $result = query($sql);
        confirm($result);

        // set_message("Neue Kunde wurde eingefügt");
        header("Location: index.php?kunden");
    }
}

// ------------------------------------------------------------------------ //
// aufreise Tabelle 
function aufreiseTabelle()
{
    $sql = "SELECT * FROM ausleihen 
            INNER JOIN kunden ON Kunden_Nr = Kunden_ID
            INNER JOIN bücher ON Signatur_Nr = Signatur_ID
            ORDER BY Ausleih_Datum ASC;";
    $result = query($sql);
    confirm($result);

    $liste = '';

    foreach ($result as $row) {
        $datumA = date_format(date_create($row['Ausleih_Datum']), 'd-m-Y');
        $datumR = ($row['Rückgabe_Datum'] !== NULL) ? date_format(date_create($row['Rückgabe_Datum']), 'd-m-Y') : '';
        $liste .= <<<LIST
        <tr>
        <td>K-100{$row['Kunden_Nr']}</td>
        <td>{$row['Name']}</td>
        <td>{$row['Vorname']}</td>
        <td>{$row['Titel']}</td>
        <td>{$datumA}</td>
        <td>{$datumR}</td>
        <td>
        <form method="post" action="">
        <input type="submit" value="Zurück" class="btn btn-outline btn-sm">
        <input type="hidden" name="rueckgabe" value="{$row['Ausleih_ID']}">
        </form>
        </td>
        </tr>
        LIST;

        
        $datum = date('Y-m-d');

        if (isset($_POST['rueckgabe'])) {
            $ausleihId = $_POST['rueckgabe'];

            $sql = "UPDATE ausleihen SET Rückgabe_Datum = '$datum', Rückgabe_Status = true WHERE Ausleih_ID = $ausleihId;";
            $result = query($sql);
            confirm($result);

            $sql = "SELECT Signatur_Nr FROM ausleihen WHERE Ausleih_ID = $ausleihId";
            $result = query($sql);
            confirm($result);
            
            foreach($result as $signatur){
                $signatur = $signatur['Signatur_Nr'];
            }

            $sql = "UPDATE bücher SET Anzahl = Anzahl + 1 WHERE Signatur_ID = '$signatur';";
            $result = query($sql);
            confirm($result);
            // var_dump($sql);
            header("Location: index.php?aufreise");
            exit();
        }
    }



    echo $liste;
}

// Kunden ID
function kundeNr()
{

    $sql = "SELECT Kunden_ID FROM kunden;";
    $result = query($sql);
    confirm($result);

    $kunden_id = '';

    foreach ($result as $kn) {
        $kunden_id .= <<<NUM
        echo "<option value='{$kn['Kunden_ID']}'>K-100{$kn['Kunden_ID']}</option>";
        NUM;
    }
    echo $kunden_id;
}

// ferfügbares Bücher
function buchLei()
{

    $sql = "SELECT * FROM bücher;";
    $result = query($sql);
    confirm($result);

    $buecher = '';

    foreach ($result as $buch) {
        if ($buch['Anzahl'] > 0) {
            $buecher .= <<<BUCH
            <option value='{$buch['Signatur_ID']}'>{$buch['Titel']}</option>
            BUCH;
        }
    }
    echo $buecher;
}

// Buch ausleihen
function ausleihen()
{
    if (isset($_POST['verleihen'])) {
        $knNr = $_POST['kundennummer'];
        $titel = $_POST['buch'];
        $tag = $_POST['start'];

        $sql = "INSERT INTO ausleihen (Kunden_Nr, Ausleih_Datum, Signatur_Nr) 
        SELECT k.Kunden_ID, '$tag', b.Signatur_ID
        FROM kunden k
        JOIN bücher b ON b.Signatur_ID = '$titel'
        WHERE k.Kunden_ID = '$knNr';
        UPDATE bücher SET Anzahl = Anzahl -1 WHERE Signatur_ID = '$titel';";

        $result = query($sql);
        confirm($result);

        header('Location: index.php?aufreise');
    }
}

// ------------------------------------------------------------------------------------------ //
// Kontakte formular
function kontaktFormular()
{
    if (isset($_POST['submit'])) {
        $name = htmlspecialchars($_POST['Name']);
        $email = htmlspecialchars($_POST['email']);
        $nachricht = htmlspecialchars($_POST['nachricht']);

        $sql = "INSERT INTO kontakte (Name, email, nachricht) VALUES ('$name', '$email', '$nachricht');";
        $result = query($sql);
        confirm($result);

        header("Location: index.php");
    }
}

// Nachrichten lesen
function nachrichtenLesen()
{
    $sql = "SELECT * FROM kontakte ORDER BY id DESC;";
    $result = query($sql);
    confirm($result);

    $nachrichten = '';

    foreach ($result as $nachricht) {

        $datum = date_format(date_create($nachricht['datum']), 'd-m-Y H:i');
        $nachrichten .= <<<NACH
        <tr>
            <td>{$nachricht['Name']}</td>
            <td>{$nachricht['email']}</td>
            <td>{$nachricht['nachricht']}</td>
            <td>{$datum}</td>
        </tr>
        NACH;
    }
    echo $nachrichten;
}

// -------------------------------------------------- //
// Mitarbeiter Liste
function mitarbeiterListe(){

    $sql = "SELECT * FROM beschäftigte;";
    $result = query($sql);
    confirm($result);

    $mitarbeiter = '';

    foreach($result as $mitarbeitern){
        $mitarbeiter .= <<<MIT
        <tr>
            <td>100{$mitarbeitern['Mitarbeiter_Nr']}</td>
            <td>{$mitarbeitern['Name']}</td>
            <td>{$mitarbeitern['Vorname']}</td>
            <td>{$mitarbeitern['Ort']}</td>
            <td>{$mitarbeitern['Email']}</td>
            <td>{$mitarbeitern['Role']}</td>
            <td>
                <form method="post" action="">
                    <input type="submit" value="Löschen" class="btn btn-outline btn-sm">
                    <input type="hidden" name="delete" value="{$mitarbeitern['Mitarbeiter_Nr']}">
                </form>
            </td>
        </tr>
        MIT;
    }
    echo $mitarbeiter;
}

// Mitarbeiter löschen
function mitarbeiterLoeschen(){
    if(isset($_POST['delete'])){
        $mitarbeiterNr = $_POST['delete'];

        $sql = "DELETE FROM beschäftigte WHERE Mitarbeiter_Nr = $mitarbeiterNr;";
        $result = query($sql);
        confirm($result);

        header("Location: index.php?mitarbeiter");
    }
}

// Mitarbeiter hinzufügen
function mitarbeiterNeue(){

    if(isset($_POST['Einfügen'])){
        $name = htmlspecialchars($_POST['name']);
        $vorname = htmlspecialchars($_POST['vorname']);
        $ort = htmlspecialchars($_POST['ort']);
        $user = htmlspecialchars($_POST['username']);
        $pass = htmlspecialchars($_POST['pass']);
        $email = htmlspecialchars($_POST['mail']);
        $role = htmlspecialchars($_POST['role']);
        $extra = ['cost' => 10];
        $hash = password_hash($pass, PASSWORD_ARGON2I, $extra);

        $sql = "INSERT INTO beschäftigte (Name, Vorname, Ort, Username, Passwort, Email, Role) VALUES ('$name', '$vorname', '$ort', '$user', '$hash', '$email', '$role');";
        $result = query($sql);
        confirm($result);

        header("Location: index.php?mitarbeiter");
    }
}

