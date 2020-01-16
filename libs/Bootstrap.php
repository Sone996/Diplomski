<?php

class Bootstrap
{
    private $url             = null;
    private $controller      = null;
    private $controller_path = 'controllers/';
    private $model_path      = 'models/';
    private $error_file      = 'error.php';
    private $default_file    = 'index.php';

    //starts the bootsrtap
    public function init()
    {
        //set protected url
        $this->get_URL();

        //load default controler if url is set
        if (empty($this->url[0])) {
            $this->load_default_controller();
            return false;
        }

        //load existing controller if exist
        $this->load_existing_controller();

        //calling method if is passed in the GET url parameter
        $this->call_controller_method();
    }

    private function get_URL()
    {
        $this->url = isset($_GET['url']) ? $_GET['url'] : null;   //default index
        $this->url = str_replace('-', '', $this->url);
        $this->url = filter_var($this->url, FILTER_SANITIZE_URL);
        $this->url = rtrim($this->url, '/');   //izbacuje '/' sa kraja url-a
        $this->url = explode('/', $this->url);
    }

    public function set_controller_path($path)
    {
        $this->controller_path = trim($path, '/').'/';
    }

    public function set_model_path($path)
    {
        $this->model_path = trim($path, '/').'/';
    }

    public function set_error_file($path)
    {
        $this->error_file = trim($path, '/');
    }

    public function set_default_file($path)
    {
        $this->default_file = trim($path, '/');
    }

    private function load_default_controller()
    {

        require $this->controller_path.$this->default_file;
        $this->controller = new index();
        $this->controller->index();
    }

    private function load_existing_controller()
    {
        $file = $this->controller_path.$this->url[0].'.php';
        if (file_exists($file)) {
            require $file;
            $this->controller = new $this->url[0];
            $this->controller->load_model($this->url[0]);
        } else {
//            require 'controllers/error.php';
//            $controller = new My_error();
//            return false;
            $this->F_error();
        }
    }

    /**
     * If a method is passed in the GET url paremter
     *
     *  http://localhost/controller/method/(param)/(param)/(param)
     *  url[0] = Controller
     *  url[1] = Method
     *  url[2] = Param
     *  url[3] = Param
     *  url[4] = Param
     */
    public function call_controller_method()
    {
        $length = count($this->url);
        // Make sure the method calling exists
        if ($length > 1) {
            if (!method_exists($this->controller, $this->url[1])) {
                $this->F_error();
            }
        }
        // Determine what to load
        switch ($length) {
            case 5:
                //Controller->Method(Param1, Param2, Param3)
                $this->controller->{$this->url[1]}($this->url[2], $this->url[3],
                    $this->url[4]);
                break;

            case 4:
                //Controller->Method(Param1, Param2)
                $this->controller->{$this->url[1]}($this->url[2], $this->url[3]);
                break;

            case 3:
                //Controller->Method(Param1)
                $this->controller->{$this->url[1]}($this->url[2]);
                break;

            case 2:
                //Controller->Method()
                $this->controller->{$this->url[1]}();
                break;

            default:
                $this->controller->index();
                break;
        }
    }


//    function call_controller_method()
//    {
//        print_r($this->url);
//        $length = count($this->url);
//        if ($length > 1) {
//            if (!method_exists($this->controller, $this->url[1])) {
//                $this->F_error();
//            }
//
//            $params = $this->url;
//            //unset($params[0]); // removing controller
//            //unset($params[1]); // removing method
//
//            call_user_func_array(array($this->controller, $this->url[1]),
//                $params);
//        }
//    }

    //error if page doesnt exist
    public function F_error()
    {
        //require 'controllers/error.php';
        require $this->controller_path.$this->error_file;
        
        $this->controller = new My_error();
        $this->controller->index();
        exit;
    }
}
