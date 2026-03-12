<?php

require_once __DIR__ . '/../../../modeles/DAOAttribuer.php';
require_once __DIR__ . '/../../../entities/Attribution.php';
require_once __DIR__ . '/../../../config/global.php';
require_once __DIR__ . '/../../../libs/pdo2.php';

$visiteur = new Visiteur(1, 'Yanis', 'Yanis6744!D', null);
$vehicule = new Vehicule(1, 'AB-123-CD', 'Renault', 'Talisman', []);

$attribution = new Attribution(
    $visiteur,
    $vehicule,
    '2026-01-01',
    '2026-01-01'
);
$result = addAttribution($attribution);
var_dump($result);
?>