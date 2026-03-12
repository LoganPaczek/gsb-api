<?php
function addVisiteur($visiteur)
{
    $pdo = PDO2::getInstance();
    $stmt = $pdo->prepare("
    INSERT INTO visiteurs (login, password_hash) 
    VALUES (:login, :password_hash)
    ");
    $stmt->bindValue(':login', $visiteur->getLogin(), PDO::PARAM_STR);
    $stmt->bindValue(':password_hash', password_hash($visiteur->getPassword(), PASSWORD_DEFAULT), PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->rowCount() > 0;
}

function updateVisiteur($visiteur)
{
    $pdo = PDO2::getInstance();
    $stmt = $pdo->prepare("
        UPDATE visiteurs 
        SET login = :login, password_hash = :password_hash
        WHERE id = :id
    ");
    $stmt->bindValue(':login', $visiteur->getLogin(), PDO::PARAM_STR);
    $stmt->bindValue(':password_hash', password_hash($visiteur->getPassword(), PASSWORD_DEFAULT), PDO::PARAM_STR);
    $stmt->bindValue(':id', $visiteur->getId(), PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount() > 0;
}

function deleteVisiteur($id)
{
    $pdo = PDO2::getInstance();
    $stmt = $pdo->prepare("
        DELETE FROM visiteurs 
        WHERE id = :id
    ");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount() > 0;
}
?>