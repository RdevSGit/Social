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
        $query = $this->bdd->prepare("SELECT posts.id as post_id, posts.id_user, posts.content, pseudo , bin FROM posts 
        INNER JOIN follow ON posts.id_user = follow.id_followed 
        INNER JOIN users on users.id = posts.id_user 
        LEFT JOIN media on posts.id = media.id_post
        WHERE id_follower = ? ORDER BY posts.date DESC");
        $query->execute(array($id));
        $posts_list = $query->fetchAll();
        return $posts_list;
    }

    public function PostIt($content, $size, $name, $type, $bin, $id)
    {
        $query = $this->bdd->prepare("INSERT INTO posts (content, id_user) VALUES (?,?)");
        $query->execute(array($content, $id));

        $query2 = $this->bdd->prepare("SELECT MAX(id) FROM posts");
        $query2->execute(array());
        $last_id = $query2->fetch();

        if (!empty($size)) {
            $query = $this->bdd->prepare("INSERT INTO media (name, size, type, bin, id_post) VALUES (?,?,?,?,?)");
            $query->execute(array($name, $size, $type, file_get_contents($bin), $last_id[0]));
        }
    }

    public function CommentPost($id_user, $id_post, $content)
    {

        $query = $this->bdd->prepare("INSERT INTO commentary (content, id_user, id_post) VALUES (?,?,?)");
        $query->execute(array($content, $id_user, $id_post));
    }
}
