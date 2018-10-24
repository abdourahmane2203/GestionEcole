<?php
    require_once('include/functions.php');
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
    <link href="css/myStyle.css" rel="stylesheet">

    <title>Gestion d'ecole</title>

    <!-- Bootstrap core CSS -->

    <!-- Custom styles for this template -->
    <link href="navbar-top-fixed.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-fixed-top">
    <a class="navbar-brand" href="#">Gestion d'ecole</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="login.php">Home <span class="sr-only">(current)</span></a>


            <li class="nav-item">
                <a class="nav-link " href="login.php">Connexion</a>
            </li>

        </ul>

    </div>
    </nav>

    <div class="container spacer">
        <br><br><br>
        <?php if (isset($_SESSION['flash'])) : ?>

            <?php foreach($_SESSION['flash'] as $type => $message): ?>
                <div class="alert alert-<?= $type;?>">
                    <?= $message; ?>
                </div>
             <?php endforeach; ?>
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>
    </div>