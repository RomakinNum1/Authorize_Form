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
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

    <form action="includes/signup.php" method="post" enctype="multipart/form-data">
        <label>ФИО</label>
        <input type ="text" name ="full_name" placeholder="Введите ФИО">
        <label>Почта</label>
        <input type ="email" name="email" placeholder="Введите адрес электронной почты">
        <label>Изображение профиля</label>
        <input type ="file" name="avatar">
        <label>Логин</label>
        <input type ="text" name="login" placeholder="Введите логин">
        <label>Пароль</label>
        <input type ="password" name="password" placeholder="Введите пароль">
        <label>Подтвердите пароль</label>
        <input type ="password" name="password_confirm" placeholder="Введите пароль">
        <button type="submit">Зарегистрироваться</button>
        <p>
            <a href="/authorise.php">Авторизоваться</a>
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
