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

    public function validate_data($data, $type = 'text'){
        if($type == 'text') {
                $template = "/[a-zA-Z0-9_]{1,15}/";
                $result_data = preg_match($template, $data);
                if ($result_data != 1) {
                    return "Validate text";
                }

        }elseif($type == 'email'){
                $template = "/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|
                (?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|
                (?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|
                (?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|
                (?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|
                (?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})
                |(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD";
                $result_data = preg_match($template,$data);
                if($result_data != 1){
                    return 'validate email';
                }

        }elseif($type == 'date' ){
                $template = "/[0-9]{1,4}\\-[0-9]{1,2}\\-[0-9]{2,4}/";
                $result_data = preg_match($template,$data);
                if($result_data != 1){
                    return 'validate date';
                }

        }elseif($type == 'home' OR $type == 'work' OR $type = 'cell'){

                $template = "/[(]{1}[0-9]{3}[)]{1}[0-9]{7}/";
                $result_data = preg_match($template,$data);
                if($result_data != 1){
                    return 'validate number';
                }
        }
    }
}