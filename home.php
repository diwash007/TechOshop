<!DOCTYPE html>

<?php require_once("config.php");

$email=$_SESSION["login_email"];
$findresult = mysqli_query($dbc, "SELECT * FROM users WHERE email= '$email'");

if($res = mysqli_fetch_array($findresult))
{
  $username = $res['username'];  
}

include("static/header.php")
?> 

<title>Home - TechOshop</title>
<link rel="stylesheet" href="static/style.css">
</head>
<body>
  <div class="container hero">

      <span>Welcome, <b><?php echo $username; ?></b></span>
      <span style="float:right"><a href="cart.php">Cart</a> | <a href="orders.php">orders</a> | <a href="support.php">Support</a> | <a href="logout.php" style="color:red">logout?</a></span>

    <div class="brands">
      <div class="h4 head">Choose a brand:</div>
      <ul>
        <a href="brand.php?b=Apple"><li>Apple</li></a>
        <a href="brand.php?b=Samsung"><li>Samsung</li></a>
        <a href="brand.php?b=Xiaomi"><li>Xiaomi</li></a>
        <a href="brand.php?b=Oppo"><li>Oppo</li></a>
        <a href="brand.php?b=Other"><li>Other brands</li></a>
      </ul>
    </div>
  </div>
</body>

<?php include("static/footer.php")?>
