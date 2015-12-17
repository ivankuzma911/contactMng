<?php
abstract class model{
    public  $db,
            $contacts,
            $array_to_db = array(
        'table'           =>    '',
        'what'            =>    '',
        'action'          =>    '',
        'params_to_db'    =>    '',
        'params_to_select'=>    '',
        'orderBy'         =>    '',
        'orderBy_first'   =>    '',
        'orderBy_last'    =>    '',
        'limit'           =>    '',
        'to_return'       =>    '',
    );

    public function __construct($class_to_load){
        $this->class_loader($class_to_load);

        $this->db = new db();
    }


    public function class_loader($class_to_load){
        if(is_string($class_to_load)) {
            $files = opendir('help.files/');
            while ($name = readdir($files)) {
                if (substr($name, -4, 4) === '.php') {
                    include("help.files/$name");
                }
            }
        }else{
            foreach($class_to_load as $key=>$value){
                include("help.files/$value");
            }
        }

    }
   public  function clean($value) {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }

    public function validate_data($params, $type = 'text'){
        if($type == 'text') {
            if($params!= '') {
                $template = "/[a-zA-Z0-9_]{1,15}/";
                $data = $this->clean($params);
                $result_data = preg_match($template, $data);
                if ($result_data == 1) {
                    return true;
                }
                return false;
            }
            return true;
        }elseif($type == 'email'){
            if($params != ''){
                $template = "/[a-zA-Z0-9]{5,20}@[a-zA-Z]{1,6}.[a-zA-Z]{2,4}/";
                $data = $this->clean($params);
                $result_data = preg_match($template,$data);
                if($result_data == 1){
                    return true;
                }
                return false;
            }
        }elseif($type == 'date' ){

        }
    }
}