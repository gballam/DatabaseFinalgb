<!Doctype html>
<html>
<head>
  <title>Main Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
<body>
  <div class="userLog">
  <?php
    session_start();
     echo '<p style="white-space:nowrap;">Logged in as ' . $_SESSION["user"] . '</p>';//Will later need to change the <p> tag to be a link where they can edit their password perhaps
   session_write_close();//Work in progress, will put out the username if the session is started
  ?>
  </div>
<form style="float:right;padding:10px" action="viewQuestion.php" method="post">
  <input type="text" name="qID">
  <br>
  <input type="submit" value="submit">
</form>
  <?php
  session_start();
  $servername = "sql303.epizy.com";
  $username = "epiz_20659217";
  $password = "ImNiN9fEgf";
  $db = "epiz_20659217_demo2";
  class question { //class for storing sql data from the questions table
    public $id;
    public $usrName;
    public $title;
    //may include score, date and other stuff at a later date
  }
  $conn = new mysqli($servername, $username, $password, $db);
  // Check connection
  if ($conn->connect_error) {
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
    $query = $conn->prepare("SELECT question_id, question_username, question_title from question_table");
    $query->execute();
    $query->store_result();
    $query->bind_result($questions->id, $questions->usrName, $questions->title);
  for ($i = 0; $i < $count; $i++) { //Load in questions object and make question html
    $query->fetch();
    echo '<div style="position: relative; height:100px; width:800px; top: ' . ($i * 100) . 'px;border: 3px solid blue; ">';
    echo '<p style="white-space:nowrap;">Question ID: ' . $questions->id . '    Username: ' . $questions->usrName . '</p>';
    echo '<p style="white-space:nowrap;">Title: ' . $questions->title . '</p></div>';


  }
  //may need $conn->close here
}
  session_write_close();
  ?>
</body>
</html>
