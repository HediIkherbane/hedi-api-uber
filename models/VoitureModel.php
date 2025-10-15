<?php

class VoitureModel
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=bruno_uber;charset=utf8", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function getDBVoitureById ($idVoiture) {
        $req = "
            SELECT * FROM voiture
            WHERE voiture_id = :idVoiture
        ";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindValue(":idVoiture", $idVoiture, PDO::PARAM_INT);
        $stmt->execute();
        $voiture = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $voiture;
    }
}
// $chauffeurModel = new ChauffeurModel();
// print_r($chauffeurModel->getDBAllChauffeurs());