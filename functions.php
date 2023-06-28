<?php

function query($sql){
    global $dbh;

    return $dbh->query($sql);
}

function confirm($result){
    global $dbh;

    if(!$result){
        die("Query failed" . $dbh->errorInfo());
    }
}

function escape_string($string){
    global $dbh;

    return $dbh->quote($string);
}

function fetch_array($result){
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function last_id(){
    global $dbh;

    return $dbh->lastInsertId();
}

function buchListe()
{
    $sql = "SELECT b.Signatur, b.Titel, k.Kategorie_Name, b.Verlag, b.ISBN, a.name, a.vorname
            FROM bücher b
            INNER JOIN geschrieben g ON b.Signatur = g.Signatur
            INNER JOIN kategorie k ON b.Kategorie = k.Kategorie_ID
            INNER JOIN autoren a ON g.Autor_Nr = a.Autor_ID";
    $result = query($sql);
    confirm($result);

    $buch = '';

    foreach ($result as $row) {

        var_dump($buch);
        die();
        $buch .= <<<BUCH
        <tr>
            <td>{$row['Signatur']}</td>
            <td>{$row['Titel']}</td>
            <td>{$row['name']} . {$row['vorname']}</td>
            <td>{$row['Kategorie_Name']}</td>
            <td>{$row['Verlag']}</td>
            <td>{$row['ISBN']}</td>
            <td><a href="index.php?buchupdate&id={$row['Signatur']}" class="btn btn-outline btn-sm">Edit</a></td>
            <td><a href="index.php?delete_buch&id={$row['Signatur']}" class="btn btn-outline btn-sm">Delete</a></td>
        </tr>
        BUCH;
    }

    echo $buch;
}



function kategorie(){
    $sql = "SELECT * FROM Kategorie";
    $result = query($sql);
    confirm($result);

    $kategorien = '';

   while($row = fetch_array($result)){

    var_dump($row);
    die();

    $kategorien .= <<<KATEGORIE
    <tr>
        <td>{$row['Kategorie_ID']}</td>
        <td>{$row['Kategorie_Name']}</td>
        <td>
        <a href="" class="btn btn-outline btn-sm"><i class="fa-regular fa-trash-can fa-xs"  style="color: #e56815;"></i> Delete</a>
        </td>
    </tr>
    KATEGORIE;
   }

   echo $kategorien;
}