<?php
require_once __DIR__ . '/../../../modeles/DAOSaisieJour.php';
require_once __DIR__ . '/../../../config/global.php';
require_once __DIR__ . '/../../../libs/pdo2.php';

$total = getTotalSaisieJourByVisiteurId(1);
var_dump($total);
?>