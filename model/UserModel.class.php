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

    public function UserFriends($id)
    {
        $query = $this->bdd->prepare("SELECT * FROM users WHERE id != ?");
        $query->execute(array($id));
        $user_friends = $query->fetchAll();
        return $user_friends;
    }
}
