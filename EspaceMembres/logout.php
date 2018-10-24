<?php
session_start();
unset($_SESSION['auth']);
$_SESSION['flash']['success'] = "Vous etes maintenant déconnecté";
//session_destroy();
header('location: login.php');