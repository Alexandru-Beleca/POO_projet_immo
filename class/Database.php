<?php

    //ici je crée une class abstract pour que 
    //les données ne soit pas utiliser a l exterieur de la class.
    //cette class abstraite ne sera jamais instencier directement.
    //Mais les autres class qu'en ont le besoin pourront en hérité.
        abstract class Database
    {
        
    private static $pdo;

    //setbdd permet la connexion en utilisant les parametrage nécéssaire.
    //set bdd va permettre de crée la connexion et de le placer dans l'attribut static.
    private static function setBdd()
    {
        self::$pdo = new PDO("mysql:host=localhost;dbname=site_annonce;charset=utf8", "root","root");
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        echo 'vous etes co a la bdd';
    }

    //getbdd permet de donner l'information de connexion 
    //mais ne divulgue pas les paramettre protégé de l'utilisateurs.
    protected function getBdd()
    //ici je crée une condition qui dit que : 
    //SI je suis pas connecter(null) ALORS je retourne la variable de connexion ($pdo).
    { if (self::$pdo === null)
        { 
            self::setBdd(); 
        }
        return self::$pdo;
    }
}
