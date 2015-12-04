<?php
class redirect{
    public static function to($path = '/users/login'){
        header("location:".$path);
    }
}