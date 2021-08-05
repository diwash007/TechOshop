<?php require_once("config.php");

$email=$_SESSION["login_email"];
$findresult = mysqli_query($dbc, "SELECT * FROM users WHERE email= '$email'");
if($res = mysqli_fetch_array($findresult)) {
  $username = $res['username'];
  $uid = $res['id'];
}

// getting orders data 
$cart_items = mysqli_query($dbc, "SELECT * from orders WHERE uid='$uid'");
while($ar = mysqli_fetch_assoc($cart_items)) {
            $ret[] = $ar;
}

include("static/header.php")
?> 
  <title> Orders - TechOshop</title>
  <link rel="stylesheet" href="static/style.css">
</head>
<body>
  <div class="container hero">
      <span>Welcome, <b><?php echo $username; ?></b></span>
      <span style="float:right"><a href="home.php">&#127968;</a> | <a href="cart.php">Cart</a> | <a href="support.php">Support</a> | <a href="logout.php" style="color:red">logout?</a></span><br>

      <form method="POST" action="">
      <div class="items">
        <div class="h4 head">Orders:</div>
        <div class="item-display">
          <table class="center">
            <tr>
            <th>Id</th>
            <th>Amount</th>
            <th>date</th>
            <th>details</th>
          </tr>
        <?php
          if(empty($ret)){
            echo "You haven't placed any orders yet!";
            }
          else {
            foreach($ret as $item){
            $oid = $item['id'];
            $total = $item['total'];
            $date = $item['date'];

            // getting order details data 
            $order_items = mysqli_query($dbc, "sELECT * from ordered_items INNER JOIN items ON ordered_items.itemid=items.id INNER JOIN orders on ordered_items.oid=orders.id where oid='$oid' and uid='$uid'");
            while($oi = mysqli_fetch_assoc($order_items)) {
                        $res_oi[] = $oi;
            }
            
            echo "<tr>";
            echo "<td>".$oid."</td>";
            echo "<td>$".$total."</td>";
            echo "<td>".$date."</td>";
            echo "<td>";
            foreach($res_oi as $o){
              echo $o['name']." x ".$o['quantity']."<br>";
            }
            $res_oi=[];
            echo "</td>";
            echo "</tr>";
            }
          }
        ?>

          </table>
        </div><br>
      </div>
      </div>
</div>

<?php include("static/footer.php")?>
