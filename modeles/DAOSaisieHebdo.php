<?php
function getSaisieHebdoByVisiteurId($id){
    $pdo = PDO2::getInstance();
    $stmt = $pdo->prepare("
        SELECT id, date, km_hebdo, id_visiteur, id_vehicule
        FROM saisie_hebdo
        WHERE id_visiteur = :id
    ");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $saisieHebdoData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $saisieHebdos = [];
    foreach ($saisieHebdoData as $saisieHebdo) {
        $saisieHebdos[] = new SaisieHebdo(
            $saisieHebdo['id'],
            $saisieHebdo['date_'],
            $saisieHebdo['km_hebdo'],
            getVisiteurById($saisieHebdo['id_visiteur']),
            getVehiculeById($saisieHebdo['id_vehicule']));
    }
    return $saisieHebdos;
}

function getTotalSaisieHebdoByVisiteurId($id){
    $pdo = PDO2::getInstance();
    $stmt = $pdo->prepare("
        SELECT SUM(km_hebdo) as total
        FROM saisie_hebdo
        WHERE id_visiteur = :id
        GROUP BY id_visiteur
    ");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? (int)$row['total'] : 0;
}

function getSaisieHebdoByVehiculeId($id){
    $pdo = PDO2::getInstance();
    $stmt = $pdo->prepare("
        SELECT id, date, km_hebdo, id_visiteur, id_vehicule
        FROM saisie_hebdo
        WHERE id_vehicule = :id
    ");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $saisieHebdoData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $saisieHebdos = [];
    foreach ($saisieHebdoData as $saisieHebdo) {
        $saisieHebdos[] = new SaisieHebdo(
            $saisieHebdo['id'],
            $saisieHebdo['date_'],
            $saisieHebdo['km_hebdo'],
            getVisiteurById($saisieHebdo['id_visiteur']),
            getVehiculeById($saisieHebdo['id_vehicule']));
    }
    return $saisieHebdos;
}

function getTotalSaisieHebdoByVehiculeId($id){
    $pdo = PDO2::getInstance();
    $stmt = $pdo->prepare("
        SELECT SUM(km_hebdo) as total
        FROM saisie_hebdo
        WHERE id_vehicule = :id
        GROUP BY id_vehicule
    ");

    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? (int)$row['total'] : 0;
}

function addSaisieHebdo($saisieHebdo){
    $pdo = PDO2::getInstance();
    $stmt = $pdo->prepare("
        INSERT INTO saisie_hebdo (date, km_hebdo, id_visiteur, id_vehicule)
        VALUES (:date, :km_hebdo, :id_visiteur, :id_vehicule)
    ");
    $stmt->bindValue(':date', $saisieHebdo->getDate(), PDO::PARAM_STR);
    $stmt->bindValue(':km_hebdo', $saisieHebdo->getKmHebdo(), PDO::PARAM_INT);
    $stmt->bindValue(':id_visiteur', $saisieHebdo->getVisiteur()->getId(), PDO::PARAM_INT);
    $stmt->bindValue(':id_vehicule', $saisieHebdo->getVehicule()->getId(), PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount() > 0;
}
?>