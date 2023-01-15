
<!-- ici j'utilise ob_start qui est un buffer, il va charger la totaliter de ma page template pour la redépolyer dans la bonne page, la ou je suis avec mon navigateur -->
<?php



ob_start();



?>




ici le contenu de la page d'accueil



<?php
//ici j'utilise ob_get_clean qui va ce charger de vider 
$content = ob_get_clean();
$titre = "Liste des annonces";
require "./components/template.php";

?>