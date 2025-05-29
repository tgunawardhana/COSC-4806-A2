<?php

require_once './database.php';

Class User {

  public function get_all_users() {
    $dbh = db_connect();
    $statement = $dbh->prepare("select * from users;");
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  public function get_user_by_username($username) {
    $dbh = db_connect();
    $statement = $dbh->prepare("select * from users where username = :username;");
    $statement->bindParam(':username', $username);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row;
  }


  public function register_user($username, $password) {

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $isExistingUser = get_user_by_username($username);

    if ($isExistingUser) {
      echo "Username already exists. Please choose another one.";
    }
    else {
         
      $dbh = db_connect();
      $statement = $dbh->prepare("insert into users (username, password) values (:username, :password);");
      $statement->bindParam(':username', $username);
      $statement->bindParam(':password', $hashed_password);
      $statement->execute();
      $row = $statement->fetch(PDO::FETCH_ASSOC);
      header("location: /login.php");
      echo "User registered successfully.";
    }
  }
  
}


?>