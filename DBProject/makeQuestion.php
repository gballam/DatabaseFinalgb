<html>
<title>Writing question...</title>
<?php
session_start();
if ($_POST["qTitle"] != "" && $_POST["questionBody"] != "") {
  $servername = "sql303.epizy.com";
  $username = "epiz_20659217";
  $password = "ImNiN9fEgf";
  $db = "epiz_20659217_demo2";
  $conn = new mysqli($servername, $username, $password, $db);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully \n";
$qTitle = $_POST["qTitle"];
$qBody = $_POST["questionBody"];
$sql = "INSERT INTO question_table (question_username, question_title, question_body, question_date)
VALUES ('". $_SESSION["user"] ."', '" . $qTitle . "', '" . $qBody ."', CURRENT_TIMESTAMP)";
$conn->query($sql);
$_SESSION["wroteQuestion"] = "yes";
session_write_close();
header("Location: forumMain.php");
exit;
} else {
  $_SESSION["wroteQuestion"] = "no";
  session_write_close();
  header("Location: forumMain.php");
  exit;
}
 ?>
</html>
