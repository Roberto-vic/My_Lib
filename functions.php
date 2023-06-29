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

function escape_string($string)
{
    global $dbh;

    return $dbh->quote($string);
}

function last_id()
{
    global $dbh;

    return $dbh->lastInsertId();
}

function buchListe()
{
    $sql = "SELECT Signatur_ID, Titel, Kategorie_Name, Verlag_Name, ISBN, Autoren_Name, Autoren_Vorname
    FROM bücher
    INNER JOIN geschrieben ON Signatur = Signatur_ID
    INNER JOIN kategorien ON Kategorie = Kategorie_ID
    INNER JOIN autoren ON Autor_ID = Autor_Nr
    INNER JOIN verlage ON Verlag_ID = Verlag_Nr;";
    $result = query($sql);
    confirm($result);

    $buch = '';

    foreach ($result as $row) {
        
        $buch .= <<<BUCH
        <tr>
            <td>{$row['Signatur_ID']}</td>
            <td>{$row['Titel']}</td>
            <td>{$row['Autoren_Name']} . {$row['Autoren_Vorname']}</td>
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
        $kategorie = escape_string($_POST['kategorie']);

        $sql = "INSERT INTO kategorien (Kategorie_Name) VALUES ($kategorie)";
        $result = query($sql);
        confirm($result);

        header("Location: index.php?kategorie");
    }
}

// Kategorie löschen
function deleteKat()
{

    // echo "OK";

    if (isset($_POST['delete'])) {

        $katID = $_POST['delete'];

        $sql = "DELETE FROM kategorien WHERE Kategorie_ID = $katID";
        $result = query($sql);
        confirm($result);

        header("Location: index.php?kategorie");
    }
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
            <input type='hidden' name='delete' value = {$verlag['Verlag_ID']}>
            <a href='index.php?verlagUpdate' name="edit" class="btn btn-outline btn-sm">Edit</a> 
            <input type='hidden' name='edit' value = {$verlag['Verlag_ID']}>
            </form>
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
        $verlag = escape_string($_POST['verlag']);
        $ort = escape_string($_POST['ort']);

        $sql = "INSERT INTO verlage (Verlag_Name, Ort) VALUES ($verlag, $ort)";
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
    // $sql = "UPDATE verlage SET Verlag_Name = VerlagName, Ort = ort WHERE Verlag_ID";
    // $result = query($sql);
    // confirm($result);

    if(isset($_POST['Verlag_id'])){
        $verlagID = $_POST['Verlag_id'];
        $verlagName = $_POST['VerlagName'];
        $ort = $_POST['ort'];

        $sql = "UPDATE verlage SET Verlag_Name = $verlagName, Ort = $ort WHERE Verlag_ID = $verlagID";
        $result = query($sql);
        confirm($result);

        header("Location: index.php?verlage");
    }
}
