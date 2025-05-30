<?php

require_once ('./user.php');

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] != 1){
    header("location: /login.php");
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>COSC 4806</title>
  </head>
  <body>

    <h1>Assignment 2</h1>

    <p>Welcome, <?= $_SESSION['username'] ?>!</p>
    <p> <?= date("Y-M-d") ?> </p>

  </body>

  <footer>
    <p> <a href="/logout.php">Logout</a> </p>
  </footer>
</html>