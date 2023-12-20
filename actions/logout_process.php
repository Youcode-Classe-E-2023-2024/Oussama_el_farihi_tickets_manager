<?php
require_once '../classes/User.php';

session_start();

$user = new User();
$user->logout();


header("Location: ../views/login.php?log_out=success");

exit;
?>
