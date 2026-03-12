<?php
require_once __DIR__ . '/../../../modeles/DAOSaisieHebdo.php';
require_once __DIR__ . '/../../../config/global.php';
require_once __DIR__ . '/../../../libs/pdo2.php';

$total = getTotalSaisieHebdoByVehiculeId(1);
var_dump($total);
?>
