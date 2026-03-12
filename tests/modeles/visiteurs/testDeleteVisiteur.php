<?php
require_once __DIR__ . '/../../../modeles/DAOVisiteurs.php';
require_once __DIR__ . '/../../../config/global.php';
require_once __DIR__ . '/../../../libs/pdo2.php';

$result = deleteVisiteur(3);
echo $result;
?>