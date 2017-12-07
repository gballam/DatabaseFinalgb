<!DOCTYPE html>
<?php
  session_start();
  $password_test = "test";
  $password_test2 = "passTest";
  $test_hashed = password_hash($password_test, PASSWORD_DEFAULT);
  $test2_hashed = password_hash($password_test2, PASSWORD_DEFAULT);
  echo("test hashed is ".$test_hashed."<br />");
  echo("passTest hashed is ".$test2_hashed."<br />");
  $_SESSION["user"] = "";
  $_SESSION["pwd"] = "";
  if($_SESSION["message"] != "") {
    echo("<br /><h2>".$_SESSION["message"]."</h2><br />");
    $_SESSION["message"] = "";
  }
  session_write_close();
?>
<html lang="en">
<head>
  <title>Login or sign up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<p>Signup/login</p>
  <h2>Horizontal form</h2>
  <form class="form-horizontal" method="post" action="handle.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Username:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" placeholder="Enter username" name="user">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" value="login" name="login" >Submit to login</button>
        <button type="submit" class="btn btn-default" value="reg" name="register">submit to register</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>
