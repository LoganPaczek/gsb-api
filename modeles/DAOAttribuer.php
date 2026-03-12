<?php
function getAttributionsByVisiteurId($id)
{
    $pdo = PDO2::getInstance();
    $stmt = $pdo->prepare("
        SELECT id_visiteur, id_vehicule, date_debut, date_fin
        FROM attribuer
        WHERE id_visiteur = :id
    ");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $attribution = $stmt->fetch(PDO::FETCH_ASSOC);
    return new Attribution(
        getVisiteurById($attribution['id_visiteur']),
        getVehiculeById($attribution['id_vehicule']),
        $attribution['date_debut'],
        $attribution['date_fin']);
}

function getAttributionsByVehiculeId($id)
{
    $pdo = PDO2::getInstance();
    $stmt = $pdo->prepare("
        SELECT id_visiteur, id_vehicule, date_debut, date_fin
        FROM attribuer
        WHERE id_vehicule = :id
    ");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $attribution = $stmt->fetch(PDO::FETCH_ASSOC);
    return new Attribution(
        getVisiteurById($attribution['id_visiteur']),
        getVehiculeById($attribution['id_vehicule']),
        $attribution['date_debut'],
        $attribution['date_fin']);
}
function addAttribution($attribution)
{
    $pdo = PDO2::getInstance();
    $stmt = $pdo->prepare("
        INSERT INTO attribuer (id_visiteur, id_vehicule, date_debut, date_fin)
        VALUES (:id_visiteur, :id_vehicule, :date_debut, :date_fin)
    ");
    $stmt->bindValue(':id_visiteur', $attribution->getVisiteur()->getId(), PDO::PARAM_INT);
    $stmt->bindValue(':id_vehicule', $attribution->getVehicule()->getId(), PDO::PARAM_INT);
    $stmt->bindValue(':date_debut', $attribution->getDateDebut(), PDO::PARAM_STR);
    $stmt->bindValue(':date_fin', $attribution->getDateFin(), PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->rowCount() > 0;
}
?>