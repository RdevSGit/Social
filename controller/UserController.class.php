<?php

require_once("model/UserModel.class.php");

class UserController
{

    private $usermodel;

    public function __construct()
    {
        $this->usermodel = new UserModel();
    }

    public function ConnexionPage()
    {
        $template = "connexion_page";
        include "view/layout.phtml";
    }

    public function CreateAccountPage()
    {
        $template = "create_account_page";
        include "view/layout.phtml";
    }

    public function ProfilPage()
    {
        $id = $_GET['id'];
        $user_info = $this->usermodel->UserInfo($id);
        $user_friends = $this->usermodel->UserFriends($id);
        $template = "profil_page";
        include "view/layout.phtml";
    }
    public function DestroySession()
    {
        session_start();
        session_destroy();
        header("location:index.php?page=home");
    }
}
