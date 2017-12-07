<html>
<title>Edit response</title>
<body>
  <?php
  session_start();
  if ($_POST["responseID"] >= 1) {
    $_SESSION["responseID"] = $_POST["responseID"];
  }
  session_write_close();
   ?>
  <form style="float:right;padding:10px" action="makeResponse.php" method="post">
    <br><p>Edit the body of your response here</p>
    <input style="width:600px;height:200px;padding:10px;" type="text" name="newBody">
    <input type="submit" value="submit" name="edit">
    <input type="submit" value="delete" name="delete">
  </form>
</body>
</html>
