<?php
require_once 'include/functions.php';
logged_only();
require_once 'include/db.php';
$id = $_GET['id'];
$ps = $db->prepare("UPDATE client SET status_eleve=? WHERE id_eleve=?");
$status_eleve= "Inscrit";
$ps->execute([$status_eleve, $id]);
header('location: listeUtilisateurs.php');