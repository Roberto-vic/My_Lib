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

function fetch_array($result){
    global $dbh;

    return mysqli_fetch_array($result);
}


function showProduct($sql){
    global $dbh;

    $showBook = query("SELECT * FROM bucher");
}