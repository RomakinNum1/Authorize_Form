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
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <form>
        <label>Выберите действие</label>
        <button formaction= 'register.php'>Регистрация</button>
        <button formaction= '/authorise.php'>Авторизация</button>
    </form>
</body>
</html>

