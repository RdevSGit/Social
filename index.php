<?php

session_start();

//appel de la bdd
require("config/Database.class.php");

//appel des controllers
require("controller/MainController.class.php");

//instanciation des classes
$MainController = new MainController();


if (isset($_GET["page"])) {
    switch ($_GET['page']) {
    }
} else {
    $MainController->ShowHomePage();
}
