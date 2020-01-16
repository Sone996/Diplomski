<?php

class Help extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->title = 'Help';
        $this->view->render('help/index');
    }

    public function other($arg = false)
    {
        require 'models/help_model.php';
        $model            = new Help_model();
        return $model;
    }
}
