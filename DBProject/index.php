<!DOCTYPE html>
<html lang="en">
<head>
<style>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.5.1/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.5.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.5.0/firebase-auth.js"></script>

<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyCVRkddm2leds5XWnR1617twfAPP1UqIYs",
    authDomain: "temp-11096.firebaseapp.com",
    databaseURL: "https://temp-11096.firebaseio.com",
    projectId: "temp-11096",
    storageBucket: "",
    messagingSenderId: "265459794514"
  };
  firebase.initializeApp(config);
  
</script>
</style>
</head>
<body bgcolor="#959CCE">
<div class="container">
<h1>Home page</h1>
<br>
Login here!</a>';
}
if ($_SESSION["loggedIn"] == TRUE) {
echo "logged in as " . $_SESSION["user"];
echo $_SESSION["message"];
echo '<a href="forumMain.php"><br />Continue to site</a>';
}
session_write_close();
?>
</div>
</body>
</html>