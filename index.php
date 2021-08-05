<!DOCTYPE html>
<?php require_once("config.php"); 
if(isset($_SESSION["login_sess"])) 
{
  header("location:home.php"); 
}?>
<html>
<head><br>
  <title> Login - Techno Smarter</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="static/style.css">
</head>
<body style="background:#0046C2">
  <div class="container">
   <div class="row">
    <div class="col-sm-4 col-md-12 col-lg-4">
    </div>
    <div class="col-sm-4 col-md-12 col-lg-4">
     <div class="login_form">
       <form action="login_process.php" method="POST">
        <div class="form-group">
         <h2 class="logo"> TechOshop </h2><br>
         <?php 
         if(isset($_GET['loginerror'])) {
           $loginerror=$_GET['loginerror'];
         }
         if(!empty($loginerror)){  echo '<p class="errmsg">Invalid Username and password!!</p>'; } ?>

         <label class="label_txt">Username or Email </label>
         <input type="text" name="login_var" value="<?php if(!empty($loginerror)){ echo  $loginerror; } ?>" class="form-control" required="">
       </div>
       <div class="form-group">
        <label class="label_txt">Password </label>
        <input type="password" name="password" class="form-control" required="">
      </div>
      <button type="submit" name="sublogin" class="btn btn-primary btn-group-lg form_btn">Login</button>
    </form>
    <p style="font-size: 12px;text-align: center;margin-top: 10px;"><a href="forgot-password.php" style="color: #00376b;">Forgot Password?</a> </p>
    <br> 
    <p>Don't have an account? <a href="register.php">Sign up</a> </p>
  </div>
  <div class="col-sm-4 col-md-12 col-lg-4">
  </div>
</div>
</div>
</div> 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
