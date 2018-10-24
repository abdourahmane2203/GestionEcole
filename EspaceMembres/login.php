<?php require_once 'include/functions.php';
?>

<?php require_once 'include/header.php'; ?>
<?php
if(!empty($_POST)){
    if(!empty($_POST['login']) && !empty($_POST['mdp'])) {
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
        require_once 'include/db.php';

        //debug(password_verify($_POST['mdp'], $client->mdp));

        $ps = $db->prepare("SELECT * FROM admin WHERE login = ?");
        $ps->execute([$login]);
        $admin = $ps->fetch();


        if ($login == $admin->login){
            if($mdp == $admin->mdp){
                session_start();
                $_SESSION['auth'] = $admin;
                $_SESSION['flash']['success'] = "Vous etes maintenant connecté";
                header('location: listeUtilisateurs.php');
            }
            else echo 'Mot de passe incorrect';
        }

    }
    else echo "Veillez renseigner tous les champs";
}
?>
    <br>
    <div class="container col-md-4 col-xs-12 col-md-offset-3 spacer">
        <div class="panel panel-default">
            <div class="panel-heading">Connexion</div>

            <div class="panel-body">
                <form action="" method="post">
                <div class="form-group">
                    <label for="login" class="control-label">Votre login : </label>
                    <input type="text" name="login" class="form-control" id="login">
                </div>

                <div class="form-group">
                    <label for="mdp" class="control-label">Votre mot de passe : </label>
                    <input type="password" name="mdp" class="form-control" id="mdp">
                    <br><a href="forgetPassword.php">Mot de passe oublié</a>
                </div>

                <div>
                    <button class="btn btn-primary">Se connecter</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once 'include/footer.php'; ?>