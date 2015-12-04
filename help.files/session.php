<?php
class session{
    public static function set($username,$name){
        $_SESSION[$name] = $username;
    }
}

