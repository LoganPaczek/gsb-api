<?php
require_once __DIR__ . '/../../../modeles/DAOVehicules.php';
require_once __DIR__ . '/../../../entities/Vehicule.php';
require_once __DIR__ . '/../../../config/global.php';
require_once __DIR__ . '/../../../libs/pdo2.php';

$vehicule = new Vehicule(3, 'JU-123-CD', 'Mitsubishi', 'L200', []);
$result = updateVehicule($vehicule);
var_dump($result);
?>