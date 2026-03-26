<?php
include_once '../config/global.php';
include_once '../libs/pdo2.php';

include_once '../entities/Vehicule.php';
include_once '../entities/Visiteur.php';
include_once '../entities/SaisieJour.php';
include_once '../entities/SaisieHebdo.php';

include_once '../modeles/DAOVisiteurs.php';
include_once '../modeles/DAOSaisieJour.php';
include_once '../modeles/DAOSaisieHebdo.php';
include_once '../modeles/DAOVehicules.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $vehicule = getVehiculeById((int)$_GET['id']);
            if ($vehicule === null) {
                http_response_code(404);
                break;
            }
            echo json_encode($vehicule);
            http_response_code(200);
        } else {
            http_response_code(404);
        }
        break;

    default:
        break;
}
?>

