<?php
require_once ('./user.php');

session_start();

$user = new User();
$user_data = $user->get_user_by_username($_REQUEST['username']);
$valid_username = $user_data['username'];
$valid_password = $user_data['password'];

$username = $_REQUEST['username'];
$_SESSION['username'] = $username;
$password = $_REQUEST['password'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

if ($valid_username == $username && password_verify($password, $valid_password)){
    $_SESSION['authenticated'] = 1;
     $_SESSION['failed'] = 0;
    header("location: /");
} 
else {
    if(!isset($_SESSION['failed_attempts'])){
        $_SESSION['failed_attempts'] = 1;
    } else {
      $_SESSION['failed_attempts'] += 1;
    }

    $_SESSION['failed'] = 1;  
    header("location: /login.php");
    //echo "This is unsuccessful attempt number " . $_SESSION['failed_attempts'];

}

?>