<?php
require_once ('./user.php');

session_start();

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

if ($username == "" || $password == "") {
    $_SESSION['error_signup'] = 1;
    header("location: /signup.php");
    return;
}
$_SESSION['failed'] = 0;
$user = new User();
$user->register_user($username, $password);

?>