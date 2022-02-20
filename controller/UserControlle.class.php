<?php

require_once("model/UserModel.class.php");

class UserController
{

    private $usermodel;

    public function __construct()
    {
        $this->usermodel = new UserModel();
    }

    public function CreateAccountPage()
    {
        $template = "create_account";
        include "view/layout.phtml";
    }

    public function ConnectUser()
    {
        $login = $_POST["login"];
        $password = $_POST["password"];

        $user = $this->usermodel->Verify($login);

        if ($user == false) {
            header('location:index.php');
            exit;
        } else if (password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['login'];
            header('location:index.php');
            exit;
        }
    }
}
