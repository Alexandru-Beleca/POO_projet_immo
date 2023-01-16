<?php

require_once "Database.php";

    class Annonce extends Database
{
    private int $id;
    private string $price;
    private string $surface;
    private string $adress;
    private string $photo;
    private string $description;
    private string $title;
    private string $date;

    //génère une nouvelle annonces avec le constructeur.
    public function __construct($id, $price, $surface, $adress, $description, $title, $date, $photo){
        
        $this->id = $id;
        $this->surface = $surface;
        $this->price = $price;
        $this->adress = $adress;
        $this->description = $description;
        $this->title = $title;
        $this->date = $date;
        $this->photo = $photo;
    }


        //ici je crée les getteur qui permette un accès a l'information par l'attribut.
        public function getId(){return $this->id;}
        public function setId($id){$this->id = $id;}
    
        public function getSurface(){return $this->surface;}
        public function setSurface($surface){$this->surface = $surface;}
    
        public function getPrice(){return $this->price;}
        public function setPrice($price){$this->price = $price;}
    
        public function getAdress(){return $this->adress;}
        public function setAdress($adress){$this->adress = $adress;}
        
        public function getDescription(){return $this->description;}
        public function setDescription($description){$this->description = $description;}
    
        public function getTitle(){return $this->title;}
        public function setTitle($title){$this->title = $title;}
        
        public function getDate(){return $this->date;}
        public function setDate($date){$this->date = $date;}

        public function getPhoto(){return $this->photo;}
        public function setPhoto($photo){$this->photo = $photo;}
    }
