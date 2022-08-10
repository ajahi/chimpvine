<?php
require_once 'Database.php';

class User{
    public $user_id;
    public $username;
    public $email;
    private $password;

    public static function validate($email,$password){
        return false;
    }
}