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
                $annonce["adresse"],
                $annonce["description"],
                $annonce["date"],
                $annonce["photo"],
                $annonce["price"]);
                $this->ajoutAnnonce($l);
            }
        }

        // //rajouter une image je renseigne en bas $file pour dire que c'est une image
        // //et je rajoute le dossier ou je dois le placer avec $repertoire.
        // public function ajoutPhoto($file, $dir){
        //     $file = $_FILES['photo'];
        //     $repertoire = "../public/img";
        //     ajoutImage($file,$repertoire);
        // }

        // private function ajoutPhoto($file, $dir){
        //     //je verifie si j'ai renseigner une image dans le formulaire
        //     if(!isset($file['name']) || empty($file['name']))
        //     thow new Exception("Vous devez indiquer une image");

        //     if(!file_exists($dir)) mkdir($dir, 0777);

        //     $extension = strolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        //     $random = rand(0,99999);
        //     $target_file = $dir.$random."_".$file["name"];
        // }
        

        public function ajoutAnnonceBdd($title,$surface,$description,$price,$photo,$adresse,$chambre,$date){
            
            $req = "
            INSERT INTO property (title, surface, photo, description, price, adresse, chambre, date)
            values (:title, :surface, :photo, :description, :price, :adresse, :chambre, :date)";
            $stmt = $this->getBdd()->prepare($req);
            $stmt->bindValue(":title",$title,PDO::PARAM_STR);
            $stmt->bindValue(":surface",$surface,PDO::PARAM_STR);
            $stmt->bindValue(":photo",$photo,PDO::PARAM_STR);
            $stmt->bindValue(":description",$description,PDO::PARAM_STR);
            $stmt->bindValue(":price",$price,PDO::PARAM_INT);
            $stmt->bindValue(":adresse",$adresse,PDO::PARAM_STR);
            $stmt->bindValue(":chambre",$chambre,PDO::PARAM_INT);
            $stmt->bindValue(":date",$date,PDO::PARAM_STR);
            $stmt->execute();
            $stmt->closeCursor();
            header("Location: ../pages/annonces.php");
        }
}

?>








