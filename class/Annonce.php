<?php

require_once "Database.php";

    class Annonce extends Database
{
    private int $id;
    private int $parking;
    private int $price;
    private string $surface;
    private string $adress;
    private string $owner;
    private string $tenant;
    private string $photo;
    private string $description;
    private string $title;
    private string $date;
    private string $update;
    private string $location;

    //génère une nouvelle annonces avec le constructeur.
    public function __construct($id, $surface, $parking, $price, $adress, $owner, $tenant, $description, $title, $date, $update, $location, $photo){
        
        $this->id = $id;
        $this->surface = $surface;
        $this->parking = $parking;
        $this->price = $price;
        $this->adress = $adress;
        $this->owner = $owner;
        $this->tenant = $tenant;
        $this->description = $description;
        $this->title = $title;
        $this->date = $date;
        $this->update = $update;
        $this->location = $location;
        $this->photo = $photo;
    }


        //ici je crée les getteur qui permette un accès a l'information par l'attribut.
        public function getId(){return $this->id;}
        public function setId($id){$this->id = $id;}
    
        public function getSurface(){return $this->surface;}
        public function setSurface($surface){$this->surface = $surface;}
    
        public function getParking(){return $this->parking;}
        public function setParking($parking){$this->parking = $parking;}
    
        public function getPrice(){return $this->price;}
        public function setPrice($price){$this->price = $price;}
    
        public function getAdress(){return $this->adress;}
        public function setAdress($adress){$this->adress = $adress;}
    
        public function getOwner(){return $this->owner;}
        public function setOwner($owner){$this->owner = $owner;}
    
        public function getTenant(){return $this->tenant;}
        public function setTenant($tenant){$this->tenant = $tenant;}
        
        public function getDescription(){return $this->description;}
        public function setDescription($description){$this->description = $description;}
    
        public function getTitle(){return $this->title;}
        public function setTitle($title){$this->title = $title;}
        
        public function getDate(){return $this->date;}
        public function setDate($date){$this->date = $date;}
    
        public function getUpdate(){return $this->update;}
        public function setUpdate($update){$this->update = $update;}

        public function getLocation(){return $this->location;}
        public function setLocation($location){$this->location = $location;}

        public function getPhoto(){return $this->photo;}
        public function setPhoto($photo){$this->photo = $photo;}
    }
