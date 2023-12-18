<?php

session_start();
require_once '../classes/User.php';

$user = new User();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $success = $user->register($name, $email, $password); 

    if($success){
        header('Location:login.php?register=success');
    }else{
        header('Location:register.php?error=registration_failed');
    }
}
?>