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

      <span>Welcome, <b><?php echo $username; ?></b></span>
      <span style="float:right"><a href="home.php">&#127968;</a> | <a href="orders.php">orders</a> | <a href="support.php">Support</a> | <a href="logout.php" style="color:red">logout?</a></span><br>

      <form method="POST" action="">
      <div class="items">
        <div class="h4 head">Cart:<a href="empty.php" style="font-size:15px;float:right;color:red">empty cart?</a></div>
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
        <?php
          if(isset($_POST['order'])) {
            $date = date('Y-m-d-H-i-s');
            $country = $_POST['country'];
            $address = $_POST['address'];
            $query0 = mysqli_query($dbc, "UPDATE users SET country='$country', address='$address' WHERE id='$uid' ");
            $query1 = mysqli_query($dbc, "INSERT INTO orders VALUES (NULL,'$uid','$date','$total','$address')");
            $get_oid = mysqli_query($dbc, "SELECT * from orders WHERE date='$date' and uid='$uid'");
            $oid = mysqli_fetch_array($get_oid)['id'];
            
            foreach($ret as $item){
                      $itemid = $item['itemid'];
                      $quantity = $item['quantity'];
                      mysqli_query($dbc, "INSERT INTO ordered_items VALUES ('$oid','$itemid','$quantity')");
                    }
            if($query1){
              echo "<div class=successmsg>Order placed successfully! Order id: ".$oid."</div>";
            }
            else {
              echo "<div class=errormsg>Something went wrong! Please try again later.</div>";
              die();
            }

            $query = mysqli_query($dbc, "DELETE FROM cart WHERE uid='$uid'");
            die();
          }
          if($total>0){
          ?>
        <div class="cartbtn_area">
          <form method="POST" action="">
          <div class="payment">
            <p><b>Payment method: Cash on Delivery</b></p>
            <label>Country:</label>
            <input type="country" name="country" required><br>
            <label>Address:</label>
            <textarea name="address" required></textarea>
          </div><br>
        <button type="submit" name="order" class="btn btn-primary btn-group-lg cartbtn">Order Now!</button>
      </form>
      </div>
    <?php } ?>
      </div>
      </div>
</div>

<?php include("static/footer.php")?>
