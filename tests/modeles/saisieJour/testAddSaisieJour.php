<?php
require_once __DIR__ . '/../../../modeles/DAOSaisieJour.php';
require_once __DIR__ . '/../../../entities/SaisieJour.php';
require_once __DIR__ . '/../../../config/global.php';
require_once __DIR__ . '/../../../libs/pdo2.php';

$visiteur = new Visiteur(1, 'Yanis', 'Yanis6744!D', null);
$vehicule = new Vehicule(1, 'AB-123-CD', 'Renault', 'Talisman', []);

$saisieJour = new SaisieJour(1, '2026-01-01', 100, $visiteur, $vehicule);
$result = addSaisieJour($saisieJour);
var_dump($result);
?>