<?php

class Database
{
    private $bdd;

    public function __construct()
    {
        //connexion à la bdd à mettre dans la proporiété bdd
        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=social;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function getBdd()
    {
        return $this->bdd;
    }
}
