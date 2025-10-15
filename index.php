<?php

require_once "./controllers/ChauffeurController.php";
require_once "./controllers/VoitureController.php";
require_once "./controllers/ClientController.php";
require_once "./controllers/TrajetController.php";

$chauffeurController = new ChauffeurController();
$voitureController = new VoitureController();
$clientController = new ClientController();
$trajetController = new TrajetController();

if (empty($_GET["page"])) {
    echo "Cette page est introuvable.";
} else {
    $url = explode("/", $_GET['page']);
    $method = $_SERVER["REQUEST_METHOD"];

    switch ($url[0]) {
        case "chauffeurs":
            switch ($method) {
                case "GET":
                    if (isset($url[1])) {
                        if (isset($url[2]) && $url[2] === "voitures") {
                            $chauffeurController->getChauffeurByIdVoitures($url[1]);
                        } else {
                            $chauffeurController->getChauffeurById($url[1]);
                        }
                    } else {
                        $chauffeurController->getAllChauffeurs();
                    }
                    break;
                case "POST":
                    $data = json_decode(file_get_contents("php://input"), true);
                    $chauffeurController ->updateChauffeur($url[1],$data);
                    $chauffeurController->createChauffeur($data);
                    break;

                case "PUT" :
                    if (isset($url[1])) {
                    $data = json_decode(file_get_contents("php://input"), true);
                    $chauffeurController ->updateChauffeur($url[1],$data);
                    echo json_encode($data);
                    } else {
                        http_response_code(400);
                        echo json_encode(["message" => "ID du chauffeur manquant dans l'URL"]);
                    }
            }
            break;

        case "clients":
            switch ($method) {
                case "GET":
                    if (isset($url[1])) {
                        $clientController->getClientById($url[1]);
                    } else {
                        $clientController->getAllClients();
                    }
                    break;
                case "POST":
                    $data = json_decode(file_get_contents("php://input"), true);
                    $clientController->createClient($data);
                    break;
            }
            break;

        case "voitures":
            switch ($method) {
                case "GET":
                    if (isset($url[1])) {
                        $voitureController->getVoitureById($url[1]);
                    } else {
                        $voitureController->getAllVoitures();
                    }
                    break;
                case "POST":
                    $data = json_decode(file_get_contents("php://input"), true);
                    $voitureController->createVoiture($data);
                    break;
            }
            break;

        case "trajets":
            if (isset($url[1])) {
                if (isset($url[2])) {
                    $trajetController->getTrajetByIdDetails($url[1]);
                } else {
                    echo "Afficher les informations du trajet : " . $url[1];
                }
            } else {
                echo "Afficher les informations des trajets";
            }
            break;

        default:
            echo "La page n'existe pas";
    }
}