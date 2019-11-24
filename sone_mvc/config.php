<?php

//Paths
define('URL', 'http://sone-mvc.local/');    // menja se u slucaju promene servera
define('LIBS', 'libs/');

//Database
class Database extends PDO
{

    function __construct()
    {
        parent::__construct('mysql:host=localhost;dbnameSone_MVC', 'root',
            'Nebojsa.Ilic1996');
    }
}

//Constants
//For other
define('HASH_GENERAL_KEY', 'E7r9t8@Q#h%Hy+M');
//For password
define('HASH_PASSWORD_KEY', '2Beers2$50Cents');

