<?php

require_once "models/VoitureModel.php";

class VoitureController
{
    private $model;

    public function __construct()
    {
        $this->model = new VoitureModel();
    }

    public function getVoitureById ($idVoiture) {
        $lignesVoitures = $this->model->getDBVoitureById($idVoiture);
        echo json_encode($lignesVoitures);
    }
}
// $chauffeurController = new ChauffeurController();
// $chauffeurController->getAllChauffeurs();