<?php require_once("config.php");

$email=$_SESSION["login_email"];
$findresult = mysqli_query($dbc, "SELECT * FROM users WHERE email= '$email'");
if($res = mysqli_fetch_array($findresult)) {
  $username = $res['username'];
  $uid = $res['id'];
}

// getting cart data 
$cart_items = mysqli_query($dbc, "SELECT * from cart WHERE uid='$uid'");
while($ar = mysqli_fetch_assoc($cart_items)) {
            $ret[] = $ar;
}

include("static/header.php")
?> 
  <title> Cart - TechOshop</title>
  <link rel="stylesheet" href="static/style.css">
</head>
<body>
  <div class="container hero">

      <span>Welcome, <b><?php echo $username; ?></b> (<a href="cart.php">Cart</a>) </span>
      <a href="logout.php" style="float:right;color:red">logout?</a>

      <form method="POST" action="">
      <div class="items">
        <div class="h4 head">Cart:</div>
        <div class="item-display">
          <table class="center">
            <tr>
            <th>Item</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
          </tr>
        <?php
          $total = 0;
          if(empty($ret)){
            echo "Cart is empty!";
            }
          else {
            foreach($ret as $item){
            $itemid = $item['itemid'];

            $get_item = mysqli_query($dbc, "SELECT * from items WHERE id='$itemid'");
            $curr_item = mysqli_fetch_array($get_item);
            $iname = $curr_item['name'];
            $idetails = $curr_item['details'];
            $iprice = $curr_item['price'];
            $total += $iprice*$item['quantity'];

            echo "<tr>";
            echo "<td>".$iname."</td>";
            echo "<td>$".$iprice."</td>";
            echo "<td>".$item['quantity']."</td>";
            echo "<td>$".$item['quantity']*$iprice."</td>";
            echo "</tr>";
            }
          }
        ?>
            <tr>
              <th></th>
              <th></th>
              <th><br>Grand Total:</th>
              <th><br>$<?php echo $total; ?></th>
            </tr>
          </table>
        </div><br>
        <div class="cartbtn_area">
          <form method="POST" action="">
          <div class="payment">
            <p><b>Payment method: Cash on Delivery</b></p>
            <label>Country:</label>
            <input type="country" name="country"><br>
            <label>Address:</label>
            <textarea name="address"></textarea>
          </div><br>
        <button type="submit" name="order" class="btn btn-primary btn-group-lg cartbtn">Order Now!</button>
      </form>
      </div>
      </div>
      </div>
    </form>
</div>

<?php include("static/footer.php")?>
