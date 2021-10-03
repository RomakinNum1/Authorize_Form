<?php

const ERROR_ON_INPUTS = 1;

const SELECT_USER = "SELECT * FROM `users` WHERE login = :login";
const SELECT_USER_PASSWORD = "SELECT * FROM `users` WHERE login = :login AND password = :password";
const INSERT = "INSERT INTO `users` (`id`, `FIO`, `email`, `login`, `password`, `avatar`) 
        VALUES (NULL, :full_name, :email, :login, :password, :avatar)";
