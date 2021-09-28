<?php

    $connect = mysqli_connect("test", "root", "", "user_accaunts");
    if(!$connect){
        die('Error connect to DataBase');
    }