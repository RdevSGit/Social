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

    public function Post()
    {

        $content = $_POST['post_area'];
        $id = $_SESSION['id'];
        $size = $_FILES['fichier']['size'];
        $name = $_FILES['fichier']['name'];
        $type = $_FILES['fichier']['type'];
        $bin = $_FILES['fichier']['tmp_name'];

        if (!empty(trim($content)) || !empty($size)) {
            $this->mainmodel->PostIt($content, $size, $name, $type, $bin, $id);
        }
        header("location:index.php?page=home");
    }

    public function Comment()
    {
        $id_user = $_SESSION['id'];
        $id_post = $_GET['id_post'];
        $content = $_POST['comment_input'];

        if (!empty($content)) {
            $this->mainmodel->CommentPost($id_user, $id_post, $content);
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
