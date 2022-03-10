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
        $id = $_SESSION['id'];
        $id_followed = $_GET['id'];
        $user_info = $this->usermodel->UserInfo($id_followed);  
        $user_post_list = $this->usermodel->UserPostList($id);
        $follow_post_list = $this->usermodel->UserPostList($id_followed);
        $user_friends = $this->usermodel->UserFriends($id, $id_followed);
        
        $template = "profil_page";
        include "view/layout.phtml";
    }

    public function FriendsList(){
        $id = $_GET['id'];
        $follow_list = $this->usermodel->Friends($id);
        $template = "follow_list";
        include "view/layout.phtml";
    }
    public function DestroySession()
    {
        session_start();
        session_destroy();
        header("location:index.php?page=home");
    }
}
