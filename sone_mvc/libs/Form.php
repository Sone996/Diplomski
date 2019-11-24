<?php
require 'Form/Validate.php';

Class Form
{
    //Store posted data
    private $postdata    = array();
    //Immediatelt posted data
    private $currentitem = null;
    //Validator object
    private $val_obj     = array();
    //Current form errors
    private $error       = array();

    public function __construct()
    {
        $this->val_obj = new Validate();
    }

    public function post($field)
    {
        $this->postdata[$field] = filter_input(INPUT_POST, $field);
        $this->currentitem      = $field;
        return $this;
    }

    //----------- GETTER -----------------------
    public function fetch($fiedname = false)
    {
        if ($fiedname) {
            if (isset($this->postdata[$fiedname])) {
                return $this->postdata[$fiedname];
            } else {
                return false;
            }
        } else {
            return $this->postdata;
        }
    }

    public function validate($type_of_validator, $arg = null)
    {
        if ($arg == null) {
            $err = $this->val_obj->{$type_of_validator}($this->postdata[$this->currentitem]);
        } else {
            $err = $this->val_obj->{$type_of_validator}($this->postdata[$this->currentitem],
                $arg);
        }
        if ($err) {
            $this->error[$this->currentitem] = $err;
        }
        return $this;
    }

    public function subm()
    {
        if (empty($this->error)) {
            return true;
        } else {
            $str = '';
            foreach ($this->error as $key => $value) {
                $str .= $key.' => '.$value."\n";
            }
            throw new Exception($str);
        }
    }
}
