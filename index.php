<?php

session_start();

//appel de la bdd
require("config/Database.class.php");

//appel des controllers
require("controller/MainController.class.php");
require("controller/UserController.class.php");
//instanciation des classes
$MainController = new MainController();
$Usercontroller = new Usercontroller();


if (isset($_GET["page"])) {
    switch ($_GET['page']) {
        case 'connexion_page':
            $Usercontroller->ConnexionPage();
            break;
        case 'create_account_page':
            $Usercontroller->CreateAccountPage();
            break;
        case 'home':
            $MainController->HomePage();
            break;
        case 'destroy_session':
            $Usercontroller->DestroySession();
            break;
        case 'profil':
            $Usercontroller->ProfilPage();
            break;
        case 'friends_list':
            $Usercontroller->FriendsList();
            break;
        case 'post':
            $MainController->Post();
            break;
        case 'comment':
            $MainController->Comment();
            break;
    }
} else {
    $MainController->HomePage();
}
