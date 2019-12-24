<?php
//bolja prakse je da se koristi autoloader ali posto ovaj projekat 
//nije toliko opsiran fajlovi su inkludovani na ovaj nacin
require 'config.php';
require 'utility/Auth.php';

//Za prikazivanje erora
ini_set('display_errors', 1);

require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/View.php';
require 'libs/Model.php';
require 'libs/Database.php';
require 'libs/Session.php';
require 'libs/Hash.php';
//require 'libs/Form.php';


$bootstrap = new Bootstrap();
$bootstrap ->init();

