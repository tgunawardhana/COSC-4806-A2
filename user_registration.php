<?php

require_once ('./user.php');

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$password2 = $_REQUEST['password2'];

if ($username == "" || $password == "") {
    $_SESSION['error_signup'] = 1;
    header("location: /signup.php");
}
   
else if (strlen($password) < 10){
    $_SESSION['error_signup'] = 2;
    header("location: /signup.php");
}
else if ($password != $password2){
    $_SESSION['error_signup'] = 3;
    header("location: /signup.php");
}

$_SESSION['failed'] = 0;
$user = new User();
$user->register_user($username, $password);

?>