<?php
require_once 'include/functions.php';
logged_only();
require_once 'include/db.php';
$mc ="";
$req = $db->prepare("SELECT * FROM classe");
$req->execute();
if(isset($_GET['motCle'])){
    $mc = $_GET['motCle'];
    $req = $db->prepare("SELECT * FROM classe WHERE nomClasse LIKE '%$mc%' ");
    $req->execute();
}
else {
    $req = $db->prepare("SELECT * FROM classe");
    $req->execute();
}
require_once 'include/headerAdmin.php';
?>
<div class="container col-md-10"><br>
    <form action="" method="get">
        <div class="form-group">
            <label for="motCle" class="control-label">Mot clé :</label>
            <input type="text" name="motCle" class="form-control-lg" value="<?= $mc;?>" placeholder="ex : Terminale">
            <button class="btn btn-primary">Rechercher</button>
        </div>
    </form>
<div class="panel panel-info">
    <div class="panel-heading">Liste des classes</div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID_CLASSE</th><th>CLASSE</th>

                </tr>
            </thead>
            <?php while ($classe = $req->fetch()){?>
            <tr>
                <td> <?= $classe->id_classe ?> </td>
                <td><?= $classe->nomClasse ?></td>
                <td><a href="#">Modifier</a></td>

                <td><a onclick="return confirm('Etes vous sure de vouloir supprimer cette classe ?') " href="deleteClasse.php?code=<?= $classe->id_classe;?>">Supprimer</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
</div>