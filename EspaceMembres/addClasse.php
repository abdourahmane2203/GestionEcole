<?php
        require_once 'include/functions.php';
        logged_only();
        require_once 'include/headerAdmin.php';
        if (!empty($_POST)){
        $nomClasse = $_POST['nomClasse'];

        require_once 'include/db.php';
        $req = $db->prepare("INSERT INTO classe(nomClasse) VALUES(?)");

        $req->execute([$nomClasse]);
        header('location: ListeClasses.php');
    }
?>

<div class="container col-md-4 col-xs-12 col-md-offset-3 spacer">
    <div class="panel panel-default">
        <div class="panel-heading">Ajouter une classe</div>

        <div class="panel-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nomClasse" class="control-label">Classe :</label>
                    <input type="text" name="nomClasse" class="form-control" id="nomClasse" placeholder="ex : Terminale S2">
                </div>

                    <div>
                        <div>
                            <button class="btn btn-primary">Ajouter</button>
                        </div>
            </form>
        </div>
    </div>
</div>