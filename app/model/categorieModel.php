<?php
class CategorieModel{

    private $categorieID;
    private $nomCategorie;
    private $dateCategorie;
    private $conn;
    
    public function __construct() {
       
        $this->conn = Database::getDb()->getConn();

    }


    public function getCategorieID(){
        return $this->categorieID;
    }

    public function setCategorieID($categorieID){
        $this->categorieID = $categorieID;

    }
    public function getCategorie(){
        return $this->nomCategorie;
    }

    public function setCategorie($nomCategorie){
        $this->nomCategorie = $nomCategorie;
    }
    public function getDateCategorie(){
        return $this->dateCategorie;
    }

    public function setDateCategorie($dateCategorie){
        $this->dateCategorie = $dateCategorie;
    }

    public function addCategorie()
    {
        if ($this->isCategorieExists($this->nomCategorie)) {
            return false; 
        }
        $sql = "INSERT INTO categorie (nomCategorie, dateCategorie) VALUES (:nomC, :dateC)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nomC', $this->nomCategorie);
        $stmt->bindParam(':dateC', $this->dateCategorie);
        return $stmt->execute();
    }


    public function DisplayCategorie()
    {
        $sql = "SELECT * FROM categorie ORDER BY dateCategorie desc";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $catsData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $cats = [];
        foreach ($catsData as $ta) {
            $cat = new CategorieModel();
            $cat->setCategorieID($ta['categorieID']);
            $cat->setCategorie($ta['nomCategorie']);
            $cat->setDateCategorie($ta['dateCategorie']);
            $cats[] = $cat;
        }
        return $cats;
    }

    public function editCategorie($categorieID)
    {
        if ($this->isCategorieExists($this->nomCategorie)) {
            return false; 
        }
        $sql = "UPDATE categorie SET nomCategorie = :nomC, dateCategorie = :dateC WHERE categorieID = :categorieID";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':categorieID', $categorieID);
        $stmt->bindParam(':nomC', $this->nomCategorie);
        $stmt->bindParam(':dateC', $this->dateCategorie);
        return $stmt->execute();
    }

    public function deleteCategorie($categorieID)
    {
        $sql = "DELETE FROM categorie WHERE categorieID = :categorieID";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':categorieID', $categorieID);
        return $stmt->execute();
    }

    public function isCategorieExists($CategorieName)
    {
        $sql = "SELECT COUNT(*) FROM Categorie WHERE nomCategorie = :CategorieName";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':CategorieName', $CategorieName);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    }

    

}