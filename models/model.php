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
}