<?php
ob_start();
require_once "../class/AnnonceManager.php";

define("NOMBREDECHAMBRE",10);

$var=new AnnonceManager();

if (isset($_POST['title'])){
$title=$_POST['title'];
$adresse=$_POST['adress'];
$surface=$_POST['surface'];
$description=$_POST['description'];
$price=$_POST['price'];
$photo=$_POST['photo'];
$chambre=$_POST['chambre'];
$date = date("y-m-d");
$var->ajoutAnnonceBdd($title,$surface,$description,$price,$photo,$adresse,$chambre,$date);
}
?>

<form action="" method="POST">

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox">
        <label class="form-check-label" name="vente">Vente</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox">
        <label class="form-check-label" name="location">Location</label>
    </div><br><br>



    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="appartement">
        <label class="form-check-label" name="appartement">Appartement</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="maison">
        <label class="form-check-label" name="maison">Maison</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="autre">
        <label class="form-check-label" name="autre">Autres</label>
    </div><br><br>



    <div class="form-group">
        <label for="title">Titre de l'annonce</label>
        <input type="text" class="form-control" name="title" placeholder="Titre de l'annonce">
    </div>

    <div class="form-group">
        <label for="adress">Adresse</label>
        <input type="text" class="form-control" name="adress" placeholder="Adress">
    </div>

    <div class="form-group">
        <label for="price">Prix</label>
        <input type="number" class="form-control" name="price" placeholder="price">
    </div>

    <div class="form-group">
        <label for="surface">Surface</label>
        <input type="text" class="form-control" name="surface" placeholder="Surface">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" placeholder="Description">
    </div>

    <div class="form-group">
        <label for="photo">Photo</label>
        <input type="file" class="form-control" name="photo" placeholder="Photo">
    </div>

    <div class="form-group">
            <label for="select">Nombres de Chambres</label>
            <select name="chambre">
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