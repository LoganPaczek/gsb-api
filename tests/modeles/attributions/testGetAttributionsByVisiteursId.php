<?php
require_once __DIR__ . '/../../../modeles/DAOAttribuer.php';
require_once __DIR__ . '/../../../modeles/DAOVisiteurs.php';
require_once __DIR__ . '/../../../modeles/DAOVehicules.php';
require_once __DIR__ . '/../../../entities/Visiteur.php';
require_once __DIR__ . '/../../../entities/Vehicule.php';
require_once __DIR__ . '/../../../entities/Attribution.php';
require_once __DIR__ . '/../../../config/global.php';
require_once __DIR__ . '/../../../libs/pdo2.php';

$attributions = getAttributionsByVisiteurId(1);
var_dump($attributions);
?>