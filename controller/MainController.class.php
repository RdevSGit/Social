<?php

require_once("model/MainModel.class.php");

class MainController
{

    private $mainmodel;

    public function __construct()
    {
        $this->mainmodel = new MainModel();
    }

    public function HomePage()
    {
        if (!empty($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $posts_list = $this->mainmodel->HomePagePosts($id);
        }
        $template = "home";
        include "view/layout.phtml";
    }
}
