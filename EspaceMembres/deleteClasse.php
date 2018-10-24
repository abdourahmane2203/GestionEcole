<?php
require_once 'include/functions.php';
logged_only();
$codeProd = $_GET['code'];
require_once 'include/db.php';
$req = $db->prepare("DELETE FROM classe WHERE id_classe=?");

$req->execute([$codeProd]);
header('location: ListeClasses.php');