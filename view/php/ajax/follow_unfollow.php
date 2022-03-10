<?php

include_once("../../../config/connexion/connexion.php");

$id_followed = $_POST['id_followed'];
$id_follower = $_POST['id_follower'];

if ($id_follower != $id_followed) {
    // Vérification de l'existance ou non d'une relation
    $verify = $bdd->prepare("SELECT * FROM follow WHERE id_follower = ? AND id_followed = ?");
    $verify->execute(array($id_follower, $id_followed));
    $result = $verify->rowCount();
    if ($result == 0) {
        // Création d'une relation
        $query = $bdd->prepare("INSERT INTO follow (id_follower,id_followed) VALUES (?,?) ");
        $query->execute(array($id_follower, $id_followed));
    } else {
        // Suppression de la relation
        $query = $bdd->prepare("DELETE FROM follow WHERE id_follower = ? AND id_followed = ? ");
        $query->execute(array($id_follower, $id_followed));
    }
}