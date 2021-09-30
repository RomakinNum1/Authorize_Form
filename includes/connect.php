<?php

    //$connect = mysqli_connect('test', 'root', '', 'user_accaunts');
    $connect = new PDO('mysql:host=localhost;dbname=user_accaunts', 'root', '');

    if(!isset($connect)){
        die('Error connect to DataBase');
    }

    function authorise_connect($login, $password, $connect)
    {
        return $connect->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    }

    function check_login_connect($login, $connect)
    {
        return $connect->query("SELECT * FROM `users` WHERE `login` = '$login'");
    }

    function insert_connect($full_name, $email, $login, $password, $path, $connect)
    {
        return $connect->prepare("INSERT INTO `users` (`id`, `FIO`, `email`, `login`, `password`, `avatar`) 
        VALUES (NULL, '$full_name', '$email', '$login', '$password', '$path')");
    }