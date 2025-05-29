<?php
session_start();
if (isset($_SESSION['error_signup']) && $_SESSION['error_signup'] == 1) {
  $failed = "Username or password cannot be empty.";
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
      <br><br>
      <input type="submit" value="Sign up">
      <br>
      <p style="color:red;"><?= $failed ?></p>
    </form>

  </body>
</html>



