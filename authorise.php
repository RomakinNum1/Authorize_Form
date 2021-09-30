<?php
session_start();

if($_SESSION['user'])
{
    header('Location: profile.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/main.css">
    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
</head>
<body>

    <form>
        <label>Логин</label>
        <input type ="text" name ='login' placeholder="Введите логин">
        <label>Пароль</label>
        <input type ="password" name='password' placeholder="Введите пароль">
        <button type="submit" class = "login-btn">Войти</button>
        <p>
            <a href="/register.php">Регистрация</a>
        </p>
        <p class="message none">lol</p>


    </form>
    <script src = "js/main.js"></script>

</body>
</html>
