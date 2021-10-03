<?php
require_once 'database.php';
require_once 'constants.php';

//$login = $_POST['login'];
//$password = $_POST['password'];
global $connect;

App::VolumesSet();

$error_fields = [];

if ($data['login'] === '') {
    $error_fields[] = 'login';
}
if ($data['password'] === '') {
    $error_fields[] = 'password';
}
if (!empty($error_fields)) {
    $response = [
        "status" => false,
        "type" => ERROR_ON_INPUTS,
        "message" => "Проверьте правильность полей",
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();
}
$data = App::Select(SELECT_USER_PASSWORD);

if ($data > 0) {
    //$user = $check->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user'] = [
        'id' => $data['id'],
        'full_name' => $data['FIO'],
        'email' => $data['email']
    ];

    $response = [
        "status" => true
    ];

} else {
    $response = [
        "status" => false,
        "message" => "Неверный логин или пароль"
    ];
}
echo json_encode($response);