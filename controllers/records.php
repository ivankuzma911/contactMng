<?php

include('controller.php');
class records extends controller
{

    public $controller = 'records';


    public function __construct()
    {
        include('models/'.$this->controller.'.php');
        include('views/view.php');
        $model = $this->controller . 'Model';
        $this->model = new $model('all');
        $this->model->checkuser();
    }


    public function main($params = null)
    {
        if ($params === null) {
            $params = DEFAULT_SORTING;
            $params = explode('/', $params);
        }
        $method = 'main';
        $this->view = new View($this->controller, $method);
        $total_pages = $this->model->countRows();
        $records['records']['generate_url_first'] = formConstruct::getUrl($params, 'first', $method);
        $records['records']['generate_url_last'] = formConstruct::getUrl($params, 'last', $method);
        $records['records']['db'] = $this->model->getRecords($params);
        $records['records']['arrows'] = formConstruct::getArrows($params[0], $total_pages, $params, $method);
        $records['records']['sort_arrows'] = $params;
        if (($records['records']['db']->num_rows) != 0) {
            $records['records']['view'] = '1';
            $this->view->set($records);
        } else {
            $records['records']['view'] = 0;
            $this->view->set($records);
        }
        $this->view->display();
    }


    public function event($params = null)
    {
        $this->model->deleteCheckboxes();
        $this->model->saveCheckboxes();
        if ($params === null) {
            $params = '1/first/true/true';
            $params = explode('/', $params);
        }
        $method = 'event';
        $this->view = new View($this->controller, $method);
        $total_pages = $this->model->countRows();
        $records['records']['generate_url_first'] = formConstruct::getUrl($params, 'first', $method);
        $records['records']['generate_url_last'] = formConstruct::getUrl($params, 'last', $method);
        $records['records']['arrows'] = formConstruct::getArrows($params[0], $total_pages, $params, $method);
        $records['records']['db'] = $this->model->getRecords($params);
        $records['records']['sort_arrows'] = $params;
        $records['records']['generate_url_all'] = $this->model->getAllUrl($params);
        $records['records']['reset_button']=$this->model->getAllUrl($params,'reset');
        $records['records']['reset_info']= $this->model->checkReset($params);
        $records['records']['allCheckboxes'] = $this->model->allCheckboxes($params);
        $records['records']['checked_records'] = $this->model->countRecords($records['records']['db']);
        if ($records['records']['db']->num_rows != 0) {
            $records['records']['view'] = '1';
            $this->view->set($records);
        } else {
            $records['records']['view'] = 0;
            $this->view->set($records);
        }
        $this->view->display();
    }


    public function add()
    {
        $method = 'add';
        if (!isset($_POST['submit_add'])) {
            $this->view = new View($this->controller, $method);
            $this->view->display();
        } else {
            if(!$this->model->addContact()){
                $this->view = new View($this->controller, $method);
                $this->view->display();
            }
        }
    }

    public function edit($id)
    {
        $method = 'edit';
        if (isset($_POST['submit_edit'])) {
            $this->model->edit_record($id);
            header("location:/records/main");
        } else {
            $this->view = new View($this->controller, $method);
            $record['result'] = $this->model->getRecordById($id);
            $record['best_phone'] = best_phone::get_to_view($record['result']);
            $this->view->set($record);
            $this->view->display();
        }
    }

    public function delete($id)
    {
        $method = 'delete';
        if (isset($_POST['submit'])) {
            $this->model->deleteContact($id);
            header("location:/records/main");
        } else {
            $this->view = new View($this->controller, $method);
            $this->view->display();
        }
    }

    public function emails()
    {
        $this->model->saveCheckboxes();
        $method = 'emails';
        $this->view = new View($this->controller, $method);
        $records['emails'] = $this->model->getEmails();
        $this->view->set($records);
        $this->view->display();
    }

    public function sendmail()
    {
        $method = 'sendmail';
        $added_emails['added_emails'] = $this->model->checkEmails();
        $this->view = new View($this->controller, $method);
        $this->view->set($added_emails);
        $this->view->display();
    }

    public function insert()
    {
        if ($this->model->saveEmails()) {
            redirect::to('/records/main');
        }
    }
}