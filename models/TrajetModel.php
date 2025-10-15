<?php

class TrajetModel
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

    public function getDBTrajetByIdDetails ($idTrajet) {
        $req = "
            SELECT trajet.trajet_id, chauffeur.chauffeur_nom, client.client_nom FROM trajet
            INNER JOIN chauffeur
            ON trajet.trajet_id = chauffeur.chauffeur_id
            INNER JOIN possede
            ON trajet.trajet_id = possede.trajet_id
            INNER JOIN client
            ON possede.client_id = client.client_id
            WHERE trajet.trajet_id = :idTrajet
        ";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindValue(":idTrajet", $idTrajet, PDO::PARAM_INT);
        $stmt->execute();
        $trajets = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $trajets;
    }

}
// $chauffeurModel = new ChauffeurModel();
// print_r($chauffeurModel->getDBAllChauffeurs());