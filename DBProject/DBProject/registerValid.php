<html>
<body>
<?php
session_start();
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
$username = $_SESSION["user"];
$password = $_SESSION["pwd"];
$query = $conn->prepare("SELECT password from users_table where username=?");
  $query->bind_param("s", $username);
   $query->execute();
   $query->store_result();
  $query->bind_result($password);
    $query->fetch();
  $num_of_rows = $query->num_rows;
   if($num_of_rows ==1)
   {
      $_SESSION["loggedIn"] = FALSE;
      session_write_close();
      echo '<script>alert("username is already taken");</script>';
      header("Location: loginReg.php");
      exit;
   }
   else
   {
       $sql = "INSERT INTO users_table (username, password, isMod)
       VALUES ('".$_SESSION["user"]."', '".$_SESSION["pwd"]."', '0')";
       if ($conn->query($sql) === TRUE) {
             $_SESSION["loggedIn"] = TRUE;
      session_write_close();
      header("Location: index.php");
      exit;
        } else {
             echo "Error: " . $sql . "<br>" . $conn->error;
        }

   }
?>
</body>
</html>
