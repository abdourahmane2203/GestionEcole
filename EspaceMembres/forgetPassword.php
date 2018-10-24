<?php
require_once 'include/db.php';
if(!empty($_POST)){
$login = $_POST['login'];
if(!empty($_POST['mdp']) && !empty($_POST['mdp-confirm']) && $_POST['mdp'] == $_POST['mdp-confirm']){
    $pass = $_POST['mdp'];
    $ps = $db->prepare("UPDATE admin SET mdp=? WHERE login=?");
    $ps->execute([$pass, $login]);
    session_start();
    $_SESSION['flash']['success'] =  'Votre mot de passe a été modifié';
    header('location: login.php');
    exit();
}

else {
    session_start();
    $_SESSION['flash']['danger'] =  'Verifier les mots de passes que vous avez saisi';
}
}
require_once 'include/header.php';
?>

<div class="container col-md-4 col-xs-12 col-md-offset-3 spacer">
    <div class="panel panel-default">
        <div class="panel-heading">Modifier mon mot de passe</div>

        <div class="panel-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="login" class="control-label">Votre login : </label>
                    <input type="text" name="login" class="form-control" id="login">
                </div>

                <div class="form-group">
                    <label for="mdp" class="control-label">Nouveau mot de passe : </label>
                    <input type="password" name="mdp" class="form-control" id="mdp">

                </div>
                <div class="form-group">
                    <label for="mdp" class="control-label">Confirmer le mot de passe : </label>
                    <input type="password" name="mdp-confirm" class="form-control" id="mdp-confirm">

                </div>
                <div>
                    <button class="btn btn-primary">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>
