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
        $query = $this->bdd->prepare("SELECT posts.id as post_id, id_user, content, pseudo FROM posts INNER JOIN follow ON posts.id_user = follow.id_followed JOIN users on users.id = posts.id_user WHERE id_follower = ? ORDER BY date desc");
        $query->execute(array($id));
        $posts_list = $query->fetchAll();
        return $posts_list;
    }
}
