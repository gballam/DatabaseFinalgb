<html>
<body>
login here!</a>';
}
if ($_POST["login"] == "login") {
//login
$_SESSION["user"] = $_POST["user"];
$_SESSION["pwd"] = $_POST["pwd"];
session_write_close();
header('Location: http://ourheaven.epizy.com/loginValid.php');
exit;
} else if ($_POST["register"] == "reg") {
//register
$_SESSION["user"] = $_POST["user"];
$_SESSION["pwd"] = $_POST["pwd"];
session_write_close();
header('Location: http://ourheaven.epizy.com/registerValid.php');
exit;
} else {
session_write_close();
header('Location: http://ourheaven.epizy.com');
exit;
}
?>
</body>
</html>