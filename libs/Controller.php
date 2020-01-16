<?php

class Controller
{

    function __construct()
    {
        $this->view = new View();
    }

    public function load_model($name, $model_path='models/')
    {
        $path = $model_path.$name.'_model.php';
        if (file_exists($path)) {
            require $model_path.$name.'_model.php';
            $model_name  = $name.'_Model';
            $this->model = new $model_name();
        }
    }
}
