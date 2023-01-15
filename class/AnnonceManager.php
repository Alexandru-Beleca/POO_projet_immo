<?php

    //ici j'appel ma connexion.
    require_once "Database.php";

        class AnnonceManager extends Database
    {
        
        private $annonces;

        //ici je fais une fonction d'ajout d'annonce.
        public function ajoutAnnonce($annonce){
            $this->annonces[] = $annonce;
        }

        //ici je fais un getAnnonce pour retourner le tableau au dessus.
        public function getAnnonces(){
            return $this->annonces;
        }

        public function chargementAnnonces(){
            $req = $this->getBdd()->prepare("SELECT * FROM property");
            $req->execute();
            $mesannonces = $req->fetchAll(PDO::FETCH_ASSOC);
            //print_r($mesannonces);
            //je libère les accès a la BDD pour une autre requet.
            $req->closeCursor();

            foreach ($mesannonces as $annonce){
                $l = new Annonce
                ($annonce["id"],
                $annonce["title"],
                $annonce["surface"],
                $annonce["parking"],
                $annonce["adresse"],
                $annonce["owner"],
                $annonce["tenant"],
                $annonce["description"],
                $annonce["date"],
                $annonce["update"],
                $annonce["location"],
                $annonce["photo"],
                $annonce["prix"]);
                $this->ajoutAnnonce($l);
            }
        }

        //rajouter une image je renseigne en bas $file pour dire que c'est une image
        //et je rajoute le dossier ou je dois le placer avec $repertoire.
        public function ajoutPhoto(){
            $file = $_FILES['photo'];
            $repertoire = "../public/img";
            ajoutImage($file,$repertoire);
        }
        

        public function ajoutAnnonceBdd($title,$surface,$description,$prix,$photo){
            print_r('coucou');
            $req = "
            INSERT INTO property (title, surface, photo, description, prix)
            values (:title, :surface, :photo, :description, :prix)";
            $stmt = $this->getBdd()->prepare($req);
            $stmt->bindValue(":title",$title,PDO::PARAM_STR);
            $stmt->bindValue(":surface",$surface,PDO::PARAM_STR);
            $stmt->bindValue(":description",$description,PDO::PARAM_STR);
            $stmt->bindValue(":prix",$prix,PDO::PARAM_INT);
            $stmt->bindValue(":photo",$photo,PDO::PARAM_STR);
            $resultat = $stmt->execute();
            $stmt->closeCursor();
        }

}

?>








