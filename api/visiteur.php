<?php
include_once '../config/global.php';
include_once '../libs/pdo2.php';
include_once '../entities/Visiteur.php';
include_once '../modeles/DAOVisiteurs.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        break;
    case 'POST':
        // Accepter JSON (Postman, etc.) ou formulaire
        $data = $_POST;
        if (empty($data) && strpos($_SERVER['CONTENT_TYPE'] ?? '', 'application/json') !== false) {
            $raw = file_get_contents('php://input');
            $data = json_decode($raw, true) ?: [];
        }
        if (isset($data['login']) && isset($data['password'])) {
            $visiteur = new Visiteur(
                null,
                $data['login'],
                $data['password'],
                null,
                null,
                null,
                0,
                0
            );
            $ajout = addVisiteur($visiteur);
            http_response_code($ajout ? 201 : 500);
        } else {
            http_response_code(400);
        }
        break;
    case "DELETE" :
        if(isset($_GET['id'])){
            $status = deleteVisiteur($_GET['id']);
            return $status ? http_response_code(200) : http_response_code(500);
        } else {
            return http_response_code(400);
        }
        break;
    default:
        break;
}
?>