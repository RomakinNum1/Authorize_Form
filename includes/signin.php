<?php
    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = $_POST['password'];
    global $connect;

    $error_fields =[];

    if($login === '')
    {
        $error_fields[] = 'login';
    }
    if($password === '')
    {
        $error_fields[] = 'password';
    }
    if(!empty($error_fields))
    {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Проверьте правильность полей",
            "fields" => $error_fields
        ];

        echo json_encode($response);

        die();
    }


    $password = md5($password);
    $check = authorise_connect($login, $password, $connect);

    $user = $check->fetch(PDO::FETCH_ASSOC);
    $check->execute();
    if($check->fetchColumn() > 0){
        //$user = $check->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user'] = [
            'id' => $user['id'],
            'full_name' => $user['FIO'],
            'avatar' => $user['avatar'],
            'email' => $user['email']
        ];

        $response = [
            "status" => true
        ];

        //header('Location: ../profile.php');
        echo json_encode($response);

    }else{
        //$_SESSION['message'] = 'Неверный логин или пароль!';
        //header('Location: ../authorise.php');

        $response = [
            "status" => false,
            "message" => "Неверный логин или пароль"
        ];
        echo json_encode($response);
    }