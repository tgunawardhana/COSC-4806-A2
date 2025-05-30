<?php
session_start();
if (isset($_SESSION['error_signup']) && $_SESSION['error_signup'] == 1) {
  $failed = "Username or password cannot be empty.";
  $_SESSION['error_signup'] = 0;
}
else if (isset($_SESSION['error_signup']) && $_SESSION['error_signup'] == 2) {
    $failed = "Password should be atleast 10 characters long.";
    $_SESSION['error_signup'] = 0;
}
else if (isset($_SESSION['error_signup']) && $_SESSION['error_signup'] == 3) {
    $failed = "Passwords does not match. Try again.";
    $_SESSION['error_signup'] = 0;
  }
else if (isset($_SESSION['error_signup']) && $_SESSION['error_signup'] == 4) {
    $failed = "Username exists. Try another one";
    $_SESSION['error_signup'] = 0;
  }
else {
  $failed = "";
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Sign up</title>
  </head>
  <body>

    <h1>Sign up</h1>

    <form action="/user_registration.php" method="post">
      <label for="fname">Username:</label>
      <br>
      <input type="text" id="username" name="username">
      <br>
      <label for="password">Password:</label>
      <br>
      <input type="password" id="password" name="password">
      <br>
      <label for="password">Confirm password:</label>
      <br>
      <input type="password" id="password2" name="password2">
      <br><br>
      <input type="submit" value="Sign up">
      <br>
      <p style="color:red;"><?= $failed ?></p>
    </form>

  </body>
</html>



