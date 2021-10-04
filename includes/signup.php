<?php
require_once 'database.php';
require_once 'constants.php';

App::VolumesSet();

if (App::Select1(SELECT_USER)){//($user) {
    $response = [
        "status" => false,
        "type" => ERROR_ON_INPUTS,
        "message" => "Пользователь с таким логином уже существует!",
        "fields" => ['login']
    ];

    echo json_encode($response);
    die();
}

$errorFields = [];

if ($data['login'] === '') {
    $errorFields[] = 'login';
}
if ($data['password'] === '') {
    $errorFields[] = 'password';
}
if ($data['full_name'] === '') {
    $errorFields[] = 'full_name';
}
if ($data['email'] === '' || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    $errorFields[] = 'email';
}
if ($data['password_confirm'] === '') {
    $errorFields[] = 'password_confirm';
}

if (!empty($errorFields)) {
    $response = [
        "status" => false,
        "type" => ERROR_ON_INPUTS,
        "message" => "Проверьте правильность полей",
        "fields" => $errorFields
    ];

    echo json_encode($response);
    $_SESSION['reg'] = false;
    die();
}

if ($data['password'] != $data['password_confirm']) {
    $response = [
        "status" => false,
        "type" => ERROR_ON_INPUTS,
        "message" => "Пароли не совпадают!",
        "fields" => ['password', 'password_confirm']
    ];
    $_SESSION['reg'] = false;
    echo json_encode($response);
}

if ($data['password'] === $data['password_confirm']) {

    $data['password'] = md5($data['password']);

    App::Insert(INSERT);

    $response = [
        "status" => true,
        "message" => "Регистрация прошла успешно!"
    ];

    echo json_encode($response);
}
?>