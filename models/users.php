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
        if(!$this->validate_data($_POST['login']) OR !$this-$this->validate_data($_POST['password'])){
            redirect::to();
        }
        $this->array_to_db['params_to_db'] = 'login';
        $this->array_to_db['params_to_select'] = $_POST['login'];
        $this->array_to_db['table'] = 'users';
        $this->array_to_db['what'] = '*';
        $this->array_to_db['to_return'] = 'num_rows';
        $user_exists = $this->db->select($this->array_to_db);
        if(($user_exists) === 0){
            $this->array_to_db['params_to_insert']['login'] = $_POST['login'];
            $this->array_to_db['params_to_insert']['password'] = md5($_POST['password']);
            $create_user = $this->db->insert($this->array_to_db);
            if($create_user){
                return true;
            }else{
                return false;
            }
        }else{
           return false;
        }
    }


}