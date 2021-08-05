<?php require_once("config.php");

$email=$_SESSION["login_email"];
$findresult = mysqli_query($dbc, "SELECT * FROM users WHERE email= '$email'");
if($res = mysqli_fetch_array($findresult)) {
  $username = $res['username'];
  $uid = $res['id'];
}

include("static/header.php")
?> 
  <title> Support - TechOshop</title>
  <link rel="stylesheet" href="static/style.css">
</head>
<body>
  <div class="container hero">
      <span>Welcome, <b><?php echo $username; ?></b></span>
      <span style="float:right"><a href="home.php">&#127968;</a> | <a href="cart.php">Cart</a> | <a href="orders.php">orders</a> | <a href="logout.php" style="color:red">logout?</a></span><br>

      <form method="POST" action="">
      <div class="items">
        <div class="h4 head">Support:</div>
        <div class="item-display">
         <?php
             if(isset($_POST['submit'])) {
              $subject = $_POST['subject'];
              $message = $_POST['details'];
              $date = date('Y-m-d-H-i-s');
              $query = mysqli_query($dbc, "INSERT INTO support VALUES ('$uid','$subject','$message','$date','user') ");
              if($query) {
                echo "<div class=successmsg>Thank you for contacting us.<br>We will email you back soon!!</div>";
              }
              else {
                echo "<div class=errormsg>Something went wrong! Please try again later.</div>";
              }
             }
             ?>
        </div><br>

        <div class="cartbtn_area">
          <form method="POST" action="">
          <div class="payment">
            <p><b>How can we help you?</b></p>
            <label>Subject: </label>
            <input type="subject" name="subject" required><br>
            <label>Details:&nbsp;</label>
            <textarea name="details" required></textarea>
          </div><br>
        <button type="submit" name="submit" class="btn btn-primary btn-group-lg cartbtn">Submit!</button>
      </form>
      </div>
      </div>
      </div>
</div>

<?php include("static/footer.php")?>
