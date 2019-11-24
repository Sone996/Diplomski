<?php

require 'config.php';
require 'utility/Auth.php';

//use autoloader
ini_set('display_errors', 1);

require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/View.php';
require 'libs/Model.php';
require 'libs/Database.php';
require 'libs/Session.php';
require 'libs/Hash.php';
require 'libs/Form.php';


$bootstrap = new Bootstrap();
$bootstrap ->init();

