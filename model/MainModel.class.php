<?php

class MainModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new Database();
        $this->bdd = $this->bdd->getBdd();
    }

    public function HomePagePosts($id)
    {

        $query = $this->bdd->prepare("SELECT * FROM posts INNER JOIN follow ON posts.id_user = follow.id_followed WHERE id_follower = ? ORDER BY date desc");
        $query->execute(array($id));
        $posts_list = $query->fetchAll();
        return $posts_list;
    }
}
