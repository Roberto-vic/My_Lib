<?php 

ob_start();
session_start();

defined('DS') ? null : define("DS", "/");

defined('FRONT_END') ? null : define('FRONT_END', __DIR__ . DS . 'template/frontend');

defined('BACK_END') ? null : define('BACK_END', __DIR__ . DS . 'template/backend');

defined('IMG_UPLOADS') ? null : define('IMG_UPLOADS', __DIR__ . DS . 'assets/img_art');

$dbh = new PDO("mysql:dbname=projekt_realitätspause;host=localhost", 'root', '');

try{
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $dbh->exec($sql);

    // echo "Du bist verbunden.";
}catch(PDOException $e){
    echo $e->getMessage();
}


require('functions.php');