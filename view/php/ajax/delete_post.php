<?php

include_once("../../../config/connexion/connexion.php");

$id = $_POST["id"];

$query = $bdd->prepare("DELETE FROM posts WHERE id = ?");
$query->execute(array($id));