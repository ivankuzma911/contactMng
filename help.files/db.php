<?php

class db {


    public $connect;

    public function __construct(){
        $this->connect =  mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);
    }




    public function select($params){
        $params['action'] = 'select';
        return $this->queryBuilder($params);
    }

    public function delete($params){
        $params['action'] = 'delete';
        $this->queryBuilder($params);
    }

    public function queryBuilder($params){
        if($params['action'] == 'select'){
            $sql = "SELECT $params[what] from $params[table] where ";
            if(is_array($params['params_to_db'])){
                $sql .= $params['params_to_db']['0'] ."= '" .  $params['params_to_select']['0'] ."' AND ";
                $sql .= $params['params_to_db']['1'] ."= '" . $params['params_to_select']['1'] . "'";
            }else{
                $sql .= $params['params_to_db'] . "= '" . $params['params_to_select'] . "'";
            }
            if($params['orderBy']!=''){
                $sql .= "ORDER BY first ";
                if($params['orderBy_first']=='asc'){
                    $sql .= " ASC";
                }else{
                    $sql .= ' DESC';
                }
                $sql.= ", last";
                if($params['orderBy_last'] == 'asc'){
                    $sql .= ' ASC';
                }else{
                    $sql .= ' DESC';
                }
            }

            if($params['limit']!=''){
                $sql .= " LIMIT $params[limit_start], 5";
            }
            $query = $this->query($sql);
            switch($params['to_return']){
                case 'mysqli_object':
                    return $query;
                case 'array':
                    return mysqli_fetch_assoc($query);
                case 'num_rows':
                    return mysqli_num_rows($query);
            }
        }elseif($params['action'] == 'delete'){
            $sql = "DELETE from $params[table] where ";
            $sql .= $params['params_to_db'] . "= '" . $params['params_to_delete'] ."'";

            $query = $this->query($sql);
            if($query){
                return true;
            }else{
                return false;
            }
        }elseif($params['action']=='insert'){
            $sql = "Insert into $params[table]";
            $sql .= "(" . implode(", ", array_keys($params['params_to_insert'])) . ")";
            $sql .= " VALUES ('" . implode("', '", $params['params_to_insert']) . "')";
            $query = $this->query($sql);
            if($query){
                return true;
            }else{
                return false;
            }
        }elseif($params['action'] == 'update'){
            $sql = "UPDATE records set ";
            while (list($key, $val) = each($params['params_to_update'])) {
                $sql .= ("$key = '$val', ");
            }
            $sql = substr($sql, 0, -2);
            $sql .= " where id=$params[params_to_select]";
            var_dump($sql);
            $query = $this->query($sql);
            if($query){
                return true;
            }else{
                return false;
            }
        }

    }

    public function insert($params){
        $params['action'] = 'insert';
        return $this->queryBuilder($params);
    }

    public function update($params){
        var_dump($params);
        $params['action'] = 'update';
        return $this->queryBuilder($params);
    }

    public function query($sql){
        $query = mysqli_query($this->connect,$sql);
        return $query;
    }



}
