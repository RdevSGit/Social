<?php

class UserModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new Database();
        $this->bdd = $this->bdd->getBdd();
    }

    public function UserInfo($id)
    {
        $query = $this->bdd->prepare("SELECT * FROM users WHERE id = ?");
        $query->execute(array($id));
        $user_info = $query->fetch();
        return $user_info;
    }

    public function UserFriends($id, $id_followed)
    {
        $query = $this->bdd->prepare("SELECT * FROM follow WHERE id_follower = ? AND id_followed = ?");
        $query->execute(array($id, $id_followed));
        $result = $query->fetch();
        return $result;
    }

    public function Friends($id)
    {
        $query = $this->bdd->prepare("SELECT * FROM follow JOIN users on follow.id_followed = users.id WHERE id_follower = ?");
        $query->execute(array($id));
        $follow_list = $query->fetchAll();
        return $follow_list;
    }

    public function UserPostList($id)
    {

        $query = $this->bdd->prepare("SELECT * FROM posts WHERE id_user = ? ORDER BY date DESC");
        $query->execute(array($id));
        $user_post_list = $query->fetchAll();
        return $user_post_list;
    }
}
