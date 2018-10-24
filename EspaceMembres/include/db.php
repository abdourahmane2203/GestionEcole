<?php
$db = new PDO('mysql:dbname=gestionecole;host=localhost', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //generer les exception en ca des erreurs
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); //pour recuperer les champs sous forme d'objets.