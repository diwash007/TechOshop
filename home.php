<!DOCTYPE html>
<?php require_once("config.php");

$email=$_SESSION["login_email"];
$findresult = mysqli_query($dbc, "SELECT * FROM users WHERE email= '$email'");
if($res = mysqli_fetch_array($findresult))
{
  $username = $res['username']; 
  $fname = $res['fname'];   
  $lname = $res['lname'];  
  $email = $res['email'];  
}
include("static/header.php")
?> 
  <title>Home - TechOshop</title>
  <link rel="stylesheet" href="static/style.css">
</head>
<body>
<div style="height:400px;background:gray"></div>
</body>
<?php include("static/footer.php")?>
