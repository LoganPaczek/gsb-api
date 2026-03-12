<?php
require_once __DIR__ . '/../../../modeles/DAOVisiteurs.php';
require_once __DIR__ . '/../../../entities/Visiteur.php';
require_once __DIR__ . '/../../../config/global.php';
require_once __DIR__ . '/../../../libs/pdo2.php';

$visiteur = new Visiteur(1, 'Bryan', 'Bryan6744!D', null);
$result = addVisiteur($visiteur);
echo $result;
?>