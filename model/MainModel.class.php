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
    public function HomePageImg()
    {
        $query = $this->bdd->prepare("SELECT bin FROM media");
        $query->execute(array());
        $img_list = $query->fetchAll();
        return $img_list;
    }
    public function PostIt($content, $size, $name, $type, $bin, $id)
    {
        $query = $this->bdd->prepare("INSERT INTO posts (content, id_user) VALUES (?,?)");
        $query->execute(array($content, $id));
        if (!empty($size)) {
            $query = $this->bdd->prepare("INSERT INTO media (name, size, type, bin) VALUES (?,?,?,?)");
            $query->execute(array($name, $size, $type, file_get_contents($bin)));
        }
    }
}
