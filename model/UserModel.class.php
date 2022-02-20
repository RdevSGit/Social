<?php

class UserModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new Database();
        $this->bdd = $this->bdd->getBdd();
    }

    public function Verify($login)
    {
        $query = $this->bdd->prepare("SELECT login, password FROM user WHERE login = ?");
        $query->execute(array($login));
        $user = $query->fetch();
        return $user;
    }
}
