<?php
session_start();

if ($_SESSION['user']) {
    header('Location: profile.php');
}

require_once "temp/index-temp.html";
?>



