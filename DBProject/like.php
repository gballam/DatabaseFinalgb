<?php
error_log("there was a problem");
session_start();
$id = $_GET["id"];
$user = $_SESSION["user"];
$servername = "sql303.epizy.com";
$username = "epiz_20659217";
$password = "ImNiN9fEgf";
$db = "epiz_20659217_demo2";
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query = $conn->prepare("SELECT question_score FROM question_table where question_id=?");
$query->bind_param("s", $id);
$query->execute();
$query->store_result();
$query->bind_result($score);
 $query->fetch();
 $score++;
 $query->close();
 $query = $conn->prepare("UPDATE question_table SET question_score = ? where question_id = ?");
 $query->bind_param("ss", $score, $id);
 $query->execute();
 $query->close();
 session_write_close();
header("Location: forumMain.php");
exit;
 ?>