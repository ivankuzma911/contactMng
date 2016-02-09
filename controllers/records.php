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

    public function ajaxMain($params){
        if ($params === null) {
            $params = DEFAULT_SORTING;
            $params = explode('/', $params);
        }

        $method = 'ajaxMain';
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

    public function ajaxEvent($params){
        if ($params === null) {
            $params = '1/first/true/true';
            $params = explode('/', $params);
        }
        $method = 'ajaxEvent';
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

        if ($records['records']['db']->num_rows != 0) {
            $records['records']['view'] = '1';
            $this->view->set($records);
        } else {
            $records['records']['view'] = 0;
            $this->view->set($records);
        }
        $this->view->display();
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
        $records['records']['arrows'] = formConstruct::getArrows($params[0], $total_pages, $params, $method = 'ajaxMain');
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
        if ($params === null) {
            $params = '1/first/true/true';
            $params = explode('/', $params);
        }
        $method = 'Event';
        $this->view = new View($this->controller, $method);
        $total_pages = $this->model->countRows();
        $records['records']['generate_url_first'] = formConstruct::getUrl($params, 'first', $method);
        $records['records']['generate_url_last'] = formConstruct::getUrl($params, 'last', $method);
        $records['records']['arrows'] = formConstruct::getArrows($params[0], $total_pages, $params, $method = 'ajaxEvent');
        $records['records']['db'] = $this->model->getRecords($params);
        $records['records']['sort_arrows'] = $params;
        $records['records']['generate_url_all'] = $this->model->getAllUrl($params);
        $records['records']['reset_button']=$this->model->getAllUrl($params,'reset');
        $records['records']['reset_info']= $this->model->checkReset($params);
        $records['records']['allCheckboxes'] = $this->model->allCheckboxes($params);

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
        $this->view = new View($this->controller, $method);
        if (isset($_POST['submit_add'])) {
            $to_view['errors']['errors'] = $this->model->addContact();
            $to_view['prev_values']['prev_values']= $this->model->getPrevValues();
            $this->view->set($to_view);
            }
        $this->view->display();
    }

    public function edit($id)
    {
        if(isset($_POST['submit_edit'])){
            $method = 'edit';
            $this->view = new View($this->controller, $method);
            $to_view['errors']['errors'] = $this->model->addContact('edit',$id);
            $to_view['prev_values']['prev_values']= $this->model->getPrevValues();
            $this->view->set($to_view);
            $this->view->display();
        }else {
            $method = 'edit';
            $this->view = new View($this->controller, $method);
            $record['result'] = $this->model->getRecordById($id);
            $record['best_phone'] = best_phone::get_to_view($record['result']);
            $record['result']['birthday'] = $this->model->editDate($record['result']['birthday']);
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
        $method = 'emails';
        $emails['emails'] = $this->model->getEmails();
        $this->view = new View($this->controller, $method);
        $this->view->set($emails);
        $this->view->display();
    }

    public function sendmail()
    {
            $method = 'sendmail';
            $added_emails['added_emails'] = $this->model->addedEmails();
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