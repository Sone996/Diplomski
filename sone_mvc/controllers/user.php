<?php

class User extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();

        //provera da li je ulogovani owner ili admin kako bi pristupili user stranici
        $role = $_SESSION['role'];
        if ($role != 'owner' && $role != 'admin') {
            My_session::destroy();
            header('location: ' . URL . 'login');
            exit();
        }
        $this->view->js = array('dashboard/js/default.js');
    }

    function index() {
        $this->view->title = 'Users';
        $this->view->userList = $this->model->userList();
        $this->view->render('user/index', false, $data = array());
    }

    function createUser() {
        $data = array();
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];
        if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['role'])) {
            if (preg_match('/[^A-Za-z]/', $data['login']) || preg_match('/[^A-Za-z]/',
                            $data['password'])) {
//                header('location: ' . URL . 'user');
//                return false;
                echo 'Dont use white speces or special characters!';
                http_response_code(400);
            } else {
//                return $result;
                $result = $this->model->createUser($data);
//                header('location: ' . URL . 'user');
                echo 'SUCCESS!';
            }
        } else {
//            return false;
            http_response_code(400);
            echo 'Invalid input. Please enter all the input fields in form and dont use blank spaces or special characters';
        }
    }

    function editUser($id) {
        $data = $this->model->userSingleList($id);
        // izbacuje iz jednog niza jer na kraju bude array(array(......))
        $data = reset($data);
        $this->view->render('user/edit_user', false, $data);
    }

    function editSave($id) {
        $data = array();
        $data['id'] = $id;
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];
        if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['role'])) {
            if (preg_match('/\s/', $_POST['login']) || preg_match('/\s/',
                            $_POST['password'])) {
                header('location: ' . URL . 'user');
            } else {
                $this->model->editSave($data);
                header('location: ' . URL . 'user');
            }
        }
    }

    function deleteUserAjax() {
        $id = $_GET['id'];
        $result = $this->model->deleteUser($id);
        echo $result;
    }

}
