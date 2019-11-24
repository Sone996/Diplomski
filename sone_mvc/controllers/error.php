<?php

class My_error extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->title = '404 Error';

        $data = array();
        $data['msg'] = 'This pade doesnt exists';

        $this->view->render('error/index', false, $data);
    }
}
