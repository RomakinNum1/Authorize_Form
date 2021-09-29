<?php
session_start();
if(!$_SESSION['user'])
{
    header('Location: /index.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Профиль</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

    <form>
        <img src="<?=$_SESSION['user']['avatar']?>" width="100" alt =''>
        <h2 style="margin: 10px 0;"><?= $_SESSION['user']['full_name']?></h2>
        <a href='#'><?=$_SESSION['user']['email']?></a>
        <a class = "logout" href="/includes/logout.php">Выход</a>
    </form>

</body>
</html>
