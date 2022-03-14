<?php

include_once("../../../config/connexion/connexion.php");

$id = $_GET['id'];

$query = $bdd->prepare("SELECT id, content FROM posts WHERE id = ?");
$query->execute(array($id));
$res = $query->fetch();

echo ($res['content']);
