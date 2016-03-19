<?php

class Article extends Table {

    public $titre;
    public $contenu;
    public $id_author;
    public $coeur;

    public function __construct($t = "",$c = "" , $i = "", $co = "") {

        parent::__construct();

        $this->titre = $t;
        $this->contenu = $c;
        $this->id_author = $i;
        $this->coeur = $co;

    }
}