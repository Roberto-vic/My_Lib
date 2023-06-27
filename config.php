<?php 

ob_start();
session_start();

defined('DS') ? null : define("DS", "/");

defined('FRONT_END') ? null : define('FRONT_END', __DIR__ . DS . 'template/frontend');

defined('BACK_END') ? null : define('BACK_END', __DIR__ . DS . 'template/backend');

defined('IMG_UPLOAD') ? null : define('IMG_UPLOAD', __DIR__ . DS . 'assets/img_art');

// Ich definiere di costanten für das verbindung mit Database
// define('DB_HOST', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASS', '');
// define('DB_NAME', '');

// $dbh = 'mysql:host= '. DB_HOST . ';dbname= ' . DB_NAME ;
// $connect = new PDO($dbh, DB_USER, DB_PASS);


require_once('functions.php');