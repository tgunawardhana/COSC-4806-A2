<?php
  session_start();

$failed = "";
$success = "";

  if (isset($_SESSION['failed']) && $_SESSION['failed'] == 1) {
    $failed = "Username or password is incorrect.
    Unsuccessful attempts " . $_SESSION['failed_attempts'] . ".";
    
  }
  else if (isset($_SESSION['error_data']) && $_SESSION['error_data'] == 1) {
    $failed = "Username or password cannot be empty.";
    $_SESSION['error_data'] = 0;
  }
    else if (isset($_SESSION['signup_complete']) && $_SESSION['signup_complete'] == 1) {
      $success = "User registered successfully.";
      $_SESSION['signup_complete'] = 0;
    }
    
  else {
    $failed = "";
    $success = "";
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
  </head>
  <body>

    <h1>Login</h1>

    <form action="/validate.php" method="post">
      <label for="fname">Username:</label>
      <br>
      <input type="text" id="username" name="username">
      <br>
      <label for="password">Password:</label>
      <br>
      <input type="password" id="password" name="password">
      <br><br>
      <input type="submit" value="Submit">
      <br>
      <p style="color:red;"><?= $failed ?></p>
      <p style="color:green;"><?= $success ?></p>
      <p><a href="/signup.php">Sign up</a></p>
      <br>

      
    </form>

  </body>
</html>



