<?php
require_once ('./user.php');

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

if ($username == "" || $password == "") {
    $_SESSION['error_data'] = 1;
    header("location: /login.php");
}

//Login logic
$user = new User();
$user_data = $user->get_user_by_username($_REQUEST['username']);
$valid_username = $user_data['username'];
$valid_password = $user_data['password'];


if ($valid_username == $username && password_verify($password, $valid_password)){
    $_SESSION['authenticated'] = 1;
    $_SESSION['failed'] = 0;
    $_SESSION['error_data'] = 0;
    $_SESSION['username'] = $username;
    header("location: /");
} 
else {
    
    if(!isset($_SESSION['failed_attempts'])){
        $_SESSION['failed_attempts'] = 1;
    } else {
      $_SESSION['failed_attempts'] += 1;
    }
    $_SESSION['error_data'] = 0;
    $_SESSION['failed'] = 1;  
    header("location: /login.php");

}

?>