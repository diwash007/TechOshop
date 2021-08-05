<?php require_once("config.php");
if(isset($_SESSION["login_sess"])) 
{
  header("location:home.php"); 
}
?>
<!DOCTYPE html>
<html>
<head>
<title> Forgot Password - TechOshop</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
<link rel="stylesheet" href="static/style.css">
</head>
<body style="background:#0046C2">
<div class="container">
	<div class="row">
		<div class="col-sm-4">
		</div>
		<div class="col-sm-4">
 	<form action="forgot_process.php" method="POST">
    <div class="login_form">
  <div class="form-group">
 <h2 class="logo"> TechOshop </h2><br>
 <?php if(isset($_GET['err'])){
 $err=$_GET['err'];
 echo '<p class="errmsg">No user found. </p>';
} 
// If server error 
if(isset($_GET['servererr'])){ 
echo "<p class='errmsg'>The server failed to send the message. Please try again later.</p>";
   }
   //if other issues 
   if(isset($_GET['somethingwrong'])){ 
 echo '<p class="errmsg">Something went wrong.  </p>';
   }
// If Success | Link sent 
if(isset($_GET['sent'])){
echo "<div class='successmsg'>Reset link has been sent to your registered email id . Kindly check your email. It can be taken 2 to 3 minutes to deliver on your email id . </div>"; 
  }
  ?>
  <?php if(!isset($_GET['sent'])){ ?>
    <label class="label_txt">Username or Email </label>
    <input type="text" name="login_var" class="form-control" required="">
  </div>
  <button type="submit" name="subforgot" class="btn btn-primary btn-group-lg form_btn">Send Link </button>
  <?php } ?>
</div>
</form>
   <br> 
		</div>
		<div class="col-sm-4">
		</div>
	</div>
</div> 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>