<?php 

require_once "Database.php";


//ici je crée une class User qui va correspondre aux utilisateurs du site.
    class User extends Database
{
    private int $id;
    private string $username;
    private string $password;
    private string $email;
    private string $portable;
    private string $date;
    private string $favorite;

    public function __construct($id,$username,$password,$email,$portable,$date,$favorite)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->portable = $portable;
        $this->date = $date;
        $this->favorite = $favorite;
    }

    //ici je crée les getteur qui permette un accès a l'information par l'attribut.
    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}

    public function getUsername(){return $this->username;}
    public function setUsername($username){$this->username = $username;}

    public function getPassword(){return $this->password;}
    public function setPassword($password){$this->password = $password;}

    public function getEmail(){return $this->email;}
    public function setEmail($email){$this->email = $email;}

    public function getPortable(){return $this->portable;}
    public function setPortable($portable){$this->portable = $portable;}

    public function getDate(){return $this->date;}
    public function setDate($date){$this->date = $date;}

    public function getFavorite(){return $this->favorite;}
    public function setFavorite($favorite){$this->favorite = $favorite;}
}

?>