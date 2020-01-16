<?php

class Auth
{

    public static function handleLogin()
    {
        session_start();
        $logged = (array_key_exists('logged_in', $_SESSION)) ? $_SESSION['logged_in'] : null;

        if (!$logged) {
            session_destroy();
            header('Location: ' . URL. 'login');
            exit;
        }


    }
}
