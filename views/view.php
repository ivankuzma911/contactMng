<?php
class view{
    public $notice;
    public $data = array();
    public $controller;
    public $method;

    public function __construct($controller,$method){
       $this->controller = $controller;
        $this->method = $method;
    }

    public function set($to_view){
        $this->data = $to_view;
        return $this->data;
    }

    public function display(){
        extract($this->data);
        include ($this->controller."/" . $this->method . ".php");
    }

}

