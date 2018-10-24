<?php
$id = $_GET['id'];
$status = $_GET['status'];
require_once 'include/functions.php';

logged_only();
?>
<?php require_once 'include/headerAdmin.php'; ?>
<?php if ($status== "Inscrit") : ?>
 <div class="alert alert-danger">
     <a href="eleveNonIscrit.php?id=<?=$id;?>&status=<?=$status;?>" >  Cet élève ne s'est pas encore inscrit ?</a>
     <a href="listeUtilisateurs.php">Annuler</a>
 </div>


<?php else : ?>
    <div class="alert alert-danger">
        <a href="eleveInscrit.php?id=<?=$id;?>&status=<?=$status;?>">  Cet élève s'est regulièrement inscrit ?</a>
        <a href="listeUtilisateurs.php">  Annuler</a>
    </div>
<?php endif; ?>