<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /index.php');
}
require_once "temp/profile-temp.html";
?>
