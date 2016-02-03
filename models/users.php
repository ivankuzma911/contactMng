<?php
include('model.php');
class UsersModel extends model{


    public function validate_user(){
        $this->array_to_db['params_to_db'][0] = 'login';
        $this->array_to_db['params_to_db'][1] = 'password';
        if(!$this->validate_data($_POST['login']) OR !$this->validate_data($_POST['password'])){
            redirect::to();
        }

        $this->array_to_db['params_to_select'][0] = $_POST['login'];
        $this->array_to_db['params_to_select'][1] = md5($_POST['password']);
        $this->array_to_db['table'] = 'users';
        $this->array_to_db['what'] = '*';
        $this->array_to_db['to_return'] = 'array';
        $user_exists = $this->db->select($this->array_to_db);
        if(is_array($user_exists)){
            session::set($user_exists['login'],'name');
            session::set($user_exists['id'],'id');
            return true;
        }else{
            return false;
        }
    }

    public function create_user(){

        $errors = array();
        unset($_POST['submit']);
        foreach($_POST as $key=>$value){
           $clean_data[$key] = $this->clean($value);
            if($key == 'password'){
                $errors[$key] = $this->validate_data($clean_data[$key],'password');
            }else{
                $errors[$key] = $this->validate_data($clean_data[$key]);
            }

        }
        foreach($errors as $key=>$value){
            if(is_string($value)){
                return $errors;
            }
        }

        $this->array_to_db['params_to_db'] = 'login';
        $this->array_to_db['params_to_select'] = $clean_data['login'];
        $this->array_to_db['table'] = 'users';
        $this->array_to_db['what'] = '*';
        $this->array_to_db['to_return'] = 'num_rows';
        $user_exists = $this->db->select($this->array_to_db);
        if(($user_exists) === 0){
            $this->array_to_db['params_to_insert']['login'] = $clean_data['login'];
            $this->array_to_db['params_to_insert']['password'] = md5($clean_data['password']);
            $create_user = $this->db->insert($this->array_to_db);
            if($create_user){
                redirect::to('/records/main');
            }else{
                return false;
            }
        }else{
           return false;
        }
    }


}