<?php

include_once("../../../config/connexion/connexion.php");

$id = $_GET['id'];

$query = $bdd->prepare("SELECT * FROM commentary WHERE id_post = ? ORDER BY date DESC");
$query->execute(array($id));
$comments = $query->fetchAll();

foreach ($comments as $com) { ?>
    <li> <?= $com['content'] ?></li>
<?php

}
