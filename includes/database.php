<?php
session_start();
require_once 'connect.php';

global $connect;

class App
{
    static function Volumes()
    {
        global $data;
        $data = $_POST;
    }

    static function SelectLogin($login)
    {
        global $data;
        global $connect;
        $checkLogin = $connect->prepare("SELECT * FROM `users` WHERE login = :login");
        $checkLogin->execute(array(':login' => $data['login']));
        $user = $checkLogin->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    static function SelectLoginAndPassword($login, $password)
    {
        global $data;
        global $connect;
        $password = md5($password);
        $check = $connect->prepare("SELECT * FROM `users` WHERE login = :login AND password = :password");
        $check->execute(array(':login' => $login, ':password' => $password));
        $user = $check->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    static function Insert()
    {
        global $data;
        global $connect;
        $state = $connect->prepare("INSERT INTO `users` (`id`, `FIO`, `email`, `login`, `password`, `avatar`) 
        VALUES (NULL, :full_name, :email, :login, :password, :avatar)");

        $state->execute(array('full_name' => $data['full_name'], 'email' => $data['email'], 'login' => $data['login'],
            'password' => $data['password'], 'avatar' => $data['path']));
    }
}
