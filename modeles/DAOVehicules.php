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

function getVehiculeById($id)
{
    $pdo = PDO2::getInstance();
    $stmt = $pdo->prepare("
        SELECT id, immatriculation, marque, modele
        FROM vehicules
        WHERE id = :id
    ");

    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $vehicule = $stmt->fetch(PDO::FETCH_ASSOC);
    return new Vehicule($vehicule['id'], $vehicule['immatriculation'], $vehicule['marque'], $vehicule['modele'], []);
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

function updateVehicule($vehicule)
{
    $pdo = PDO2::getInstance();
    $stmt = $pdo->prepare("
        UPDATE vehicules 
        SET immatriculation = :immatriculation, marque = :marque, modele = :modele
        WHERE id = :id
    ");
    $stmt->bindValue(':immatriculation', $vehicule->getImmatriculation(), PDO::PARAM_STR);
    $stmt->bindValue(':marque', $vehicule->getMarque(), PDO::PARAM_STR);
    $stmt->bindValue(':modele', $vehicule->getModele(), PDO::PARAM_STR);
    $stmt->bindValue(':id', $vehicule->getId(), PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount() > 0;
}

function deleteVehicule($id)
{
    $pdo = PDO2::getInstance();
    $stmt = $pdo->prepare("
        DELETE FROM vehicules 
        WHERE id = :id
    ");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount() > 0;
}
?>