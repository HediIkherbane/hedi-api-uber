<?php

require_once "models/TrajetModel.php";

class TrajetController
{
    private $model;

    public function __construct()
    {
        $this->model = new TrajetModel();
    }

    public function getTrajetByIdDetails ($idTrajet) {
        $lignesTrajet = $this->model->getDBTrajetByIdDetails($idTrajet);
        echo json_encode($lignesTrajet);
    }
}
// $chauffeurController = new ChauffeurController();
// $chauffeurController->getAllChauffeurs();