<?php

include_once("../../../config/connexion/connexion.php");

$pseudo = $_POST['pseudo'];
$email = $_POST['email'];
$password = $_POST['password'];
$hash_bcrypt = password_hash($password, PASSWORD_DEFAULT);

$verify_email = $bdd->prepare("SELECT email FROM users WHERE email = ?");
$verify_email->execute([$email]);
$result_email = $verify_email->rowCount();

if ($result_email == 0) {
    $verify_pseudo = $bdd->prepare("SELECT pseudo FROM users WHERE pseudo = ?");
    $verify_pseudo->execute([$pseudo]);
    $result_pseudo = $verify_pseudo->rowCount();
    if ($result_pseudo == 0) {
        $query = $bdd->prepare("INSERT INTO users (pseudo, email, password) VALUES (?,?,?)");
        $query->execute([$pseudo, $email, $hash_bcrypt]);
        $res = $query->fetch();
        echo $res['id'];
        echo json_encode(0);
    } else {
        echo json_encode(2);
    }
} else {
    echo json_encode(1);
}
