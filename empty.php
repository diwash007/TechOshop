<?php require_once("config.php");

$email=$_SESSION["login_email"];
$findresult = mysqli_query($dbc, "SELECT * FROM users WHERE email= '$email'");
if($res = mysqli_fetch_array($findresult)) {
  $username = $res['username'];
  $uid = $res['id'];
}

$query = mysqli_query($dbc, "DELETE FROM cart WHERE uid='$uid'");

header("location:cart.php")
?>
