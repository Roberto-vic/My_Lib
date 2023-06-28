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

function buchListe(){
    $sql = "SELECT * FROM bücher";
    $result = query($sql);
    confirm($result);

    while($row = fetch_array($result)){
        $buch = <<<DELIMETER
        <tr>
            <td>{$row['Signatur']}</td>
            <td>{$row['Titel']}</td>
            <td>{$row['Autor_Nr']}</td>
            <td>{$row['Kategorie']}</td>
            <td>{$row['Verlag']}</td>
            <td>{$row['ISBN']}</td>
            <td><a href="index.php?edit_buch&id={$row['Signatur']}">Edit</a></td>
            <td><a href="index.php?delete_buch&id={$row['Signatur']}">Delete</a></td>
        </tr>
        DELIMETER;
    }
}