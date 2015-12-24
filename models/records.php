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
        $num = 0;
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
            setcookie('emails',$array_from_db,time()+COOKIES_LIVE_TIME,'/',DOMEN_NAME);
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
            if (!empty($_POST['hidden'])) {
                if (!empty($_POST['checkboxes'])) {
                    foreach ($_POST['hidden'] as $hiddenKey => $hiddenValue) {
                        foreach ($_POST['checkboxes'] as $checkboxKey => $checkboxValue) {
                            if ($hiddenValue == $checkboxValue) {
                                setcookie('checkboxes[' . $checkboxValue . ']', $hiddenValue, time() + COOKIES_LIVE_TIME, '/', DOMEN_NAME);
                            }
                        }
                    }
                } else {
                    foreach ($_POST['hidden'] as $hiddenKey => $hiddenValue) {
                        setcookie("checkboxes[$hiddenValue]", null, time() - COOKIES_LIVE_TIME, '/', DOMEN_NAME);
                    }
                }
            }
        }


    public function deleteCheckboxes(){
        if(!empty($_POST['hidden'])){
            if(!empty($_COOKIE['checkboxes'])){
                if(!empty($_POST['checkboxes'])){
                    foreach($_COOKIE['checkboxes'] as $cookieKey=>$cookieValue){
                        foreach($_POST['hidden'] as $hiddenKey=>$hiddenValue){
                            if($cookieValue==$hiddenValue){
                                foreach($_POST['checkboxes']as $postKey=>$postValue){
                                    if($cookieValue != $postValue){
                                        setcookie("checkboxes[$cookieValue]", null, time() - COOKIES_LIVE_TIME, '/', DOMEN_NAME);
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
            if (strlen($before) < strlen($after)) {
                $added_emails = substr($after, strlen($before), (strlen($after) - strlen($before)));
            }
            if (isset($added_emails)) {
                if (strpos($added_emails, " ")) {
                    $added_emails = explode($added_emails, " ");
                }
                return $added_emails;
            }
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


    public function getAllUrl($params, $type='all'){
        if($type=='all') {
            if (isset($params[4])) {
                unset($params[4]);
                $new_url = implode('/', $params);
            } else {
                $new_url = implode('/', $params);
                $new_url .= "/select_all";
            }
            return $new_url;
        }else{
            if (isset($params[4])) {
                unset($params[4]);
                $new_url = implode('/', $params);
            } else {
                $new_url = implode('/', $params);
                $new_url .= "/reset";
            }
            return $new_url;
        }
    }

    public function checkReset($params){
        foreach($params as $key=>$value){
            if($value=='reset'){
                return true;
            }
        }
        return false;

    }

    public function addContact($action = 'add',$id = ''){
        $this->array_to_db['table'] = 'records';
        $this->array_to_db['params_to_db'] = 'id';
        unset($_POST['submit_add']);
        $errors = array();
        foreach($_POST as $key=>$value){
            $clean_data[$key] = $this->clean($value);
            if($key == 'email'){
                $errors[$key] = $this->validate_data($clean_data[$key],'email');
            }elseif($key == 'work' OR $key == 'home' OR  $key =='cell'){
                $errors[$key] = $this->validate_data($clean_data[$key],$key);
            }
            elseif($key == 'birthday'){
                $errors[$key] = $this->validate_data($clean_data[$key],'date');
            }
            else {
                $errors[$key] = $this->validate_data($clean_data[$key]);
            }
        }

        foreach($errors as $key=>$value){
            if(is_string($value)){
                return $errors;
            }
        }
        $clean_data['birthday'] = $this->editDate($clean_data['birthday']);
        if($action == 'edit'){
            unset($clean_data['submit_edit']);
                $this->array_to_db['params_to_select'] = $id;
                $this->array_to_db['params_to_update'] = $clean_data;
                $result = $this->db->update($this->array_to_db);
            if($result){
                header("location:/records/main");
            }else {
                return false;
            }
        }else{
            $this->array_to_db['params_to_insert'] = $clean_data;
            $this->array_to_db['params_to_insert']['user_id'] = $_SESSION['id'];
            $result = $this->db->insert($this->array_to_db);
            if($result){
                header("location:/records/main");
            }else{
                return false;
            }
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

    public function editDate($birthday){
        $date = explode('-',$birthday);
        $dateToReturn = $date[2] . '-' . $date[1] . '-' . $date[0];
        return $dateToReturn;
    }


    public function getPrevValues(){
        $prev_values = $_POST;
        unset($prev_values['submit_add']);
        return $prev_values;
    }

    public function saveEmails(){
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
                setcookie("checkboxes[$key]", null,time()-COOKIES_LIVE_TIME,'/',DOMEN_NAME);
            }
        }
        redirect::to('/records/main');
    }

}