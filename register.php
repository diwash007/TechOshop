<?php require_once("config.php"); 
if(isset($_SESSION["login_sess"])) 
{
  header("location:home.php"); 
}?>
<!DOCTYPE html>

<html>
<head>
  <title> Registration - TechOshop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="static/style.css">
</head>
<body style="padding-top:50px;padding-bottom:50px;background:#0046C2">
  <div class="container">
    <div class="row">
      <div class="col-sm-4 col-md-12 col-lg-4">
      </div>
      <div class="col-sm-4 col-md-12 col-lg-4">
      </div>
      <div class="col-sm-4 col-md-12 col-lg-4">
      </div>
    </div>
    <div class="row">
      <?php 
      if(isset($_POST['signup'])){
        extract($_POST);
  if(strlen($fname)<3){ // Minimum 
    $error[] = 'First Name must be minimum of 3 characters.';
  }
if(strlen($fname)>20){  // Max 
  $error[] = 'First Name: Max length 20 Characters';
}
if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $fname)){
  $error[] = 'Invalid Entry for First Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
}    
if(strlen($lname)<3){ // Minimum 
  $error[] = 'Last Name must be minimum of 3 characters.';
}
if(strlen($lname)>20){  // Max 
  $error[] = 'Last Name: Max length 20 Characters';
}
if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $lname)){
  $error[] = 'Invalid Entry for Last Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
}    
      if(strlen($username)<3){ // checking Minimum Lenghth   
        $error[] = 'Username must be minimum of 3 characters.';
      }
  if(strlen($username)>20){ // checking Max Length 
    $error[] = 'Username : Max length 20 Characters';
  }
  if(!preg_match("/^^[^0-9][a-z0-9]+([_-]?[a-z0-9])*$/", $username)){
    $error[] = 'Invalid Entry for Username. Enter lowercase letters without any space and No number at the start';
  }  
if(strlen($email)>50){  // Max 
  $error[] = 'Email: Max length 50 Characters';
}
if($passwordConfirm ==''){
  $error[] = 'Please confirm the password.';
}
if($password != $passwordConfirm){
  $error[] = 'Passwords do not match.';
}
          if(strlen($password)<8){ // min 
            $error[] = 'Password should be minimum of 8 characters.';
          }

         if(strlen($password)>20){ // Max 
          $error[] = 'Password: Max length 20 Characters';
        }
        $sql="select * from users where (username='$username' or email='$email');";
        $res=mysqli_query($dbc,$sql);
        if (mysqli_num_rows($res) > 0) {
          $row = mysqli_fetch_assoc($res);

          if($username==$row['username'])
          {
           $error[] ='Username already Exists.';
         } 
         if($email==$row['email'])
         {
          $error[] ='Email already Exists.';
        } 
      }
      if(!isset($error)){ 
        $date=date('Y-m-d');
        $options = array("cost"=>4);
        $password = password_hash($password,PASSWORD_BCRYPT,$options);

        $result = mysqli_query($dbc,"INSERT into users values(NULL,'$fname','$lname','$username','$email','$password','$date','user',NULL,NULL)");

        if($result)
        {
         $done=2; 
       }
       else{
        $error[] ='Failed : Something went wrong, please try again.';
      }
    }
  } ?>

  <div class="col-sm-4 col-md-12 col-lg-4">

   <?php 
   if(isset($error)){ 
    foreach($error as $error){ 
      echo '<p class="errmsg">'.$error.' </p>'; 
    }
  }
  ?>
</div>
<div class="col-sm-4 col-md-12 col-lg-4">
  <?php if(isset($done)) 
  { ?>
    <div class="successmsg">Registration Successful.<br> <a href="index.php" style="color:#fff;">Login here</a> </div>
  <?php } else { ?>
   <div class="signup_form">
    <form action="" method="POST">
      <div class="form-group" style="padding-top:30px">
        <h2 class="logo">TechOshop</h2><br>

        <label class="label_txt">First Name</label>
        <input type="text" class="form-control" name="fname" value="<?php if(isset($error)){ echo $_POST['fname'];}?>" required="">
      </div>
      <div class="form-group">
        <label class="label_txt">Last Name </label>
        <input type="text" class="form-control" name="lname" value="<?php if(isset($error)){ echo $_POST['lname'];}?>" required="">
      </div>

      <div class="form-group">
        <label class="label_txt">Username </label>
        <input type="text" class="form-control" name="username" value="<?php if(isset($error)){ echo $_POST['username'];}?>" required="">
      </div>

      <div class="form-group">
        <label class="label_txt">Email </label>
        <input type="email" class="form-control" name="email" value="<?php if(isset($error)){ echo $_POST['email'];}?>" required="">
      </div>
      <div class="form-group">
        <label class="label_txt">Password </label>
        <input type="password" name="password" class="form-control" required="">
      </div>
      <div class="form-group">
        <label class="label_txt">Confirm Password </label>
        <input type="password" name="passwordConfirm" class="form-control" required="">
      </div>
      <button type="submit" name="signup" class="btn btn-primary btn-group-lg form_btn">SignUp</button>
      <p style="margin-top:40px">Already have an account?  <a href="index.php">Log in</a> </p>
    </form>
  <?php } ?> 
</div>
</div>
<div class="col-sm-4 col-md-12 col-lg-4">
</div>

</div>
</div> 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>