<?php
session_start();
require_once '../models/User.php';
$data = array();

$_SESSION['user'] = array();
$_SESSION['err'];

if ($_POST) {
    
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
  

    if (is_null($email) || $email === false ||
        is_null($password) || $password === false) {
        $error = true;
        
    } 
    else {
        $user = User::validate($email, $password);
        
        if ($user == false) {
            $error = true;
            
            $_SESSION['user'] = array('email' => $email,'username'=>'stinky');
           
        } else {
            $error=false;
            $_SESSION['user'] = $user;
            $_SESSION['err']='valid_data';
        }
    }
}
 else {
    $error = $error;
    $_SESSION['user'] = array('email' => '');
    
}

$data = array(
    'session' => $_SESSION['user'],
    'error' => $error
);

header('Location:../index.php');
?>