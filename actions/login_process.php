<?php


session_start();
require_once '../classes/User.php';

$user = new User();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($user->login($email,$password)){
        header("Location: ../views/index.php?login=success");
    }else{
        header("Location: ../views/login.php?login=error");
    }
}


?>