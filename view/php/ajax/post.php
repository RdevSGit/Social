<?php

include_once("../../../config/connexion/connexion.php");

$content = htmlspecialchars($_POST['content']);
$id = $_SESSION['id'];

$query = $bdd->prepare("INSERT INTO posts (content, id_user) VALUES (?,?)");
$query->execute(array($content, $id));
