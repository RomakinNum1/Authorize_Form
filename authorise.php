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
</head>
<body>

    <form action="includes/signin.php" method="post">
        <label>Логин</label>
        <input type ="text" name ='login' placeholder="Введите логин">
        <label>Пароль</label>
        <input type ="password" name='password' placeholder="Введите пароль">
        <button type="submit">Войти</button>
        <p>
            <a href="/register.php">Регистрация</a>
        </p>
        <?php
        if($_SESSION['message'])
        {
            echo '<p class="message"> ' . $_SESSION['message'] . ' </p>';
        }
        unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>
