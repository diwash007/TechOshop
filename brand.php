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
      <span>Welcome, <b><?php echo $username; ?></b></span>
      <span style="float:right"><a href="home.php">&#127968;</a> | <a href="cart.php">Cart</a> | <a href="orders.php">orders</a> | <a href="support.php">Support</a> | <a href="logout.php" style="color:red">logout?</a></span><br>

      <div class="items">
        <div class="h4 head"><?php echo $b; ?>:</div>
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

              echo "<a href=item.php?i=".$id."><li>";
              echo "<img src=".$image." class=pic><br>";
              echo "<span class=title>".$name."<span class=price>$".$price."</span></span><br>";
              echo $details;
              echo "</li></a>";
            } // ending loop
            ?>
        </ul>
      </div>
</div>

<?php include("static/footer.php")?>
