<?php

include_once("../../../config/connexion/connexion.php");

$email = $_POST['email'];
$password = $_POST['password'];
$hash_bcrypt = password_hash($password, PASSWORD_DEFAULT);

$verify = $bdd->prepare("SELECT email FROM users WHERE email = ?");
$verify->execute([$email]);
$result = $verify->rowCount();

if ($result == 1) {

    $users = $bdd->prepare("SELECT * FROM users WHERE email = ?");
    $users->execute([$email]);
    $user = $users->fetch();

    if (password_verify($password, $user['password'])) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['user'] = $user['pseudo'];
        echo ('coucuo');
    } else {
        echo ("mot de passe incorrect");
    }
} else {
    echo ("email n'existe pas");
}
