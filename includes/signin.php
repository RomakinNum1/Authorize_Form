<?php
    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = md5($_POST['password']);
    global $connect;

    $check = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

    if(mysqli_num_rows($check) > 0){
        $user = mysqli_fetch_assoc($check);

        $_SESSION['user'] = [
            'id' => $user['id'],
            'full_name' => $user['FIO'],
            'avatar' => $user['avatar'],
            'email' => $user['email']
        ];

        header('Location: ../profile.php');

    }else{
        $_SESSION['message'] = 'Неверный логин или пароль!';
        header('Location: ../authorise.php');
    }