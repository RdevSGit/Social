<?php

include_once("../../../config/connexion/connexion.php");

$id = $_GET['id'];

$query = $bdd->prepare("SELECT * FROM commentary JOIN users on commentary.id_user = users.id WHERE id_post = ? ORDER BY date DESC");
$query->execute(array($id));
$comments = $query->fetchAll();


foreach ($comments as $com) { ?>
    <ul>
        <li><a href="index.php?page=profil&amp;id=<?= $com['id'] ?>"><?= htmlspecialchars($com['pseudo']) ?></a> </li>
        <li><?= htmlspecialchars($com['content']) ?></li>
    </ul>
<?php
}
