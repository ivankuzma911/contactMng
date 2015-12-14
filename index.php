<?php

class Dispatcher
{
    protected $default_controller = 'records',
              $default_method = 'main';


    public   $path,
             $controller,
             $method,
             $params;

    public function __construct()
    {

        $this->path = $_SERVER['REQUEST_URI'];
        $this->path = explode('/', $this->path);
        array_shift($this->path);
        if ($this->path[0] != "") {
            include('/controllers/'.$this->path[0].'.php');
            $this->controller = $this->path[0];
            $controller = new $this->controller($this->method);
            if (isset($this->path[1])) {
                $this->method = $this->path[1];
                if (isset($this->path[2])) {
                    $count_params = count($this->path);
                    if ($count_params > 3) {
                        $this->params = array_splice($this->path, 2, $count_params);
                        $controller->{$this->method}($this->params);
                    } else {
                        $this->params = $this->path[2];
                        $controller->{$this->method}($this->params);
                    }
                } else {
                    $controller->{$this->method}();
                }
            }
        } else {
            include('/controllers/'.$this->default_controller.'.php');
            $method = $this->default_method;
            $controller = new $this->default_controller();
            $controller->$method();
        }
    }
}

session_start();
$controller = new Dispatcher();





