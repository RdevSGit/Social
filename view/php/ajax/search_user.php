<?php

include_once("../../../config/connexion/connexion.php");

$id = $_SESSION['id'];
$input = $_GET['input'];

$query = $bdd->prepare("SELECT * FROM users WHERE pseudo LIKE ? AND id != ?");
$query->execute(array("%" . $input . "%", $id));
$result = $query->fetchAll();

foreach ($result as $res) { ?>
    <li><a href="index.php?page=profil&amp;id=<?= $res['id'] ?>"><?= $res['pseudo'] ?></a></li>
<?php
}