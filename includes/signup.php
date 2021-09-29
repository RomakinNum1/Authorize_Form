<?php
    session_start();
    require_once 'connect.php';
    global $connect;

    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if($password === $password_confirm)
    {
        $path = 'uploads/' . time() . $_FILES['avatar']['name'];
        if($_FILES['avatar']['name']) {
            if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
                $_SESSION['message'] = 'Ошибка при загрузке изображения';
                header('Location: ../register.php');
            }
        }
        else $path = null;

        if($full_name == NULL)
        {
            $_SESSION['message'] = 'Введите ФИО!';
            header('Location: ../register.php');
        }
        else if($login == NULL)
        {
            $_SESSION['message'] = 'Введите логин!';
            header('Location: ../register.php');
        }
        else if($email == NULL)
        {
            $_SESSION['message'] = 'Введите почту!';
            header('Location: ../register.php');
        }
        else if($password == NULL)
        {
            $_SESSION['message'] = 'Введите логин!';
            header('Location: ../register.php');
        }
        else {
            $password = md5($password);

            mysqli_query($connect, "INSERT INTO `users` (`id`, `FIO`, `email`, `login`, `password`, `avatar`) 
        VALUES (NULL, '$full_name', '$email', '$login', '$password', '$path')");

            $_SESSION['message'] = 'Регистрация прошла успешно!';
            header('Location: ../authorise.php');
        }
    }
    else{
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../register.php');
    }
?>