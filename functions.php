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

function buchListe() {
    $sql = "SELECT * FROM bücher";
    $result = query($sql);
    confirm($result);

    $buch = "";

    foreach($result as $inhalt) {
        echo "<tr>" .
        "<td>{$inhalt['Signatur']}</td>" .
        "<td>{$inhalt['Titel']}</td>" . 
        "<td>{$inhalt['Autor_Nr']}</td>" . 
        "<td>{$inhalt['Kategorie']}</td>" .
        "<td>{$inhalt['Verlag']}</td>".
        "<td>{$inhalt['Anzahl']}</td>".
        "<td></td>
        </tr>";
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