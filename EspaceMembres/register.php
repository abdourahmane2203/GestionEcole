<?php
session_start();
require_once 'include/functions.php';
logged_only();

    if (!empty($_POST)){

        $errors = array();

        if (empty($_POST['nom']) || !preg_match('/^[a-zA-Zéèçà]+$/', $_POST['nom'])){
            $errors['nom'] = "Votre nom n'est pas valide";
        }

        if (empty($_POST['prenom']) || !preg_match('/^[a-zA-ZéèÉÇç][A-Za-zéçÇÉÁáàè]+([-_\s][a-zA-ZéèÉÇç][A-Za-zéçÇÉÁáàè]+)?/', $_POST['prenom'])){
            $errors['prenom'] = "Vous n'avez pas saisi votre prénom";
        }

        if (empty($_POST['telephone']) || !preg_match('/^[0-9\+]+$/', $_POST['telephone']) ){
            $errors['telephone'] = "Numéro de téléphone non valide";
        }
        if (empty($_POST['adresse'])){
            $errors['adresse'] = "Renseignez bien votre adresse de domicile";
        }

        if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "Email non valide";
        }
        else{
            require_once('include/db.php');
            $req = $db->prepare("SELECT id_eleve FROM client WHERE email=?");
            $req->execute([$_POST['email']]);
            $client = $req->fetch();
            if($client){
                $errors['email'] = 'Cet email est dejà utilisé veillez choisir un autre';
            }
        }

        if (empty($_POST['classe'])){
            $errors['classe'] = "Donnez une classe valide";
        }

        if (empty($errors)){
            $req = $db->prepare("INSERT INTO client SET nom=?, prenom=?, telephone=?, adresse=?, email=?, classe=?, status_eleve=?");

            $status_client = 'Inscrit';
            $req->execute([$_POST['nom'], $_POST['prenom'], $_POST['telephone'], $_POST['adresse'], $_POST['email'], $_POST['classe'], $status_client]);
            $client_id = $db->lastInsertId();

            $_SESSION['flash']['success'] = "Cet élève a été bien ajouté";
            header('location: listeUtilisateurs.php');
            exit();
        }

    }

?>
<?php require 'include/headerAdmin.php' ?>
<div class="container spacer"><br>
    <?php if(!empty($errors)) : ?>
    <div class="alert alert-danger">
        <p>Vous n'avez pas rempli le formulaire correctement</p>
        <ul>
            <?php foreach($errors as $error) : ?>
                <li><?= $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>
</div>
    <div class="container col-md-4 col-xs-12 col-md-offset-3 spacer">
        <div class="panel panel-default">
            <div class="panel-heading">Ajouter un élève</div>

            <div class="panel-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nom" class="control-label">Nom :</label>
                        <input type="text" name="nom" class="form-control" id="nom">
                    </div>

                    <div class="form-group">
                        <label for="prenom" class="control-label">Prénom :</label>
                        <input type="text" name="prenom" class="form-control" id="prenom">
                    </div>

                    <div>

                        <div class="form-group">
                            <label for="telephone" class="control-label">Numéro de téléphone :</label>
                            <input type="text" name="telephone" class="form-control" id="telephone">
                        </div>

                        <div class="form-group">
                            <label for="adresse" class="control-label">Adresse de domicile :</label>
                            <input type="text" name="adresse" class="form-control" id="adresse">
                        </div>

                        <div class="form-group">
                            <label for="email" class="control-label">Email :</label>
                            <input type="text" name="email" class="form-control" id="email">
                        </div>

                        <div class="form-group">
                            <label for="classe" class="control-label">Classe :</label>
                            <input type="text" name="classe" class="form-control" id="classe">
                        </div>

                        <div>
                        <div>
                        <button class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



<?php require 'include/footer.php' ?>