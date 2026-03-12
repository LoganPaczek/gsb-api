<?php
require_once __DIR__ . '/../../../modeles/DAOSaisieHebdo.php';
require_once __DIR__ . '/../../../entities/Visiteur.php';
require_once __DIR__ . '/../../../entities/Vehicule.php';
require_once __DIR__ . '/../../../entities/SaisieHebdo.php';
require_once __DIR__ . '/../../../config/global.php';
require_once __DIR__ . '/../../../libs/pdo2.php';

$visiteur = new Visiteur(1, 'Yanis', 'Yanis6744!D', null);
$vehicule = new Vehicule(1, 'AB-123-CD', 'Renault', 'Talisman', []);

$saisieHebdo = new SaisieHebdo(1, '2026-01-01', 500, $visiteur, $vehicule);
$result = addSaisieHebdo($saisieHebdo);
var_dump($result);
?>
