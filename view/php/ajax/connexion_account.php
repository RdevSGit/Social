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

    $id_user = $user['id'];

    if (password_verify($password, $user['password'])) {

        $follow = $bdd->prepare("SELECT * FROM follow WHERE id_follower = ? AND id_followed = ?");
        $follow->execute(array($user['id'], $user['id']));
        $res = $follow->rowCount();

        if ($res == 0) {
            $addfollow = $bdd->prepare('INSERT INTO follow (id_follower, id_followed) VALUES (?,?)');
            $addfollow->execute(array($user['id'], $user['id']));
        } 

        $_SESSION['id'] = $user['id'];
        $_SESSION['user'] = $user['pseudo'];
        
    } else {
        echo ("mot de passe incorrect");
    }
} else {
    echo ("email n'existe pas");
}
