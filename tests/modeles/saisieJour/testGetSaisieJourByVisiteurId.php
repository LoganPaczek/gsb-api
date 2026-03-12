<?php
require_once __DIR__ . '/../../../modeles/DAOSaisieJour.php';
require_once __DIR__ . '/../../../modeles/DAOVisiteurs.php';
require_once __DIR__ . '/../../../modeles/DAOVehicules.php';
require_once __DIR__ . '/../../../entities/Visiteur.php';
require_once __DIR__ . '/../../../entities/Vehicule.php';
require_once __DIR__ . '/../../../entities/SaisieJour.php';
require_once __DIR__ . '/../../../config/global.php';
require_once __DIR__ . '/../../../libs/pdo2.php';

$saisieJour = getSaisieJourByVisiteurId(1);
var_dump($saisieJour);
?>