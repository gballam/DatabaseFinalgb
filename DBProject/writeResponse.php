<html>
<title>Writing response...</title>
</html>
connect_error) {
die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully \n";
//$user = $_SESSION["user"];
$qID = $_SESSION["qID"];
$sql = "INSERT INTO response_table (question_id, responding_user, response_date, response_body)
VALUES ('". $qID ."', '" . $user . "', CURRENT_TIMESTAMP, '" . $responseBody ."')";
$conn->query($sql);
$_SESSION["writeResp"] = true;
session_write_close();
header("Location: viewQuestion.php");
exit;
/*if ($conn->query($sql) === TRUE) {
session_write_close();
header("Location: viewQuestion.php");
exit;
}
//it didn't work!
session_write_close();*/
?>