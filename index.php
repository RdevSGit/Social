<?php

session_start();

//appel de la bdd
require("config/Database.class.php");

//appel des controllers
require("controller/MainController.class.php");
require("controller/UserControlle.class.php");
//instanciation des classes
$MainController = new MainController();
$UserController = new UserController();

if (isset($_GET["page"])) {
    switch ($_GET['page']) {
        case "home":
            $MainController->ShowHomePage();
            break;
        case 'connect_user':
            $UserController->ConnectUser();
            break;
    }
} else {
    $MainController->ShowHomePage();
}
