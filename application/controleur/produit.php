<?php


class Produit extends Controller
{

    function __construct()
    {
        parent::__construct();
    }


    function index()
    {
        $this->view->render('produit/index');
    }

}