<?php

class Login_model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {
        $login    = $_POST['login'];
        $password = Hash::create('sha512', $_POST['password'], HASH_PASSWORD_KEY);
        $sth      = $this->db->prepare("SELECT * FROM users WHERE login = :login AND password = :password");
        $sth->execute(array(
            ':login' => $login,
            ':password' => $password
        ));
        
        $data = $sth->fetch();

        $count = $sth->rowCount();
        if ($count > 0) {
            //login
            My_session::init();
            My_session::set('role', $data['role']);
            My_session::set('logged_in', true);
            My_session::set('data', $data);
            header('location: ../dashboard');
        } else {
            //error
            header('location: ../login');
        }
    }
}
