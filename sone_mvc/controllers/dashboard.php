<?php

class Dashboard extends Controller
{

    public function __construct()
    {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('dashboard/js/default.js');
    }

    public function index()
    {
        $this->view->title         = 'Dashboard';
        $this->view->dashboardList = $this->model->dashboardList();
        $this->view->render('dashboard/index');
    }

    public function create()
    {
        $data = array(
            'title' => isset($_POST['title']) ? $_POST['title'] : '',
            'text' => isset($_POST['text']) ? $_POST['text'] : ''
        );
        if (!empty($data['title']) && !empty($data['text'])) {
            $this->model->create($data);
            header('location: ../dashboard');
        }
    }

    public function selectUser()
    {
        $id   = $_POST['id'];
        $data = $this->model->dashboardSingleList($id);
        echo json_encode($data);
    }

    public function edit_save_data()
    {
        $data = array(
            'id' => $_POST['id'],
            'title' => $_POST['title'],
            'text' => $_POST['text']
        );
        if (!empty($data['title']) && !empty($data['text'])) {
            $result = $this->model->edit_save_data($data);
            return $result;
        }
    }

    function deleteAjax()
    {
        $id     = $_GET['id'];
        $result = $this->model->delete($id);
        echo $result;
    }

    function logout()
    {
        My_session::destroy();
        header('location: '.URL.'login');
        exit;
    }
}
