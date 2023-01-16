<?php 

//j'appel ma class.
include "../class/Annonce.php";
include "../class/AnnonceManager.php";

//j'appel mon constructeur.
$annonceManager = new AnnonceManager;

//je charge toutes mes annonces.
$annonceManager->chargementAnnonces();
//print_r('coucou');

ob_start();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $var = new AnnonceManager();
    $var->suppAnnonceBdd($id);
    if ($result) {
        echo "Object successfully deleted.";
    } else {
        echo "Error deleting object.";
    }
}

?>


<table class="table text-center">
    <tr class="table-dark">
        <th>Image</th>
        <th>Titre</th>
        <th>Surface</th>
        <th>Prix</th>
        <th>Description</th>
        <th colspan="2">Actions</th>
    </tr>
    
    <a href="../pages/ajoutannonce.php" class="btn btn-success d-block">Ajouter</a>&nbsp;


    <!-- ici je crée une boucle for ou mon tableau commence
    a zéro et s'autoincrémente avec ++ et la fonction count -->
    <?php
    $annonces = $annonceManager->getAnnonces();
    for($i=0; $i < count($annonces);$i++) : 
    ?>

    <tr>
        <td class="align-middle"><img src="../public/img/algo.png" width="60px;"></td>
        <td class="align-middle"><?= $annonces[$i]->getTitle(); ?></td>
        <td class="align-middle"><?= $annonces[$i]->getSurface(); ?></td>
        <td class="align-middle"><?= $annonces[$i]->getPrice(); ?></td>
        <td class="align-middle"><?= $annonces[$i]->getDescription(); ?></td>
        <td class="align-middle"><a href="../pages/modifieannonce.php" class="btn btn-warning">Modifier</a><br><br>
        <form action="../pages/annonces.php" method="get">
            <input type="hidden" name="delete" value="<?= $annonces[$i]->getId(); ?>">
             <input type="submit" value="Supprimer">
        </form>
    </tr>

    <!-- ici je stop la boucle for -->
    <?php endfor; ?>

</table>
    


<?php
$content = ob_get_clean();
$titre = "Les annonces en lignes";
require "../components/template.php";
?>