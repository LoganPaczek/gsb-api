<?php
require_once __DIR__ . '/../../../modeles/DAOVehicules.php';
require_once __DIR__ . '/../../../entities/Vehicule.php';
require_once __DIR__ . '/../../../config/global.php';
require_once __DIR__ . '/../../../libs/pdo2.php';

$vehicule = new Vehicule(
    1,
    'AB-123-CD',
    'Renault',
    'Talisman',
    []
);
$result = addVehicule($vehicule);
echo $result;
?>