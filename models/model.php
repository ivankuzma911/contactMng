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
                    return $data;
                }
                return 'warning_text';
            }
            return true;
        }elseif($type == 'email'){
            if($params != ''){
                $template = "/[a-zA-Z0-9]{5,20}@[a-zA-Z]{1,6}.[a-zA-Z]{2,4}/";
                $data = $this->clean($params);
                $result_data = preg_match($template,$data);
                if($result_data == 1){
                    return $data;
                }
                return 'warning_email';
            }
        }elseif($type == 'date' ){
            if($params != ''){
                $template = "/[0-9]{1,2}\.[0-9]{1,2}\.[0-9]{4}|[0-9]{1,4}\-[0-9]{1,2}\-[0-9]{2,4}/";
                $data = $this->clean($params);
                $result_data = preg_match($template,$data);
                if($result_data == 1){
                    return $data;
                }
                return 'warning_date';
            }

            /*
             * 42.42.4233
                12.12.2012
                3.6.2015
                12-12-2015
             *
             */

        }elseif($type == 'number'){
            if($params !=''){
                $template = "/[0-9]{10}|[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}|\([0-9]{3}\){1}[0-9]{7}|[0-9]{2,4}/";
                $data = $this->clean($params);
                $result_data = preg_match($template,$data);
                if($result_data == 1){
                    return $data;
                }
                return 'warning_number';
            }
            /*0986264015
            098-626-40-15
            (098)6264015
            098 626 40 158*/
        }
    }
}