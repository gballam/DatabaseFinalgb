<!DOCTYPE html>
<h2>".$_SESSION["message"]."</h2><br />");
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
<body bgcolor="#959CCE">
<div class="container">
<center>
<h2>Welcome</h2>
</center>
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
<button type="submit" class="btn btn-default" value="login" name="login">Submit to login</button>
<button type="submit" class="btn btn-default" value="reg" name="register">submit to register</button>
</div>
</div>
</form>
</div>
</body>
</html>