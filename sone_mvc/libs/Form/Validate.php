<?php

class Validate
{

    public function __construct()
    {
        
    }
    public function minlength($data, $arg)
    {
        if (strlen($data) < $arg) {
            return "Your name need to be atleast $arg long";
        }
    }

    public function maxlength($data, $arg)
    {
        if (strlen($data) > $arg) {
            return "Your name can only be $arg long";
        }
    }

    public function digit($data)
    {
        if (!ctype_digit($data)) {
            return "Your can use only digits";
        }
    }

    //For calling method that doesnt exist
    public function call($name, $arguments)
    {
        throw new Exception("$name does not exist inside of".__CLASS__);
    }
}
