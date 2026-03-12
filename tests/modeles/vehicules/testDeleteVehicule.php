<?php
require_once __DIR__ . '/../../../modeles/DAOVehicules.php';
require_once __DIR__ . '/../../../config/global.php';
require_once __DIR__ . '/../../../libs/pdo2.php';

$result = deleteVehicule(2);
var_dump($result);
?>