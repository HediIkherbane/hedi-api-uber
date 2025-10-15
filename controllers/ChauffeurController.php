<?php

require_once "models/ChauffeurModel.php";

class ChauffeurController
{
    private $model;

    public function __construct()
    {
        $this->model = new ChauffeurModel();
    }

    public function getAllChauffeurs()
    {
        $chauffeurs = $this->model->getDBAllChauffeurs();
        echo json_encode($chauffeurs);
    }

    public function getChauffeurById ($idChauffeur) {
        $lignesChauffeur = $this->model->getDBChauffeurById($idChauffeur);
        echo json_encode($lignesChauffeur);
    }

    public function getChauffeurByIdVoitures ($idChauffeur) {
        $lignesVoitures = $this->model->getDBChauffeurByIdVoitures($idChauffeur);
        echo json_encode($lignesVoitures);
    }
}
// $chauffeurController = new ChauffeurController();
// $chauffeurController->getAllChauffeurs();