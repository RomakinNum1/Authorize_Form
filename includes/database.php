<?php
session_start();
require_once 'connect.php';

global $connect;

class App
{
    static function VolumesSet()
    {
        global $data;
        $data = $_POST;
    }

    static function Select($sql)
    {
        global $data;
        global $connect;
        $data['password'] = md5($data['password']);
        $checkLogin = $connect->prepare($sql);
        $checkLogin->execute($data);
        $user = $checkLogin->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    static function Select1($sql)
    {
        global $data;
        global $connect;
        $checkLogin = $connect->prepare($sql);
        $checkLogin->execute(array(':login' => $data['login']));
        $user = $checkLogin->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    static function Insert($sql)
    {
        global $data;
        global $connect;
        $state = $connect->prepare($sql);

        $state->execute($data);
    }
}
