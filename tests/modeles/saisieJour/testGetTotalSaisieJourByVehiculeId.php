<?php
require_once __DIR__ . '/../../../modeles/DAOSaisieJour.php';
require_once __DIR__ . '/../../../config/global.php';
require_once __DIR__ . '/../../../libs/pdo2.php';

$total = getTotalSaisieJourByVehiculeId(4);
var_dump($total);
?>