<!Doctype html>
<html>
<head>
<title>Main Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="jquery.min.js"></script>
<script>
  function like(likeID) {
 window.location = "http://ourheaven.epizy.com/like.php?id=" + likeID;
  }
  </script>
<style> div.userLog {
    position: relative;
    left: 1000px;
    top: 0px;
    border: 3px solid blue;
    height:50px;
    width:400px;
  }
  </style>
</head>
<body bgcolor="#959CCE">
<div class="userLog">
alert("Failed to write new question!");</script>';
$_SESSION["wroteQuestion"] = "notYet";
}
echo '<p style="white-space:nowrap;">Logged in as ' . $_SESSION["user"] . '</p>';//Will later need to change the <p> tag to be a link where they can edit their password perhaps
session_write_close();//Work in progress, will put out the username if the session is started
?>
</div>
<form style="float:right;padding:10px" action="viewQuestion.php" method="post">
<p>Input the question id of the question you want to view</p>
<input type="text" name="qID">
<br>
<input type="submit" value="submit">
</form>
<a href="loginReg.php">Logout</a>
<a href="writeQuestion.php">Click here to write a question</a>
connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$query = $conn->prepare("SELECT count(question_id) from question_table");
$query->execute();
$query->store_result();
$query->bind_result($count);
$query->fetch();
$query->close();
if ($count <= 0) {
echo "something went wrong somewhere";
} else {
$questions = new question();
$query = $conn->prepare("SELECT question_id, question_username, question_title, question_score from question_table");
$query->execute();
$query->store_result();
$query->bind_result($questions->id, $questions->usrName, $questions->title, $questions->likes);
for ($i = 0; $i < $count; $i++) { //Load in questions object and make question html
$query->fetch();
echo '<div style="position: relative; height:100px; width:800px; top: ' . ($i * 100) . 'px;border: 3px solid blue; ">';
echo '<p style="white-space:nowrap;">Question ID: ' . $questions->id . ' Username: ' . $questions->usrName . ' Likes: ' . $questions->likes . '</p>';
echo '<button onclick="like('.$questions->id .')">Like</button>'; //calls like script with qID
echo '<p style="white-space:nowrap;">Title: ' . $questions->title . '</p></div>';
}
//may need $conn->close here
}
session_write_close();
?>
</body>
</html>