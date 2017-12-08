<html>
<head>
<title>Viewing question</title>
</head>
<body>
<a href="forumMain.php">return to main page</a>
<form style="float:right;padding:25px" action="writeResponse.php" method="post">
<p>Type the body of your response here</p>
<input style="width:600px;height:200px;padding:10px;" type="text" name="responseBody">
<br>
<input type="submit" value="submit">
</form>
<form style="float:right;padding:25px" action="editResponse.php" method="post">
<p>Enter response ID of response to edit it</p>
<input style="padding:10px;" type="text" name="responseID">
<br>
<input type="submit" value="submit">
</form>
alert("change worked");</script>';
$_SESSION["editResp"] = "notYet";
session_write_close();
header("Location: forumMain.php");
exit;
} else if ($_SESSION["editResp"] == "no") {
echo '<script>alert("could not edit response");</script>';
$_SESSION["editResp"] = "notYet";
session_write_close();
header("Location: forumMain.php");
exit;
}
if ($_POST["qID"] != "" || $_SESSION["writeResp"] == true || $_SESSION["editResp"] == "yes") {
if ($_SESSION["writeResp"] == false) {
$qID = $_POST["qID"];} else {
$qID = $_SESSION["qID"];
$_SESSION["writeResp"] = false;
}
$_SESSION["valid"] = true;
$servername = "sql303.epizy.com";
$username = "epiz_20659217";
$password = "ImNiN9fEgf";
$db = "epiz_20659217_demo2";
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$query = $conn->prepare("SELECT question_username, question_title, question_body, question_date from question_table where question_id=?");
$query->bind_param("s", $qID);
$query->execute();
$query->store_result();
$query->bind_result($qstUser, $qstTitle, $qstBody, $qstDate);
$query->fetch();
if($query->num_rows == 1) { //if there is only one question with that ID
//load question
$_SESSION["qID"] = $qID;
echo '<div style="position: relative; height:400px; width:800px; top: 100px;border: 5px solid green; ">';
echo '<p style="white-space:nowrap;">Question ID: ' . $qID . ' Username: ' . $qstUser . ' Date: ' . $qstDate .'</p>';
echo '<p style="white-space:nowrap;">Title: ' . $qstTitle . '</p> <br> <p style="white-space:nowrap;">Question body: ' . $qstBody . '</p></div>';
//now load the responses
$query->close();
$query = $conn->prepare("SELECT count(response_ID) from response_table where question_id = ?");
$query->bind_param("s", $qID);
$query->execute();
$query->store_result();
$query->bind_result($count);
$query->fetch();
if ($count >= 1) {
$query->close();
$query = $conn->prepare("SELECT response_ID, responding_user, response_date, response_body from response_table where question_id = ?");
$query->bind_param("s", $qID);
$query->execute();
$query->store_result();
$query->bind_result($rsID, $rsUser, $rsDate, $rsBody);
for ($i = 0; $i < $count; $i++) {
$query->fetch();
if ($_SESSION["user"] == $rsUser) {
echo '<div style="position: relative; height:100px; width:800px; top: ' . (($i + 2) * 100) . 'px;border: 3px solid blue; ">';
} else {
echo '<div style="position: relative; height:100px; width:800px; top: ' . (($i + 2) * 100) . 'px;border: 3px solid black; ">';
}
echo '<p style="white-space:nowrap;">Response ID: ' . $rsID . ' Username: ' . $rsUser . ' Response Date: ' . $rsDate . '</p>';
echo '<p style="white-space:nowrap;">Body: ' . $rsBody . '</p></div>';
}
} else {
echo "no responses?"; //count not >=1
}
} else {
echo "that question doesn't exist!";
}
}
//they didn't put in a questionID
session_write_close();
?>
</body>
</html>
