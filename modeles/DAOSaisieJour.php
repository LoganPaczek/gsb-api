<?php
function getSaisieJourByVisiteurId($id){
    $pdo = PDO2::getInstance();
    $stmt = $pdo->prepare("
        SELECT id, date, km_journee, id_visiteur, id_vehicule
        FROM saisie_jour
        WHERE id_visiteur = :id
    ");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $saisieJourData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($saisieJourData as $saisieJour) {
        $saisieJours[] = new SaisieJour(
            $saisieJour['id'],
            $saisieJour['date'],
            $saisieJour['km_journee'],
            getVisiteurById($saisieJour['id_visiteur']),
            getVehiculeById($saisieJour['id_vehicule']));
    }
    return $saisieJours;
}

function getSaisieJourByVehiculeId($id){
    $pdo = PDO2::getInstance();
    $stmt = $pdo->prepare("
        SELECT id, date, km_journee, id_visiteur, id_vehicule
        FROM saisie_jour
        WHERE id_vehicule = :id
    ");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $saisieJourData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($saisieJourData as $saisieJour) {
        $saisieJours[] = new SaisieJour(
            $saisieJour['id'],
            $saisieJour['date'],
            $saisieJour['km_journee'],
            getVisiteurById($saisieJour['id_visiteur']),
            getVehiculeById($saisieJour['id_vehicule']));
    }
    return $saisieJours;
}

function addSaisieJour($saisieJour){
    $pdo = PDO2::getInstance();
    $stmt = $pdo->prepare("
        INSERT INTO saisie_jour (date, km_journee, id_visiteur, id_vehicule)
        VALUES (:date, :km_journee, :id_visiteur, :id_vehicule)
    ");
    $stmt->bindValue(':date', $saisieJour->getDate(), PDO::PARAM_STR);
    $stmt->bindValue(':km_journee', $saisieJour->getKmJournee(), PDO::PARAM_INT);
    $stmt->bindValue(':id_visiteur', $saisieJour->getVisiteur()->getId(), PDO::PARAM_INT);
    $stmt->bindValue(':id_vehicule', $saisieJour->getVehicule()->getId(), PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount() > 0;
}
?>