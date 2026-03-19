<?php
include_once '../config/global.php';
include_once '../libs/pdo2.php';
include_once '../entities/SaisieHebdo.php';
include_once '../entities/SaisieJour.php';
include_once '../entities/Visiteur.php';
include_once '../entities/Vehicule.php';
include_once '../entities/SaisieJour.php';
include_once '../modeles/DAOSaisieJour.php';
include_once '../modeles/DAOSaisieHebdo.php';
include_once '../modeles/DAOVisiteurs.php';
include_once '../modeles/DAOVehicules.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        // Accepter JSON (Postman, etc.) ou formulaire
        $data = $_POST;
        if (empty($data) && strpos($_SERVER['CONTENT_TYPE'] ?? '', 'application/json') !== false) {
            $raw = file_get_contents('php://input');
            $data = json_decode($raw, true) ?: [];
        }
        if (isset($data['date']) && isset($data['kmHebdo']) && isset($data['id_visiteur']) && isset($data['id_vehicule'])) {
            $visiteur = getVisiteurByIdLight((int)$data['id_visiteur']);
            $vehicule = getVehiculeByIdLight((int)$data['id_vehicule']);
            if ($visiteur === null || $vehicule === null) {
                http_response_code(404);
                break;
            }
            $saisieHebdo = new SaisieHebdo(
                null,
                $data['date'],
                $data['kmHebdo'],
                $visiteur,
                $vehicule
            );
            $ajout = addSaisieHebdo($saisieHebdo);
            http_response_code($ajout ? 201 : 500);
        } else {
            http_response_code(400);
        }
        break;
    default:
        break;
}
?>