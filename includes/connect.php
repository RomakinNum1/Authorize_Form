<?php

//$connect = mysqli_connect('test', 'root', '', 'user_accaunts');
$config = require_once "configDB.php";

$connect = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbName'], $config['username'], $config['password']);

if (!isset($connect)) {
    die('Error connect to DataBase');
}