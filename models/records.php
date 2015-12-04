<?php
include('model.php');
class RecordsModel extends model{

    public function getRecords($params){
        $this->array_to_db['table'] = 'records';
        $this->array_to_db['what'] = '*';
        $this->array_to_db['to_return'] = 'mysqli_object';
        $this->array_to_db['params_to_db'] = 'user_id';
        $this->array_to_db['params_to_select'] = $_SESSION['id'];
        $this->array_to_db['orderBy'] = 1;
        if($params[2]=='true'){
            $this->array_to_db['orderBy_first'] = 'asc';
        }else{
            $this->array_to_db['orderBy_first'] = 'desc';
        }
        if($params[3]=='true'){
            $this->array_to_db['orderBy_last'] = 'asc';
        }else{
            $this->array_to_db['orderBy_last'] = 'desc';
        }
        $this->array_to_db['limit'] = 1;
        $this->array_to_db['limit_start'] = ($params[0]*5)-5;
        $records = $this->db->select($this->array_to_db);
        return $records;
    }

    public function countRecords($db){
        $num = 1;
        if(isset($_COOKIE['checkboxes'])) {
            foreach ($db as $records) {
                foreach ($_COOKIE['checkboxes'] as $key => $value) {
                    if ($records['id'] == $key) {
                        $num++;
                    }
                }
            }
        }
        return $num;

    }

    public function getEmails(){
        $this->array_to_db['what'] = 'email';
        $this->array_to_db['table'] = 'records';
        $this->array_to_db['params_to_db'] = 'id';
        $this->array_to_db['to_return'] = 'array';
        $array_from_db = array();
        if(isset($_COOKIE['checkboxes'])){
           foreach($_COOKIE['checkboxes'] as $key=>$value){
               $this->array_to_db['params_to_select'] = $key;
               $email = $this->db->select($this->array_to_db);

               if(isset($email)){
                 foreach($email as $key=>$value) {
                   array_push($array_from_db, $value);
                }
               }
           }
       }
        $array_from_db = implode(' ',$array_from_db);
        if(is_string($array_from_db)){
            setcookie('emails',$array_from_db,time()+3600,'/','study.ivan');
        }
        return $array_from_db;
    }

    public function checkuser(){
        if(!isset($_SESSION['login']) && !isset($_SESSION['id'])){
            redirect::to();
        }
    }

    public function saveCheckboxes()
    {
        $domen = 'study.ivan';
            if (!empty($_POST['hidden'])) {
                if (!empty($_POST['checkboxes'])) {
                    foreach ($_POST['hidden'] as $hiddenKey => $hiddenValue) {
                        foreach ($_POST['checkboxes'] as $checkboxKey => $checkboxValue) {
                            if ($hiddenValue == $checkboxValue) {

                                setcookie('checkboxes[' . $checkboxValue . ']', $hiddenValue, time() + 3600, '/', $domen);
                            }
                        }
                    }
                } else {
                    foreach ($_POST['hidden'] as $hiddenKey => $hiddenValue) {
                        setcookie("checkboxes[$hiddenValue]", null, time() - 3600, '/', $domen);
                    }
                }
            }
        }


    public function deleteCheckboxes(){
        $domen = 'study.ivan';
        if(!empty($_POST['hidden'])){
            if(!empty($_COOKIE['checkboxes'])){
                if(!empty($_POST['checkboxes'])){
                    foreach($_COOKIE['checkboxes'] as $cookieKey=>$cookieValue){
                        foreach($_POST['hidden'] as $hiddenKey=>$hiddenValue){
                            if($cookieValue==$hiddenValue){
                                foreach($_POST['checkboxes']as $postKey=>$postValue){
                                    if($cookieValue != $postValue){
                                        setcookie("checkboxes[$cookieValue]", null, time() - 3600, '/', $domen);
                                    }
                                }
                            }
                        }
                    }

                }
            }
        }
    }



    public function checkEmails(){
        if(isset($_COOKIE['emails'])) {
            $before = $_COOKIE['emails'];
            $after = $_POST['emails'];
            if(strlen($before)< strlen($after)){
                $added_emails = substr($after,strlen($before),(strlen($after)-strlen($before)));
            }
            if(strpos($added_emails," ")){
                $added_emails = explode($added_emails," ");
                   }
            return $added_emails;
        }

    }

    public function  allCheckboxes($params){
    if(isset($params[4])){
        $checked = 'checked';
        } else{
        $checked = '';
        }
        return $checked;
    }

    public function countRows(){
        $this->array_to_db['what'] = '*';
        $this->array_to_db['table'] = 'records';
        $this->array_to_db['params_to_db'] = 'user_id';
        $this->array_to_db['params_to_select'] = $_SESSION['id'];
        $this->array_to_db['to_return'] = 'num_rows';
        $records = $this->db->select($this->array_to_db);
        $total_pages = intval(($records -1)/NUM_OF_ROWS) +1;
        return $total_pages;
    }


    public function getAllUrl($params){
        if(isset($params[4])){
            unset($params[4]);
            $new_url = implode('/',$params);
        } else {
            $new_url = implode('/',$params);
            $new_url .= "/select_all";
        }
        return $new_url;
    }

    public function addContact(){
        $this->array_to_db['table'] = 'records';
        $this->array_to_db['params_to_db'] = 'id';
        unset($_POST['submit_add']);
        $this->array_to_db['params_to_insert'] = $_POST;
        $this->array_to_db['params_to_insert']['user_id'] = $_SESSION['id'];
        $result = $this->db->insert($this->array_to_db);
        if($result){
            header("location:/records/main");
        }else{
            return false;
        }
    }

    public function GetRecordById($id){
        $this->array_to_db['table'] = 'records';
        $this->array_to_db['what'] = '*';
        $this->array_to_db['params_to_db'] = 'id';
        $this->array_to_db['params_to_select'] = $id;
        $this->array_to_db['to_return'] = 'array';
        $record = $this->db->select($this->array_to_db);
        return $record;
    }

    public function edit_record($id){
        unset($_POST['submit_edit']);
        $this->array_to_db['params_to_select'] = $id;
        $this->array_to_db['params_to_update'] = $_POST;
        $this->db->update($this->array_to_db);

    }

    public function  deleteContact($id){
        $this->array_to_db['table'] = 'records';
        $this->array_to_db['params_to_db'] = 'id';
        $this->array_to_db['params_to_delete'] = $id;
        $this->db->delete($this->array_to_db);
        return true;
}

    public function saveEmails(){
        $domen = 'study.ivan';
        $emails = $_POST['checkboxes'];
        $this->array_to_db['table'] = 'records';
        foreach($emails as $key=>$value){
            $this->array_to_db['params_to_insert']['email'] = $value;
            $this->array_to_db['params_to_insert']['user_id']=$_SESSION['id'];
            $this->db->insert($this->array_to_db);
        }
        if (isset($_COOKIE['checkboxes']))
        {
            foreach($_COOKIE['checkboxes'] as $key => $value)
            {
                setcookie("checkboxes[$key]", null,time()-3600,'/',$domen);
            }
        }
        redirect::to('/records/main');
    }

}