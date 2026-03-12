<?php

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