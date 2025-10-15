<?php

require_once "models/ClientModel.php";

class ClientController
{
    private $model;

    public function __construct()
    {
        $this->model = new ClientModel();
    }

    public function getClientById ($idClient) {
        $lignesClients = $this->model->getDBClientById($idClient);
        echo json_encode($lignesClients);
    }
}
// $chauffeurController = new ChauffeurController();
// $chauffeurController->getAllChauffeurs();