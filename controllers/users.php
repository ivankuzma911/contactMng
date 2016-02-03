<?php
include('controller.php');
class users extends controller
{

    public $controller = 'users';
    public $class_to_load = array('db.php','redirect.php','session.php','config.php' );

    public function __construct()
    {
        include('models/'.$this->controller.'.php');
        include('views/view.php');
        $model = $this->controller . 'Model';
        $this->model = new $model($this->class_to_load);
    }


    public function login()
    {
        $method = 'login';
        if (isset($_POST['submit'])) {
            if ($this->model->validate_user()) {
                header("location:/records/main");
            } else {
                $this->view = new View($this->controller, $method);
                $notice['view'] = "Please enter your login and password correctly";
                $this->view->set($notice);
                $this->view->display();
            }
        } else {
            $this->view = new View($this->controller, $method);
            $this->view->display();
        }
    }

    public function registrate()
    {
        $method = 'registrate';
        if (isset($_POST['submit'])) {
                $notice['errors'] = $this->model->create_user();
                $notice['notice'] = "Something went wrong";
                $notice['prev_values']= $this->model->getPrevValues();
                $this->view = new View($this->controller, $method);
                $this->view->set($notice);
                $this->view->display();

        } else {
            $this->view = new View($this->controller, $method);
            $this->view->display();

        }
    }

    public function logout()
    {

        if (isset($_COOKIE['checkboxes'])) {
            setcookie("checkboxes", null, time() - 3600, '/');
            setcookie("emailsLenght",null,time()-3600,'/');
        }
        session_destroy();
        header('location:/users/login');
    }
}