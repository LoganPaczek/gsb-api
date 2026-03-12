<?php
include_once '../config/global.php';
include_once '../libs/pdo2.php';
include_once('../modeles/DAOVisiteurs.php');

$method = $_SERVER['REQUEST_METHOD'];


switch ($method) {
    case 'GET':
        //header("Content-Type: application/json");

        //if(!isset($_GET['id'])){
            //$covoitUsers = getLesCovoitUser();
            //echo json_encode($covoitUsers, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        //} else {
            //$covoitUser = getUnCovoitUser($_GET['id']);
            //echo json_encode($covoitUser, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        //}

        break;
    case 'POST':
        
       // if(isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['prenom'])){
         //   $unCovoitUser = new CovoitUser($_POST['id'], $_POST['nom'], $_POST['prenom']);
           // $ajout = addCovoitUser($unCovoitUser);
            //return $ajout ? http_response_code(201) : http_response_code(500);
        //} else {
            //return http_response_code(400);
        //}

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