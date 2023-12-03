<?php
class TableChat{
    private $dbName = "chat";
    private $userName = "root";
    private $server = "localhost";
    private $motdepasse = "";
    private $connexion;

    public function __construct() {
        try {
            $this->connexion = new PDO("mysql:host=$this->server;dbname=$this->dbName", $this->userName, $this->motdepasse);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
    public function getConnection(){
        return $this->connexion;
    }
    public function closeConnection() {
        $this->connexion = null;
    }
}
?>