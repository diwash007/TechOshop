<?php require_once("config.php");

$email=$_SESSION["login_email"];
$i = $_GET["i"];

// getting item data 
$get_item = mysqli_query($dbc, "SELECT * from items WHERE id='$i'");
$curr_item = mysqli_fetch_array($get_item);
$iname = $curr_item['name'];
$idetails = $curr_item['details'];
$ibrand = $curr_item['brand'];
$iimg = $curr_item['image'];
$iprice = $curr_item['price'];

if(empty($i)) {
  header("location:home.php"); 
}

$findresult = mysqli_query($dbc, "SELECT * FROM users WHERE email= '$email'");
if($res = mysqli_fetch_array($findresult))
{
  $username = $res['username'];
  $uid = $res['id'];
}

include("static/header.php")
?> 
  <title> <?php echo $iname; ?> - TechOshop</title>
  <link rel="stylesheet" href="static/style.css">
</head>
<body>
  <div class="container hero">
      <span>Welcome, <b><?php echo $username; ?></b></span>
      <span style="float:right"><a href="home.php">&#127968;</a> | <a href="cart.php">Cart</a> | <a href="orders.php">orders</a> | <a href="support.php">Support</a> | <a href="logout.php" style="color:red">logout?</a></span><br>

      <?php
        if(isset($_POST['addcart'])){ 
          $quantity= $_POST['quantity'];

          $add_item = mysqli_query($dbc, "INSERT INTO cart values ('$uid', '$i', '$quantity')");

          if($add_item) {
            echo "<div class=successmsg>Added to Cart successfully!</div>";
          }
          else {
            echo "<div class=errormsg>Something went wrong!</div>";
          }
        }
      ?>

      <form method="POST" action="">
      <div class="items">
        <div class="h4 head"><?php echo $iname; ?></div>
        <div class="item-display">
        <?php
        echo '<div class=img>';
        echo '<img src='.$iimg.' class=pic></div><br>';
        echo '<span class=iprice><b>$';
        echo $iprice;
        echo '</b></span><div class=details>';
        echo $idetails;
        ?>
        <br>
        <label>Quantity:</label><input type="number" name="quantity" value="1" min="1" max="10">
        </div><br>
        <div class="cartbtn_area">
        <button type="submit" name="addcart" class="btn btn-primary btn-group-lg cartbtn">Add to Cart</button></div>
      </div>
      </div>
    </form>
</div>

<?php include("static/footer.php")?>
