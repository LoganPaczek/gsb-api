<?php
require_once __DIR__ . '/../../../modeles/DAOSaisieHebdo.php';
require_once __DIR__ . '/../../../modeles/DAOVisiteurs.php';
require_once __DIR__ . '/../../../modeles/DAOVehicules.php';
require_once __DIR__ . '/../../../entities/Visiteur.php';
require_once __DIR__ . '/../../../entities/Vehicule.php';
require_once __DIR__ . '/../../../entities/SaisieHebdo.php';
require_once __DIR__ . '/../../../config/global.php';
require_once __DIR__ . '/../../../libs/pdo2.php';

$saisieHebdo = getSaisieHebdoByVisiteurId(1);
var_dump($saisieHebdo);
?>
