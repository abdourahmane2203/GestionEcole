<?php
require_once 'include/functions.php';
logged_only();
require_once 'include/db.php';
$mc ="";
if(isset($_GET['motCle'])){
    $mc = $_GET['motCle'];
    $req = $db->prepare("SELECT * FROM client WHERE nom LIKE '%$mc%' ");
    $req->execute();
}
else {
    $req = $db->prepare("SELECT * FROM client");
    $req->execute();
}
?>
<?php require_once('include/headerAdmin.php'); ?>
<div class="col-xs-12 col-md-10 container"><br>

    <form action="" method="get">
        <div class="form-group">
            <label for="motCle" class="control-label">Mot clé :</label>
            <input type="text" name="motCle" class="form-control-lg" value="<?= $mc; ?>" placeholder="ex : Djigo">
            <button class="btn btn-primary">Rechercher</button>
        </div>
    </form>
    <div class="panel panel-info spacer">
        <div class="panel-heading">Liste des élèves</div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID_ELEVE</th><th>NOM</th> <th>PRENOM</th> <th>TELEPHONE</th> <th>DOMICILE</th>
                    <th>EMAIL</th> <th>CLASSE</th> <th>STATUS ACTUEL</th>
                </tr>
                </thead>

                <?php while ($clients = $req->fetch()){ ?>
                    <tr>

                        <td><?= $clients->id_eleve; ?> </td>
                        <td><?= $clients->nom; ?> </td>
                        <td><?=$clients->prenom; ?> </td>
                        <td><?= $clients->telephone; ?> </td>
                        <td><?= $clients->adresse; ?> </td>
                        <td><?php echo ($clients->email) ?> </td>
                        <td><?php echo ($clients->classe) ?> </td>
                        <td>

                        <a href="eleveInscitNonInscrit.php?id=<?= $clients->id_eleve;?>&status=<?= $clients->status_eleve;?>"><?php echo ($clients->status_eleve) ?></a>

                        </td>
                        <td><a href="#">Modifier</a></td>
                        <td><a onclick="return confirm('Etes vous sure de vouloir supprimer cet élève ?')" href="deleteEleve.php?code=<?= $clients->id_eleve;?>" > Supprimer</a></td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>
</div>
