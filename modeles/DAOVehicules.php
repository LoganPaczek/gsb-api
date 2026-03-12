<?php
function getAllVehicules()
{
    $pdo = PDO2::getInstance();
    $stmt = $pdo->prepare("
        SELECT id, immatriculation, marque, modele
        FROM vehicules
        ORDER BY marque, modele
    ");
    $stmt->execute();
    $vehicules = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return array_map(function($vehicule) {
        return new Vehicule($vehicule['id'], $vehicule['immatriculation'], $vehicule['marque'], $vehicule['modele'], []);
    }, $vehicules);
}

function addVehicule($vehicule)
{
    $pdo = PDO2::getInstance();
    $stmt = $pdo->prepare("
        INSERT INTO vehicules (immatriculation, marque, modele)
        VALUES (:immatriculation, :marque, :modele)
    ");

    $stmt->bindValue(':immatriculation', $vehicule->getImmatriculation(), PDO::PARAM_STR);
    $stmt->bindValue(':marque', $vehicule->getMarque(), PDO::PARAM_STR);
    $stmt->bindValue(':modele', $vehicule->getModele(), PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->rowCount() > 0;
}
?>