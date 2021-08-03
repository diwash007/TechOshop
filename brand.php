<!DOCTYPE html>
<?php require_once("config.php");

$email=$_SESSION["login_email"];
$b = $_GET["b"];
$findresult = mysqli_query($dbc, "SELECT * FROM users WHERE email= '$email'");
if($res = mysqli_fetch_array($findresult))
{
  $username = $res['username'];
}
include("static/header.php")
?> 
  <title> <?php echo $b; ?> - TechOshop</title>
  <link rel="stylesheet" href="static/style.css">
</head>
<body>
  <div class="container hero">

      <span>Welcome, <b><?php echo $username; ?></b> </span>
      <a href="logout.php" style="float:right;color:red">logout?</a>

      <div class="brands">
        <div class="h4 head">Choose a brand:</div>
        <ul>
          <a href="brand.php?b=apple"><li>Apple</li></a>
          <a href="brand.php?b=samsung"><li>Samsung</li></a>
          <a href="brand.php?b=xiaomi"><li>Xiaomi</li></a>
          <a href="brand.php?b=oppo"><li>Oppo</li></a>
          <a href="brand.php?b=other"><li>Other brands</li></a>
        </ul>
      </div>
</div>
</body>
<?php include("static/footer.php")?>
