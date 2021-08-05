<?php require_once("config.php");

$email=$_SESSION["login_email"];
$findresult = mysqli_query($dbc, "SELECT * FROM users WHERE email= '$email'");
if($res = mysqli_fetch_array($findresult)) {
  $username = $res['username'];
  $uid = $res['id'];
  if($res['role'] != 'admin'){ header("location:home.php"); } //1d13i14609
}
include("static/header.php")
?> 
  <title> Admin - TechOshop</title>
  <link rel="stylesheet" href="static/style.css">
</head>
<body>
  <div class="container hero">
      <span>Welcome, <b><?php echo $username; ?></b></span>
      <span style="float:right"><a href="home.php">&#127968;</a> | <a href="logout.php" style="color:red">logout?</a></span><br>

      <form method="POST" action="">
      <div class="items">
        <div class="h4 head">Admin:</div>
        <div class="item-display">
         <?php
             if(isset($_POST['submit'])) {
              $name = $_POST['name'];
              $price = $_POST['price'];
              $brand = $_POST['brand'];
              $imglink = $_POST['imglink'];
              $details = $_POST['details'];
              $query = mysqli_query($dbc, "INSERT INTO items VALUES ('','$name','$price','$brand','$imglink','$details') ");
              if($query) {
                echo "<div class=successmsg>Item added successfully!</div>";
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
            <p><b>Add item:</b></p>
            <label>Name: </label>
            <input type="text" name="name" placeholder="iPhone 11" required><br>
            <label>Price:&nbsp;&nbsp;</label>
            <input type="text" name="price" placeholder="999" required><br>
            <label>Brand: </label>
            <input type="text" name="brand" placeholder="Apple" required><br>
            <label>Photo: </label>
            <input type="text" name="imglink" placeholder="Paste image link" required><br>
            <label>Details:</label>
            <textarea name="details" required placeholder="append <br> on each line break"></textarea>
          </div><br>
        <button type="submit" name="submit" class="btn btn-primary btn-group-lg cartbtn">Submit!</button>
      </form>
      </div>
      </div>
      </div>
</div>

<?php include("static/footer.php")?>
