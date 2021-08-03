<!DOCTYPE html>
<?php require_once("config.php");

$email=$_SESSION["login_email"];
$b = $_GET["b"];

function get_product_details()
    {
        global $dbc,$b;
        $ret = array();
        $sql = "SELECT * FROM items where brand='$b'";
        $res = mysqli_query($dbc, $sql);

        while($ar = mysqli_fetch_assoc($res))
        {
            $ret[] = $ar;
        }
        return $ret;
    }

if(empty($b)) {
  header("location:home.php"); 
}
$findresult = mysqli_query($dbc, "SELECT * FROM users WHERE email= '$email'");
if($res = mysqli_fetch_array($findresult))
{
  $username = $res['username'];
}
$items = mysqli_query($dbc, "SELECT * FROM users WHERE email= '$email'");
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
          <?php
          $products = get_product_details();
          foreach($products as $ap)
          {
              $id = $ap['id'];
              $name = $ap['name'];
              $brand = $ap['brand'];
              $price = $ap['price'];
              $image = $ap['image'];
              $details = $ap['details'];
              echo $id.$name.$brand.$price.$image."<br>".$details;
          }
          ?>
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
