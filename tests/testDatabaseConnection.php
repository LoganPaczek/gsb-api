<?php
require_once __DIR__ . '/../config/global.php';
require_once __DIR__ . '/../libs/pdo2.php';

$pdo = PDO2::getInstance();
$result = $pdo->query("SELECT 1");
$row = $result->fetch(PDO::FETCH_ASSOC);

if ($row && (int)$row['1'] === 1) {
    echo "OK - Connexion BDD OK\n";
    exit(0);
}

echo "ERREUR - Connexion BDD\n";
exit(1);
