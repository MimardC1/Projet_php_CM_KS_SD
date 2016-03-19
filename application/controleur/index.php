<?php

/**
 * Class Index
 * The index controller
 */
class Index extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Handles what happens when user moves to URL/index/index, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    function index()
    {
        $this->loadModel("ArticleSQL");
        $model_article = new ArticleSQL();

        $this->view->articles = $model_article->findAll()->limit(0,3)->execute();

        $this->view->render('index/index');
    }
}
