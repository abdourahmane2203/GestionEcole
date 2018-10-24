<?php
require_once 'include/functions.php';
logged_only();
$codeEleve = $_GET['code'];
require_once 'include/db.php';
$req = $db->prepare("DELETE FROM client WHERE id_eleve=?");

$req->execute([$codeEleve]);
header('location: ListeUtilisateurs.php');