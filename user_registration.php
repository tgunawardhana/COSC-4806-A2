<?php
require_once ('./user.php');

session_start();

$user = new User();
$user->register_user($_REQUEST['username'], $_REQUEST['password']);



?>