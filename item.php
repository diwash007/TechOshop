<!DOCTYPE html>
<?php require_once("config.php");

$email=$_SESSION["login_email"];
$i = $_GET["i"];

function get_product_details()
    {
        global $dbc,$i;
        $ret = array();
        $sql = "SELECT * FROM items where brand='$i'";
        $res = mysqli_query($dbc, $sql);

        while($ar = mysqli_fetch_assoc($res))
        {
            $ret[] = $ar;
        }
        return $ret;
    }

if(empty($i)) {
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
  <title> <?php echo $i; ?> - TechOshop</title>
  <link rel="stylesheet" href="static/style.css">
</head>
<body>
  <div class="container hero">

      <span>Welcome, <b><?php echo $username; ?></b> (<a href="cart.php">Cart</a>) </span>
      <a href="logout.php" style="float:right;color:red">logout?</a>

      <div class="items">
        <div class="h4 head"><?php echo $i; ?>:</div>
        
      </div>
</div>

<?php include("static/footer.php")?>
