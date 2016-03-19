<?php

class Utilisateur extends Table {

    public $email;
    public $pseudo;
    public $mdp;
    public $age;
    public $sexe;
    public $admin;

    public function __construct($e = "", $p = "",$m = "" , $a = "", $s = "", $ad = "") {

        parent::__construct();

        $this->email = $e;
        $this->pseudo = $p;
        $this->mdp = $m;
        $this->age = $a;
        $this->sexe = $s;
        $this->admin = $ad;

    }
}