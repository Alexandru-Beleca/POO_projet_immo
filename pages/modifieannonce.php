<?php
ob_start();
require_once "../class/AnnonceManager.php";

define("NOMBREDECHAMBRE",10);

$var=new AnnonceManager();

$id=$_GET['id'];
if (isset($_POST['id'])){
$id=$_POST['id'];
$title=$_POST['title'];
$adresse=$_POST['adress'];
$surface=$_POST['surface'];
$description=$_POST['description'];
$price=$_POST['price'];
$photo=$_POST['photo'];
$chambre=$_POST['chambre'];
$date = date("y-m-d");
$var->modifieAnnonceBdd($title,$surface,$description,$price,$photo,$adresse,$chambre,$date);
}
?>

<form action="" method="POST">

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox">
        <label class="form-check-label" value="" name="vente">Vente</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox">
        <label class="form-check-label" value="" name="location">Location</label>
    </div><br><br>



    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="appartement">
        <label class="form-check-label" value="" name="appartement">Appartement</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="maison">
        <label class="form-check-label" value="" name="maison">Maison</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="autre">
        <label class="form-check-label" value="" name="autre">Autres</label>
    </div><br><br>



    <div class="form-group">
        <label for="title">Titre de l'annonce</label>
        <input type="text" class="form-control" value="" name="title" placeholder="Titre de l'annonce">
        <?php echo $property['title']?>
    </div>

    <div class="form-group">
        <label for="adress">Adresse</label>
        <input type="text" class="form-control" value="<?php $adresse ?>" name="adress" placeholder="Adress">
    </div>

    <div class="form-group">
        <label for="price">Prix</label>
        <input type="number" class="form-control" value="<?php $price ?>" name="price" placeholder="price">
    </div>

    <div class="form-group">
        <label for="surface">Surface</label>
        <input type="text" class="form-control" value="<?php $surface ?>" name="surface" placeholder="Surface">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" value="<?php $description ?>" name="description" placeholder="Description">
    </div>

    <div class="form-group">
        <label for="photo">Photo</label>
        <input type="file" class="form-control" value="<?php $photo ?>" name="photo" placeholder="Photo">
    </div>

    <div class="form-group">
            <label for="select">Nombres de Chambres</label>
            <select name="chambre" value="<?php $chambre ?>">
                <?php for ($i=1; $i <=NOMBREDECHAMBRE ; $i++) { 
                        echo "<option value=$i>$i</option>";} ?>
            </select>
    </div>
    

    <div class="form-group">
        <button name="ajoutAnnonceBdd" type="submit"  class="btn btn-primary mb-2">Submit</button>
    </div>

            
</form>




<?php
$content = ob_get_clean();
$titre = "Ajoute une annonce";
require "../components/template.php";
?>